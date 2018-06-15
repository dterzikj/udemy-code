<div class="entry clearfix">
	<?php

    if(get_post_format() == 'gallery'){
	    $gallery = get_post_gallery(get_the_ID(), false);
	    ?>
        <div class="entry-image clearfix">
            <div class="fslider" data-arrows="false" data-lightbox="gallery">
                <div class="flexslider">
                    <div class="slider-wrap">
                        <?php
                        foreach ($gallery['src'] as $src){
                            ?><div class="slide">
                                <a href="<?php echo $src; ?>">
                                    <img class="image_fade" src="<?php echo $src; ?>">
                                </a>
                            </div><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
	    <?php
    } else if(get_post_format() == 'video'){
        $content = apply_filters('the_content', get_the_content());
        $video = false;

        if(!strpos($content, 'wp-playlist-script')){
            $video = get_media_embedded_in_content($content, array('video', 'object', 'embed', 'iframe'));
        }

        if($video){
           echo '<div class="entry-video">';
           echo $video[0];
           echo '</div>';
        }
    } else if(get_post_format() == 'audio'){
        $content = apply_filters('the_content', get_the_content());
        $audio = false;

        if(!strpos($content, 'wp-playlist-script')){
            $audio = get_media_embedded_in_content($content, array('audio', 'iframe'));
        }

        if($audio){
            echo $audio[0];
        }

	    ?>
        <div class="entry-image clearfix">
        </div>
	    <?php
    }else if(has_post_thumbnail()){
		?>
		<div class="entry-image clearfix">
			<?php the_post_thumbnail('du-post-image', array('class' => 'image_fade')); ?>
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
				<?php comments_number(); ?>
			</a></li>
	</ul>
	<div class="entry-content">
		<p><?php the_excerpt(); ?></p>
		<a href="<?php the_permalink() ?>" class="more-link">Read More</a>
	</div>
</div>