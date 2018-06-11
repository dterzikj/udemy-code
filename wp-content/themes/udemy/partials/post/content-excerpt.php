<div class="entry clearfix">
	<?php

	if(has_post_thumbnail()){
		?>
		<div class="entry-image clearfix">
			<?php the_post_thumbnail('full', array('class' => 'image_fade')); ?>
		</div>
		<?php
	}

	?>
	<div class="entry-title">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>
	<ul class="entry-meta clearfix">
		<li><i class="icon-calendar3"></i><?php echo get_the_date(); ?></li>
		<li><a href="#"><i class="icon-user"></i><?php echo get_author_posts_url( get_the_author_meta('ID') ); ?></a></li>
		<li><i class="icon-folder-open"></i><?php the_category(' '); ?></li>
		<li><a href="<?php the_permalink() ?>#comments"><i class="icon-comments"></i>
				<?php comments_number('0'); ?> Comments
			</a></li>
	</ul>
	<div class="entry-content">
		<p><?php the_excerpt(); ?></p>
		<a href="<?php the_permalink() ?>" class="more-link">Read More</a>
	</div>
</div>