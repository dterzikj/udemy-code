<?php

function r_add_dashboard_widgets(){
    wp_add_dashboard_widget(
            RECIPE_RATING_DASHBOARD_WIDGET_ID,
            'Latest Recipe Ratings',
            'r_latest_recipe_rating_display'
    );
}

function r_latest_recipe_rating_display(){

    global $wpdb;
    $ratings = $wpdb->get_results(
            "SELECT * FROM `". $wpdb->prefix ."recipe_ratings` ORDER BY `ID` DESC LIMIT 5;"
    );

    echo '<ul>';
    foreach ($ratings as $rating){
        ?>
        <li>
            <a href="<?php echo get_the_permalink($rating->recipe_id) ?>">
                <?php echo get_the_title($rating->recipe_id); ?></a> has received rating of <?php echo $rating->rating; ?>
        </li>
        <?php
    }
    echo '</ul>';
}