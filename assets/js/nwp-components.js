(function($) {

/**
 * Variables
 */
 var SearchBar, SearchResult;

SearchBar = {
	selector: '.nwp_search-bar',
	url: '/wp-json/wp/v2/posts?search=',

	search: function(input, options) {
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
			url: SearchBar.url + keyword,
			success: successCallback,
			error: errorCallback
		});
	},

	init: function() {
		SearchBar.node = $(SearchBar.selector);

		$(SearchBar.selector + ' input').keyup(function() {
			SearchResult.remove();
			SearchBar.search(this.value, {
				onSuccess: SearchResult.input,
				onInputEmpty: SearchResult.remove,
				onInputInvalid: SearchResult.remove,
				onError: function(error) {
					console.log(error);
				}
			});
		});
	}
}


SearchResult = {
	name: 'nwp_search-bar-results',
	init: function() {
		SearchResult.node = $(SearchResult.getSelector());
	},
	getSelector: function() {
		return '.' + SearchResult.name;
	},
	create: function(data) {
		return (
			'<div class="' + SearchResult.name + '-item" \>' + 
				'<a href="' + data.link + '">' +
					data.title.rendered + 
				'</a>' +
			'</div>'
		);
	},
	remove: function() {
		if ( !SearchResult.node.children().length ) return;

		SearchResult.node.empty();
			SearchResult.node.removeClass('active');
	},
	beforeHandle: function(data) {
		SearchResult.remove();
	},
	handle: function(data) {
		data.forEach(function(item) {
			SearchResult.node.append(SearchResult.create(item));
		});
	},
	afterHandle: function(data) {
		if ( !SearchResult.node.children().length ) {
		} else {
			SearchResult.node.addClass('active');
		}
	},
	input: function(data) {
		SearchResult.beforeHandle(data);
		SearchResult.handle(data);
		SearchResult.afterHandle(data);
	}
}

/**
 * Functions
 */


/**
 * Executions
 */
$(document).ready(function() {
	

	SearchResult.init();
	SearchBar.init();
});

})(jQuery);