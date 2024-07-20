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
            <span> <?= single_tag_title(); ?></span>
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
                                the_post(); ?>
                                <div class="row" style="margin-bottom: 20px">
                                    <div class="col-md-12 blogShort">

                                        <a href="<?php the_permalink(); ?>"><img style="width: 150px;margin-right: 15px" src="<?= op_remove_domain(get_the_post_thumbnail_url()) ?>"
                                                                                 alt="<?php the_title(); ?>" class="pull-left img-responsive thumb margin10 img-thumbnail"></a>
                                        <br>
                                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                        <article>
                                            <p>
                                                <?php the_excerpt(); ?>
                                            </p></article>
                                        <a class="btn btn-blog pull-right marginBottom10" href="<?php the_permalink(); ?>">Xem thêm</a>
                                    </div>

                                </div>
                            <?php }
                            wp_reset_postdata();
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php ophim_pagination(); ?>
    </div>
</div>
<?php
get_footer();
?>
