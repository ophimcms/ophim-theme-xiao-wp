<div class="myui-panel myui-panel-bg hiddex-xs clearfix">
    <div class="myui-panel-box clearfix">
        <?php
        if ( is_active_sidebar('left-sidebar') ) {
            dynamic_sidebar( 'left-sidebar' );
        } else {
            _e(' Go to Appearance -> Widgets to add some widgets.', 'ophim');
        } ?>
    </div>
</div>
