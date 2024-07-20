<?php

function add_theme_widgets() {
    $activate = array(
        'widget-footer' => array(
            'wg_footer-0',
        )
    );
    update_option('widget_wg_footer', array(
        0 => array('footer' => '<div class="myui-foot clearfix">
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
                    </ul>')
    ));
    update_option('sidebars_widgets',  $activate);

}

add_action('after_switch_theme', 'add_theme_widgets', 10, 2);