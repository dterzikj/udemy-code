<?php get_header(); ?>

	<!-- Content
    ============================================= -->
	<section id="content">

		<div class="content-wrap">

			<div class="section header-stick bottommargin-lg clearfix" style="padding: 20px 0;">
				<div>
					<div class="container clearfix">
						<span class="label label-danger bnews-title">Breaking News:</span>

						<div class="fslider bnews-slider nobottommargin" data-speed="800" data-pause="6000" data-arrows="false" data-pagi="false">
							<div class="flexslider">
								<div class="slider-wrap">
									<div class="slide"><a href="#"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </strong></a></div>
									<div class="slide"><a href="#"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </strong></a></div>
									<div class="slide"><a href="#"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </strong></a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container clearfix">

				<!-- Post Content
                ============================================= -->
				<div class="postcontent nobottommargin clearfix">

					<!-- Posts
                    ============================================= -->
					<div id="posts">

						<?php

                        if(have_posts()){

                            while(have_posts()){

                                the_post();

                                get_template_part('partials/post/content-excerpt');
                            }
                        }

                        ?>

					</div><!-- #posts end -->

					<!-- Pagination
                    ============================================= -->
					<ul class="pager nomargin">
						<li class="previous"><?php previous_posts_link('&larr; Older') ?></li>
						<li class="next"><?php next_posts_link('Newer &rarr;') ?></li>
					</ul><!-- .pager end -->

				</div><!-- .postcontent end -->

				<?php get_sidebar(); ?>

			</div>

		</div>

	</section><!-- #content end -->

<?php get_footer(); ?>