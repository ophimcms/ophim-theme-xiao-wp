<div class="myui-panel myui-panel-bg clearfix">
    <div class="myui-panel-box clearfix">
        <div class="myui-panel_hd">
            <div class="myui-panel__head clearfix">
                <?php if($slug): ?>
                <span class="text-muted more pull-right"><span class="split-line"></span><a href="<?= $slug; ?>">Xem thêm</a></span>
                <?php endif ?>
                <h3 class="title"><?= $title; ?></h3>
            </div>
        </div>
        <div class="myui-panel_bd clearfix">
            <ul class="myui-vodlist clearfix">
                <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++;
                echo '<li class="col-lg-8 col-md-8 col-sm-4 col-xs-3">';
                    include THEMETEMPLADE.'/section/section_thumb_item.php';
                    echo '</li>';
                endwhile; ?>
            </ul>
        </div>
    </div>
</div>
