<!-- Sidebar
                ============================================= -->
<div class="sidebar nobottommargin col_last clearfix">
	<div class="sidebar-widgets-wrap">

        <?php

        if(is_active_sidebar('du_sidebar')){
            dynamic_sidebar('du_sidebar');
        }

        ?>

	</div>

</div><!-- .sidebar end -->