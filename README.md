# NWP Theme
# Design

# Web UI Components
## Page
* Site name/logo
* Header image
* Top navigation menu
* Sidebar navigation menu
* Social media list
* User login
* Searchbox
* Footer

## Blog post
* Featured image
* Post header
* Post footer
* Post meta (category, tag, date, author)
* Author meta
* Comments
* Social media sharing
* Related post

## Author
* Author image
* Author name
* Author bio

## Comment
* Comment section
* Comment item
* Reply box (form)
* Comment thread
* Comments not allowed
* Comments not allowed, but has some comments
* No comments

# Bugs
- [ ] Post permalink with Thai language does not use single.php template.
- [x] Cannot get author page url
- [x] No comment but display as 1 comment in "การทดสอบหมายเลข 3"

# TODO
## CSS
- [ ] Set default HTML Header text relative to var(--font-size)

## Customizer
- [ ] Must sanitize custom customizer name

## Comments
- [x] Find a way to add cancel button beside submit button in the form.
- [x] Remove form DOM from comment when click cancel button.
- [x] Redesign.
- [ ] JS form validations.
- [ ] Sticky reply textarea at the bottom of the page.
- [ ] Style author comment to be different from user comments.
- [ ] Pagination or lazyload.
- [ ] Make component function accept more arguments for modification flexibility.  
- [ ] Create PHP UI library. (So excited!)  
- [ ] Searchbox preloader
- [ ] Searchbox arrow key search result navigation.
- [ ] UI: [Support swipe event](https://stackoverflow.com/questions/2264072/detect-a-finger-swipe-through-javascript-on-the-iphone-and-android)

## Post formats
### Standard
- [ ] Choose the right font family for English, both article and header.
- [ ] Share button.
- [ ] Pagination or lazyload.

## Page templates
### Index.php

### Single.php

### Page.php

### 404.php

### Archive.php

### Front-page.php

## Template parts
### WordPress sidebar
- [ ] Design where sidebar should occupy.

### WordPress nav menu
- [ ] Design where nav menus should occupy.

### Image gallery


### Video


## Performance
- [ ] Dequeue unrelated scripts in every page.
- [ ] Lazy load resources.

## Security


## Accessibility
- [ ] Ensure every `<img>` has `alt=""` text.
- [ ] Optimized the use of HTML `aria-` attributes.

## Localization
- [ ] Parse .pot file to JSON array for JS to use in frontend.