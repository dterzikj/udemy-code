<?php

/*
 * Template Name: Full Width Page
 * */

get_header();

while(have_posts()){
	the_post();
	?>
	<section id="page-title">

		<div class="container clearfix">
			<h1><?php the_title(); ?></h1>
			<?php

			if(function_exists('the_subtitle')){
				?><span><?php the_subtitle(); ?></span><?php
			}

			?>
		</div>

	</section><!-- #page-title end -->
	<?php
}

rewind_posts();

?>

	<!-- Content
    ============================================= -->
	<section id="content">

		<div class="content-wrap">

			<div class="container clearfix">


				<?php


				while(have_posts()){

					the_post();

					$author_ID = get_the_author_meta('ID');
					$author_url = get_author_posts_url($author_ID);

					?>

					<!-- Post Content
	        ============================================= -->
					<div class="single-post nobottommargin">

						<!-- Single Post
						============================================= -->
						<div class="entry clearfix">

							<!-- Entry Image
							============================================= -->
							<?php

							if(has_post_thumbnail()){
							?>
							<div class="entry-image clearfix">
								<?php the_post_thumbnail('du-post-image'); ?>
							</div>
							<?php
							}

							?><!-- .entry-image end -->

							<!-- Entry Content
							============================================= -->
							<div class="entry-content notopmargin">

								<?php

								the_content();
								wp_link_pages(array(
									'before'           => '<p class="text-center">' . __( 'Pages:', 'udemy' ),
									'after'            => '</p>'
								));

								?>
								<!-- Post Single - Content End -->


								<div class="clear"></div>

							</div>
						</div><!-- .entry end -->

						<div class="line"></div>

						<?php

						if(comments_open() || get_comments_number()){
							comments_template();
						}

						?>

					</div>


					<?php
				}
				?>
			</div>

		</div>

	</section><!-- #content end -->

<?php get_footer(); ?>