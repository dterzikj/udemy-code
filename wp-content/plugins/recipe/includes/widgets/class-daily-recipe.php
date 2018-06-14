<?php

/***
 * Class R_Daily_Recipe_Widget loads on the sidebar to show the recipe of the day. Recipe of the day is randomly
 * generated daily using Transient API
 *
 * @since 1.0.0
 * @link https://codex.wordpress.org/Transients_API
 */
class R_Daily_Recipe_Widget extends WP_Widget{


	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array(
			'description' => 'Recipe of the day widget.',
		);
		parent::__construct( 'r_daily_recipe_widget', 'Recipe of the day', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		extract($args);
		extract($instance);

		$recipe_id = get_transient(DAILY_RECIPE_TRAINSIENT_KEY);

		$title = apply_filters('widget_title', $title);

		echo $before_widget;
		echo $before_title . $title . $after_title;
		?>
        <div id="oc-portfolio-sidebar" class="owl-carousel carousel-widget" data-items="1" data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000">
            <div class="oc-item">
                <div class="iportfolio">
                    <div class="portfolio-image">
                        <a href="<?php echo get_the_permalink($recipe_id); ?>">
                            <?php echo get_the_post_thumbnail($recipe_id); ?>
                        </a>
                    </div>
                    <div class="portfolio-desc center nobottompadding">
                        <h3><a href="<?php echo get_the_permalink($recipe_id); ?>"><?php echo get_the_title($recipe_id); ?></a></h3>
                    </div>
                </div>
            </div>

        </div>
        <?php
        echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$default = array('title' => 'Recipe of the day');
		$instance = wp_parse_args((array)$instance, $default);

		?>
		<p>
			<label for="<?php echo $this->get_field_id('title') ?>">Title: </label>
			<input type="text"
			       class="widefat"
			       id="<?php echo $this->get_field_id('title') ?>"
			       name="<?php echo $this->get_field_name('title') ?>"
			       value="<?php echo esc_attr($instance['title'])?>">
		</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array(
			'title' => strip_tags($new_instance['title'])
		);
		return $instance;
	}
}