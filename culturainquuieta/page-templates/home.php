<?php
/**
 * Template Name: Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<main class="site-main" id="main" role="main">
			
			<section class="row">
				<h2 class="title-section">Destacados</h2>
				
				<?php
					$args = array(
				    	'post_type' => 'post',
				    	'posts_per_page' => -1,
				    	'post__in' => get_option('sticky_posts'),
				    	'ignore_sticky_posts' => 1,
					);
				?>

				<div class="col-12 col-md-8">
					<div class="row">
					<?php
						$loop = new WP_Query($args);
						if ($loop->have_posts()) :
					    	while ($loop->have_posts()) : $loop->the_post();
					        	get_template_part( 'loop-templates/content', 'sticky-posts' );
							endwhile;
						else :
					    	echo 'No hay destacados';
						endif;
						wp_reset_postdata();
					?>
					</div>
				</div>
				
				
			</section>

			<section class="row">
				<h2 class="title-section">Colecciones</h2>
				<div class="col-12 col-md-8">
					<?php
						$terms = get_field('colecciones_inicio');
						if( $terms ):?>
							<?php foreach( $terms as $term ): 	
								$image_url = get_field('imagen_coleccion', $term, true);
							?>
								
								<div class="d-flex flex-column align-items-center justify-content-center text-center text-white p-5 rounded-3 mb-3" style="
									background-position: center center; 
									background-size: cover;
									height: 360px	;
									background:
										linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,212,255,0) 100%),
										url(<?php echo $image_url;?>) center/cover;
									">

									<h2 class="h1"><?php echo esc_html( $term->name ); ?></h2>
									<p><?php echo esc_html( $term->description ); ?></p>
									<a href="<?php echo esc_url( get_term_link( $term ) ); ?>">Ver colección</a>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
				</div>
			</section>
			
			<section class="row">
				<h2 class="title-section">Últimas publicaciones</h2>
				
				<?php
					$args = array(
				    	'post_type' => 'post',
				    	'posts_per_page' => 8,
						'post__not_in' => get_option( 'sticky_posts' ),
					);
				?>
				
				<div class="col-12 col-md-8">
					<div class="row">
					<?php
						$loop = new WP_Query($args);
						if ($loop->have_posts()) :
						    while ($loop->have_posts()) : $loop->the_post();
						        get_template_part( 'loop-templates/content', 'sticky-posts' );
						    endwhile;
						else :
						    echo 'No hay destacados';
						endif;
			
						wp_reset_postdata();
					?>
					</div>
			</section>
		</main>
	</div>
</div>

<?php get_footer(); ?>