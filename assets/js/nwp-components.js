(function($) {

/**
 * Components
 */
function SearchBar(selector) {
	// Properties
	this.result = {
		// Properties
		active: false,
		name: 'nwp_search-bar-results',

		/**
		 * Markup templates for displaying search results.
		 */
		template: {
			core: function(options, searchBar) {
				return (
					'<div class="' + searchBar.name + '-item p-2">' +
						options.content +
					'</div>'
				);
			},
			success: function(data, searchBar) {
				var title = data.title.rendered,
					content;

				// Limit its length
				title = title.length > 20 ? title.substring(0, 21) + '...' : title;
				
				content = (
					'<a href="' + data.link + '">' +
						title + 
					'</a>'
				);

				return this.core({content: content}, searchBar);
			},
			report: function(text, searchBar) {
				var content = (
					'<span class="d-flex justify-content-center">' + text + '</span>'
				);

				return this.core({content: content}, searchBar);
			}
		},

		// Methods
		/**
		 * Assign DOM to result.node property
		 */
		init: (function() {
			this.result.node = this.node.find('.' + this.result.name);
		}).bind(this),

		/**
		 * Remove all children of result node
		 */
		remove: function() {
			if ( !this.node.children().length ) return;

			this.node.empty();
			this.node.removeClass('active');
			this.active = false;
		},

		/**
		 * Append given markup to result node
		 */
		render: function(html) {
			this.node.append(html);
			this.active = true;
		},
		beforeHandle: function(data) {
			this.remove();
		},
		handle: function(data) {
			if ( !data.length ) {
				this.render(this.template.report('Not found', this));
				return;
			}

			data.forEach((function(item) {
				this.render(this.template.success(item, this));
			}).bind(this));
		},
		afterHandle: function(data) {
			if ( !this.node.children().length ) return;

			this.node.addClass('active');
		},
		input: function(data) {
			console.log(this);
			this.beforeHandle(data);
			this.handle(data);
			this.afterHandle(data);
		}
	}

	// Methods
	this.clear = function() {
		this.inputNode.val('');
	}

	this.init = (function() {
		var $this = this;

		this.node = $(selector);
		this.inputNode = $(selector + ' input');
		this.result.init();

		/**
		 * Enable search input
		 */
		this.inputNode.keyup(function() {
			console.log($this.node);
			search(this.value, {
				onSuccess: $this.result.input.bind($this.result),
				onInputEmpty: $this.result.remove.bind($this.result),
				onInputInvalid: function() {
					$this.result.beforeHandle();
					$this.result.render(
						$this.result.template.report('Invalid keyword', $this)
					);
					$this.result.afterHandle();
				},
				onError: function(error) {
					console.log(error);
				}
			});
		});

		/**
		 * Remove search results when click outside of search components.
		 * Remove only when search result is active or open.
		 */
		$(document).click((function(ev) {
			if ( !this.result.active ) return;

			if ( !this.node.find(ev.target).length ) {
				this.result.remove();
				this.clear();
			}
		}).bind(this));
	}).call(this);
}

function Sidebar(sidebarSelector, triggerSelector, backgroundSelector) {
	this.isActive = function() {
		return this.node.hasClass('active') ? true : false;
	}
	this.activate = function() {
		this.node.addClass('active');
	}
	this.deactivate = function() {
		this.node.removeClass('active');
	}
	this.init = (function() {
		var $this = this;
		var bgSel = backgroundSelector || sidebarSelector + ' .background';

		this.node = $(sidebarSelector);
		this.trigger = $(triggerSelector);
		this.background = $(bgSel);

		this.trigger.click(function() {
			$this.node.toggleClass('active');
		});

		this.background.click(function() {
			$this.trigger.click();
		})
	}).call(this);
}

/**
 * Functions
 */
function search(input, options) {
	var emptyCallback = options.onInputEmpty || function() {},
		invalidCallback = options.onInputInvalid || function() {},
		successCallback = options.onSuccess || function() {},
		errorCallback = options.onError || function() {};

	if ( !input.length ) {
		emptyCallback();
		return;
	}

	var keyword = input.trim().match(/^[a-zA-Z0-9 ก-๙]+$/g);

	if ( keyword === null ) {
		invalidCallback();
		return;
	}

	$.get({
		url: '/wp-json/wp/v2/posts?search=' + keyword,
		success: successCallback,
		error: errorCallback
	});
}

/**
 * Executions
 */
$(document).ready(function() {

	var searchBar1 = new SearchBar('#nwp_search-bar-1');
	var searchBar2 = new SearchBar('#nwp_search-bar-2');
	var sidebar1 = new Sidebar('#nwp_sidebar-1', '#nwp_nav-menu-1');

});

})(jQuery);