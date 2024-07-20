<div class="col-lg-4 col-md-4 col-sm-2 col-xs-1 padding-0">
    <div class="myui-panel_hd">
        <div class="myui-panel__head clearfix">
            <h3 class="title"><?= $title; ?></h3>
        </div>
    </div>
    <div class="myui-panel_bd">
        <ul class="myui-vodlist__media active col-pd clearfix">
            <li>
                <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++; if($key == 1){?>
                    <div class="thumb"><a class="myui-vodlist__thumb img-xs-70 lazyload"
                                          href="<?php the_permalink(); ?>"
                                          title="<?php the_title(); ?>"
                                          data-original="<?= op_get_thumb_url() ?>"></a></div>
                    <div class="detail detail-side">
                        <h4 class="title"><a href="<?php the_permalink(); ?>"><i
                                        class="fa fa-angle-right text-muted pull-right"></i><?php the_title(); ?></a>
                        </h4>
                        <p class="font-12"><span
                                    class="text-muted"><?= op_get_original_title() ?></span><span
                                    class="text-muted"> (<?= op_get_year() ?>)</span></p>
                        <p class="font-12 margin-0">
                                        <span class="text-muted"><i class="fa fa-eye"></i>
                                        </span><?= op_get_post_view() ?>
                            <span class="text-muted"><i class="fa fa-star"></i>
                                        </span><?= op_get_rating() ?>
                        </p>
                    </div>
                <?php } endwhile; ?>
            </li>
        </ul>
        <ul class="myui-vodlist__text col-pd clearfix">
            <?php $key =0; while ($query->have_posts()) : $query->the_post();
                switch ($key) {
                    case 0:
                        $class_top = 'badge-first';
                        break;
                    case 1:
                        $class_top = 'badge-second';
                        break;
                    case 2:
                        $class_top = 'badge-third';
                        break;
                    default:
                        $class_top = '';
                        break;
                }
                $key++;
                ?>
                <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="badge <?= $class_top ?>"><?= $key ?></span><?php the_title(); ?></a></li>

            <?php endwhile; ?>
        </ul>
    </div>
</div>