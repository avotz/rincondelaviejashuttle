<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rinconshuttle
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if (has_post_thumbnail()) :

			$id = get_post_thumbnail_id($post->ID);
			$big_url = wp_get_attachment_image_src($id, 'item-gallery', true);
			$thumb_url = wp_get_attachment_image_src($id, 'large', true);
			?>

			<?php if (wp_is_mobile()) { ?>
				<figure class="post-banner blog-banner" style="background-image: url('<?php echo $thumb_url[0] ?>');">
					<?php if (!is_single()) : ?>
						<a href="<?php echo get_permalink() ?>"></a>

					<?php endif; ?>
				</figure>

			<?php
		} else { ?>
				<figure class="post-banner blog-banner" style="background-image: url('<?php echo $big_url[0] ?>');">
					<?php if (!is_single()) : ?>
						<a href="<?php echo get_permalink() ?>"></a>

					<?php endif; ?>
				</figure>
			<?php
		} ?>

		<?php endif;

	if ('post' === get_post_type()) :
		?>
			<div class="entry-meta">
				<?php
				rinconshuttle_posted_on();
				rinconshuttle_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php /*rinconshuttle_post_thumbnail();*/ ?>

	<div class="entry-content">
		<?php
		the_content(sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'rinconshuttle'),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		));

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'rinconshuttle'),
			'after'  => '</div>',
		));
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php rinconshuttle_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->