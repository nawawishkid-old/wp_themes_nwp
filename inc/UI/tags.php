<?php
/**
 * @see https://codex.wordpress.org/Function_Reference/get_the_tags
 */
// Use in the loop
$tags = get_the_tags();

if ( ! $tags ) return;

foreach ( $tags as $tag ) : ?>

<a href="<?php echo get_tag_link( $tag->term_id ); ?>">
	<span class="post-tag"><?php echo $tag->name; ?></span>
</a>

<?php
endforeach;