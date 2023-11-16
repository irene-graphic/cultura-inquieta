<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article class="col-12 col-md-8" <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<div class="img-entry-header"><?php echo get_the_post_thumbnail();?>
			<div class="text-entry-header"> <?php the_title( '<h1 class="h1 font-white">', '</h1>' );?> </div>
		</div>

		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	

	<div class="col-md-10">
		
		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">



	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
