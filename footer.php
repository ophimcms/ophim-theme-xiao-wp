<?php
if ( is_active_sidebar('widget-footer') ) {
    dynamic_sidebar( 'widget-footer' );
} else {
    _e('This is widget footer. Go to Appearance -> Widgets to add some widgets.', 'ophim');
}
?>
</div>
<script type="text/javascript">
    MyTheme.Other.Skin();
</script>
<?php wp_footer(); ?>
</html>