<style>
    @media(max-width:767px) {
        #star img {
            width: 18px;
            height: 18px;
        }
    }

    @media(max-width:360px) {
        #star img {
            width: 16px;
            height: 16px;
        }
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-lg-wide-75 col-md-wide-7 col-xs-1 padding-0">
            <div class="myui-panel myui-panel-bg clearfix">
                <div class="myui-panel-box clearfix">
                    <div class="col-xs-1">
                    <span class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <span itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" itemprop="url" href="/" title="Trang Chủ">
                                <span itemprop="name">
                                    <i class="fa fa-home"></i> Phim Mới <i class="fa fa-angle-right"></i>
                                </span>
                            </a>
                            <meta itemprop="position" content="1" />
                        </span>
                        <span><?php the_title(); ?></span>
                    </span>
                    </div>
                    <div class="col-xs-1">
                        <div class="myui-content__thumb">
                            <a class="myui-vodlist__thumb picture" href="/watch/black-adam" title="黑亚当">
                                <img class="lazyload" src="<?= get_template_directory_uri() ?>/assets/img/0e1ec6516.gif"
                                     data-original="<?= op_get_thumb_url() ?>" />
                                <span class="play hidden-xs"></span>
                            </a>
                        </div>
                        <div class="myui-content__detail">
                            <h1 class="title"><?php the_title(); ?></h1>
                            <h2 class="font-18 text-muted"><?= op_get_original_title() ?></h2>

                            <div class="data">
                                <input id="hint_current" type="hidden" value="" />
                                <input id="score_current" type="hidden" value="<?= op_get_rating() ?>" />
                                <div id="star" data-score="<?= op_get_rating() ?>" style="cursor: pointer;"></div>
                                <span id="hint"></span>
                                <div id="div_average" style="">
                                    (<span class="average" id="average"><?= op_get_rating() ?></span> đ/<span id="rate_count"> / <?= op_get_rating_count() ?></span> lượt)
                                </div>
                                <span class="hidden" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
                                <meta itemprop="ratingValue" content="<?= op_get_rating() ?>" />
                                <meta itemprop="ratingcount" content="<?= op_get_rating_count() ?>" />
                                <meta itemprop="bestRating" content="10" />
                                <meta itemprop="worstRating" content="1" />
                            </span>
                            </div>

                            <p class="data">
                                <span class="split-line"></span>
                                <span class="text-muted hidden-xs">Quốc gia: </span>
                                <?= op_get_regions(', ') ?>
                                <span class="split-line"></span>
                                <span class="text-muted hidden-xs">Năm sản xuất: </span>
                                <?= op_get_years() ?>
                                <span class="split-line"></span>
                                <span class="text-muted hidden-xs">Lượt xem: </span>
                                <i class="fa fa-eye"></i>  <?= op_get_post_view() ?>
                            </p>
                            <p class="data hidden-sm">
                                <span class="text-muted">Trạng thái: </span>
                                <span class="text-red"><?= op_get_status() ?></span>
                            </p>
                            <p class="data">
                                <span class="text-muted">Thể loại: </span>
                                <?= op_get_genres(', ') ?>
                            </p>
                            <p class="data hidden-xs">
                                <span class="text-muted">Đạo diễn: </span>
                                <?= op_get_directors(110,', ') ?>
                            </p>
                            <p class="data hidden-xs">
                                <span class="text-muted">Diễn viên: </span>
                                <?= op_get_actors(100,', ') ?>
                            </p>
                        </div>
                        <div class="myui-content__operate">
                          <?php if (watchUrl()) { ?>
                            <a class="btn btn-warm" href="<?= watchUrl() ?>">
                                <i class="fa fa-play"></i> XEM PHIM </a>
                          <?php } ?>
                             <?php if (op_get_trailer_url()) { ?>
                            <a class="btn btn-danger" href="<?= op_get_trailer_url() ?>" target="_blank">
                                <i class="fa fa-star"></i>Trailer </a>
                             <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="myui-panel myui-panel-bg clearfix" id="desc">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head active bottom-line clearfix">
                            <h3 class="title">Nội dung phim</h3>
                        </div>
                    </div>
                    <div class="myui-panel_bd">
                        <div class="col-pd text-collapse content">
                            <p><?php the_content();?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="myui-panel-box clearfix">
                <div class="myui-panel_bd">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head clearfix">
                            <h3 class="title">Bình luận</h3>
                        </div>
                    </div>
                    <div class="myui-panel_bd" style="background: #FFF">
                        <div class="fb-comments w-full" data-href="<?= getCurrentUrl() ?>" data-width="100%"
                 data-numposts="5" data-colorscheme="light" data-lazy="true">
            </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(".tab-pane:first,.nav-tabs li:first").addClass("active");
            </script>
            <div class="myui-panel myui-panel-bg clearfix">
                <div class="myui-panel-box clearfix">
                    <div class="myui-panel_hd">
                        <div class="myui-panel__head active bottom-line clearfix">
                            <h3 class="title">Có thể bạn muốn xem</h3>
                        </div>
                    </div>
                    <div class="tab-content myui-panel_bd">
                        <ul id="actor" class="myui-vodlist__bd tab-pane fade in active clearfix">
                            <?php
                            $postType = 'ophim';
                            $taxonomyName = 'ophim_genres';
                            $taxonomy = get_the_terms(get_the_id(), $taxonomyName);
                            if ($taxonomy) {
                                $category_ids = array();
                                foreach ($taxonomy as $individual_category) $category_ids[] = $individual_category->term_id;
                                $args = array('post_type' => $postType, 'post__not_in' => array(get_the_id()), 'posts_per_page' => 12, 'tax_query' => array(array('taxonomy' => $taxonomyName, 'field' => 'term_id', 'terms' => $category_ids,),));
                                $my_query = new wp_query($args);

                                if ($my_query->have_posts()):
                                    while ($my_query->have_posts()):$my_query->the_post(); ?>
                                        <li class="col-lg-6 col-md-6 col-sm-4 col-xs-3">
                                            <?php  include THEMETEMPLADE.'/section/section_thumb_item.php';?>
                                        </li>
                                    <?php
                                    endwhile;
                                endif;
                                wp_reset_query();
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
add_action('wp_footer', function (){?>
    <link href="<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/jquery.raty.css" rel="stylesheet" />
    <script src="<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/jquery.raty.js"></script>

    <script>
        var rated = false;
        jQuery(document).ready(function($) {
            $('#star').raty({
                number: 10,
                starHalf: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-half.png',
                starOff: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-off.png',
                starOn: '<?= get_template_directory_uri() ?>/assets/libs/jquery-raty/images/star-on.png',
                click: function(score, evt) {
                    if (!rated) {
                        $.ajax({
                            url: '<?php echo admin_url('admin-ajax.php')?>',
                            type: 'POST',
                            data:{
                                action: "ratemovie",
                                rating: score,
                                postid: '<?php echo get_the_ID(); ?>',
                            },
                        }).done(function (data) {
                            layer.msg(
                                "Đánh giá của bạn đã được gửi đi.",
                                {
                                    anim: 5,
                                    time: 3000,
                                },
                                function () {
                                }
                            );
                            rated = true;
                        });
                    }
                }
            });
        })
    </script>

<?php }) ?>