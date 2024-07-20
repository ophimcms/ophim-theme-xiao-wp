<div class="myui-vodlist__box"><a class="myui-vodlist__thumb lazyload" href="<?php the_permalink(); ?>"
                                  title="<?php the_title(); ?>" data-original="<?= op_get_thumb_url() ?>"><span class="play hidden-xs"></span><span
                class="pic-tag pic-tag-top"><span class="tag"
                                                  style="background-color: #ff9900;"><?= op_get_episode() ?></span></span><span
                class="pic-text text-right"></span></a>
    <div class="myui-vodlist__detail">
        <h4 class="title text-overflow"><a href="<?php the_permalink(); ?>"
                                           title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
        <p class="text text-overflow text-muted hidden-xs"><?= op_get_original_title() ?> (<?= op_get_year() ?>)</p>
    </div>
</div>
