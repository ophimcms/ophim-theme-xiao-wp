<?php
get_header();
?>

<div class="container">
    <div class="row">
        <div class="myui-panel active myui-panel-bg2 clearfix" style="margin-top: 30px">

            <div class="col-xs-1">
        <span class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
            <span itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" itemprop="url" href="/" title="Trang Chủ">
                    <span itemprop="name">
                        <i class="fa fa-home"></i> <?= get_bloginfo('name'); ?> <i class="fa fa-angle-right"></i>
                    </span>
                </a>
                <meta itemprop="position" content="1" />
            </span>
            <span> Tất cả phim</span>
        </span>
            </div>

            <div class="myui-panel-box clearfix">
                <div class="myui-panel_hd">
                    <div class="myui-panel__head active bottom-line clearfix"><a class="slideDown-btn more pull-right"
                                                                                 href="javascript:;">Thu gọn <i class="fa fa-angle-up"></i></a>
                        <h3 class="title"> <?= single_tag_title(); ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="myui-panel myui-panel-bg clearfix">
            <div class="myui-panel-box clearfix">
                <div class="myui-panel_bd">
                    <ul class="myui-vodlist clearfix">
                        <?php
                        if (have_posts()) {
                            while (have_posts()) {
                                the_post();
                                echo '  <li class="col-lg-8 col-md-6 col-sm-4 col-xs-3">';
                                include THEMETEMPLADE . '/section/section_thumb_item.php';
                                echo ' </li>';
                            }
                            wp_reset_postdata();
                        } else { ?>
                            <p>Rất tiếc, không có nội dung nào trùng khớp yêu cầu</p>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php ophim_pagination(); ?>
    </div>
</div>
<?php
add_action('wp_footer', function () { ?>
    <script>
        $(document).ready(function () {
            function URL_add_parameter(url, param, value) {
                var hash = {};
                var parser = document.createElement('a');

                parser.href = url;

                var parameters = parser.search.split(/\?|&/);

                for (var i = 0; i < parameters.length; i++) {
                    if (!parameters[i])
                        continue;

                    var ary = parameters[i].split('=');
                    hash[ary[0]] = ary[1];
                }

                hash[param] = value;

                var list = [];
                Object.keys(hash).forEach(function (key) {
                    list.push(key + '=' + hash[key]);
                });

                parser.search = '?' + encodeURI(list.join('&'));
                return parser.href;
            }

            $("#panel_filter ul li span").on('click', function (e) {
                var filterUrl = location.origin + decodeURI(location.search);
                var filterName = e.target.getAttribute('filter-name');
                var filterValue = e.target.getAttribute('filter-value');
                location.href = URL_add_parameter(filterUrl, filterName, filterValue);
            })
        });
    </script>
<?php }) ?>
<?php
get_footer();
?>
