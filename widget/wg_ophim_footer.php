<?php
class WG_oPhim_Footer extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'wg_footer', // Base ID
            __( 'Ophim Footer', 'ophim' ), // Name
            array( 'description' => __( 'Mẫu footer', 'ophim' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract($args);
        ob_start();
        echo $instance['footer'] ?? '';
        echo $after_widget;
        $html = ob_get_contents();
        ob_end_clean();
        echo $html;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title' 	=> '',
            'slug' 	=> '#',
            'postnum' 	=> 5,
            'style'		=> '1',
            'status'		=> 'all',
            'orderby'		=> 'new',
            'categories'		=> 'all',
            'actors'		=> 'all',
            'directors'		=> 'all',
            'genres'		=> 'all',
            'regions'		=> 'all',
            'years'		=> 'all',
        ) );
        extract($instance);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('footer'); ?>"><?php _e('Footer', 'ophim') ?></label>
            <br />
            <textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('footer'); ?>" name="<?php echo $this->get_field_name('footer'); ?>"  ><?php if(isset($instance['footer']) && $instance['footer']){ echo $instance['footer'];}else{ ?>    <div class="myui-foot clearfix">
                    <div class="container min">
                    <div class="row">
                    <div class="col-pd text-center">
                    <p>Tất cả video và hình ảnh của trên trang web đều thu thập từ Internet và bản quyền thuộc về người sáng
                    tạo ban đầu. Trang web này chỉ cung cấp dịch vụ trang web, không cung cấp lưu trữ tài nguyên và
                    không tham gia ghi và tải lên <br> Nếu vi phạm bản quyền của công ty bạn, vui lòng gửi email đến
                    admin@email.com (Chúng tôi sẽ xóa nội dung vi phạm trong thời gian sớm nhất, xin cảm ơn.) </p>
                    <p class="hidden-xs" style="display:block;">
                    <a target="_blank" href="/">TextLink</a>
                    <span class="split-line"></span>
                    <a target="_blank" href="/">TextLink</a>
                    <span class="split-line"></span>
                    <a target="_blank" href="/">TextLink</a>
                    <span class="split-line"></span>
                    <a target="_blank" href="/">TextLink</a>
                    <span class="split-line"></span>
                    <a target="_blank" href="/">TextLink</a>
                    <span class="split-line"></span>
                    <a target="_blank" href="/">TextLink</a>
                    <span class="split-line"></span>
                    <a target="_blank" href="/">TextLink</a>
                    </p>
                    <p class="margin-0">© 2022 OPHIMCMS Allrights Reserved.</p>
                    </div>
                    </div>
                    </div>
                    </div>
                    <ul class="myui-extra clearfix">
                    <li>
                    <a class="backtop" href="javascript:scroll(0,0)" title="Lên đầu trang" style="display: none;">
                    <i class="fa fa-angle-up"></i>
                    </a>
                    </li>
                    <li>
                    <a class="btnskin" href="javascript:;" title="Giao diện">
                    <i class="fa fa-paint-brush"></i>
                    </a>
                    </li>
                    </ul><?php } ?></textarea>
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['footer'] = $new_instance['footer'];
        return $instance;
    }

}
function register_new_widget_Footer() {
    register_widget( 'WG_oPhim_Footer' );
}
add_action( 'widgets_init', 'register_new_widget_Footer' );
