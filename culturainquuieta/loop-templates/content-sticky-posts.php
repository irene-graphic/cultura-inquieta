<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-md-6">
	<article <?php post_class("mb-3"); ?> id="post-<?php the_ID(); ?>">
		
		<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');?>
		
		<?php if (!is_sticky($post_id)) { ?>
					
			<figure style="width:100%;height:clamp(15vw, 30vh, 400px);" class="alignwide wp-block-post-featured-image">
				<img class="rounded-3" src="<?php echo $featured_img_url;?>" class="" alt="" style="height:clamp(15vw, 30vh, 400px);object-fit:cover;">
			</figure>
			
			<div class="entry-content">
				<?php
				understrap_categories_list();
				the_title(
					sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h2>'
				);
				understrap_link_pages();
				?>
			</div>
	
		<?php } else { ?>
			
			<div class="d-flex align-items-end p-3 rounded-3" 
			style="
				background-image: 
				background-position: center center; 
				background-size: cover; height: 390px;
				background:
					linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,212,255,0) 100%),
					url(<?php echo $featured_img_url;?>) center/cover;
			">
				
				<div class="entry-content">
				<?php
					understrap_categories_list();
					the_title(
						sprintf( '<h2 class="entry-title"><a class="link-light text-decoration-none" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h2>'
					);
					understrap_link_pages();
				?>
				</div>
			</div>
		<?php } ?>
	</article>
</div>




