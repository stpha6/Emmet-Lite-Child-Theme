<?php
/**
 * The default template for displaying content
 *
 * Used for single post.
 *
 * @package WordPress
 * @subpackage Emmet
 * @since Emmet 1.0
 */
global $emmetPageTemplate;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php mp_emmet_post_thumbnail( $post, $emmetPageTemplate ); ?>
		
		<?php the_content(); ?>
		
		<div class="clearfix"></div>
		<?php wp_link_pages( array(
			'before'      => '<nav class="navigation paging-navigation wp-paging-navigation">',
			'after'       => '</nav>',
			'link_before' => '<span>',
			'link_after'  => '</span>'
		) ); ?>
		
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php if ( get_theme_mod( 'theme_show_meta', '1' ) === '1' || get_theme_mod( 'theme_show_meta' ) ): ?>
			<div class="meta">
				<span class="author"><?php _e( 'Posted by', 'emmet-lite' ); ?> </span><?php the_author_posts_link(); ?>
				<span class="seporator">/</span>
				<span class="date-post h6"><?php echo get_post_time( 'F j, Y', false, null, true ); ?></span>
				<?php if ( comments_open() ) : ?>
					<span class="seporator">/</span>
					<a class="blog-icon underline"
					   href="#comments"><span><?php comments_number( '0', '1', '%' ); ?><?php _e( 'Comments', 'emmet-lite' ); ?></span></a>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'emmet-lite' ), '<span class="seporator">/</span> ', '' ); ?>
			</div>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'theme_show_tags', '1' ) === '1' || get_theme_mod( 'theme_show_tags' ) ): ?>
			<?php
			echo get_the_term_list( $post->ID, 'portfolio_tag', '<div class="tags-wrapper"><h5>' . __( "Tagged with", 'emmet-lite' ) . '</h5><div class="tagcloud">', '<span>,</span> ', '</div></div>' );
		endif; ?>
		<?php if ( get_theme_mod( 'theme_show_categories', '1' ) === '1' || get_theme_mod( 'theme_show_categories' ) ): ?>
			<?php
			echo get_the_term_list( $post->ID, 'portfolio_category', '<div class="wrapper-post-categories"><h5>' . __( "Posted in", 'emmet-lite' ) . '</h5>', '<span>,</span> ', '</div>' );
		endif; ?>
		<?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>


	</footer><!-- .entry-meta -->
</article><!-- #post -->