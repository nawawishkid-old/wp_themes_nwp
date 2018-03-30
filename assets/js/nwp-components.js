(function($) {

/**
 * Components
 */
 var SearchBar, Sidebar;

SearchBar = {
	// Properties
	selector: '#nwp_search-bar-1',
	result: {
		// Properties
		active: false,
		name: 'nwp_search-bar-results',

		/**
		 * Markup templates for displaying search results.
		 */
		template: {
			core: function(options) {
				return (
					'<div class="' + SearchBar.result.name + '-item p-2">' +
						options.content +
					'</div>'
				);
			},
			success: function(data) {
				var title = data.title.rendered,
					content;

				// Limit its length
				title = title.length > 20 ? title.substring(0, 21) + '...' : title;
				
				content = (
					'<a href="' + data.link + '">' +
						title + 
					'</a>'
				);

				return SearchBar.result.template.core({content: content});
			},
			report: function(text) {
				var content = (
					'<span class="d-flex justify-content-center">' + text + '</span>'
				);

				return SearchBar.result.template.core({content: content});
			}
		},

		// Methods
		/**
		 * Assign DOM to result.node property
		 */
		init: function() {
			SearchBar.result.node = $(SearchBar.result.getSelector());
		},
		getSelector: function() {
			return SearchBar.selector + ' .' + SearchBar.result.name;
		},

		/**
		 * Remove all children of result node
		 */
		remove: function() {
			if ( !SearchBar.result.node.children().length ) return;

			SearchBar.result.node.empty();
			SearchBar.result.node.removeClass('active');
			SearchBar.result.active = false;
		},

		/**
		 * Append given markup to result node
		 */
		render: function(html) {
			SearchBar.result.node.append(html);
			SearchBar.result.active = true;
		},
		beforeHandle: function(data) {
			SearchBar.result.remove();
		},
		handle: function(data) {
			if ( !data.length ) {
				SearchBar.result.render(SearchBar.result.template.report('Not found'));
				return;
			}

			data.forEach(function(item) {
				SearchBar.result.render(SearchBar.result.template.success(item));
			});
		},
		afterHandle: function(data) {
			if ( !SearchBar.result.node.children().length ) return;

			SearchBar.result.node.addClass('active');
		},
		input: function(data) {
			SearchBar.result.beforeHandle(data);
			SearchBar.result.handle(data);
			SearchBar.result.afterHandle(data);
		}
	},

	// Methods
	clear: function() {
		SearchBar.inputNode.val('');
	},
	init: function() {
		SearchBar.node = $(SearchBar.selector);
		SearchBar.inputNode = $(SearchBar.selector + ' input');
		SearchBar.result.init();

		/**
		 * Enable search input
		 */
		SearchBar.inputNode.keyup(function() {
			search(this.value, {
				onSuccess: SearchBar.result.input,
				onInputEmpty: SearchBar.result.remove,
				onInputInvalid: function() {
					SearchBar.result.beforeHandle();
					SearchBar.result.render(
						SearchBar.result.template.report('Invalid keyword')
					);
					SearchBar.result.afterHandle();
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
		$(document).click(function(ev) {
			console.log(ev.target);
			if ( !SearchBar.result.active ) return;

			if ( !SearchBar.node.find(ev.target).length ) {
				SearchBar.result.remove();
				SearchBar.clear();
			}
		});
	}
}

Sidebar = {
	selector: '#nwp_sidebar',
	triggerSelector: '.nwp_nav-menu.nwp_icon',
	backgroundSelector: '#nwp_sidebar .background',

	isActive: function() {
		return Sidebar.node.hasClass('active') ? true : false;
	},
	activate: function() {
		Sidebar.node.addClass('active');
	},
	deactivate: function() {
		Sidebar.node.removeClass('active');
	},
	init: function() {
		console.log('init');
		Sidebar.node = $(Sidebar.selector);
		Sidebar.trigger = $(Sidebar.triggerSelector);
		Sidebar.background = $(Sidebar.backgroundSelector);

		Sidebar.trigger.click(function() {
			console.log('click');
			Sidebar.node.toggleClass('active');
		});

		Sidebar.background.click(function() {
			Sidebar.trigger.click();
		})
	}
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
	

	SearchBar.init();
	Sidebar.init();
});

})(jQuery);