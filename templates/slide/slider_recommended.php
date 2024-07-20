<div class="myui-panel radius-0 padding-0 clearfix">
    <div id="home_slide" class="carousel clearfix" data-ride="carousel">
        <div class="carousel-inner">
            <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
            <div class="item text-center <?php if($key==1) : ?> active <?php endif ?>" >
                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                    <img style="width: 2074px; height: 690px;" class="img-responsive hidden-xs" src="<?= op_get_poster_url() ?>" />
                </a>
            </div>
            <?php endwhile; ?>
        </div>
        <ul class="carousel-indicators carousel-indicators-text hidden-md hidden-sm hidden-xs">
            <?php $key =0; while ($query->have_posts()) : $query->the_post(); $key++ ?>
            <li data-target="#home_slide" data-slide-to="<?= $key ?>" class="<?php if($key==1) : ?>) active <?php endif ?>">
                <h4 class="title"><?php the_title(); ?></h4>
                <p class="text margin-0"><?= op_get_original_title() ?> (<?= op_get_year() ?>)</p>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>
<script>
    $('.carousel-indicators li').on('mouseover', function() {
        $(this).trigger('click');
    })
</script>
