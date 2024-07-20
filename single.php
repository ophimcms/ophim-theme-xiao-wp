<?php
get_header();
?>
<div class="container">
    <div class="row">
        <section>
            <?php
            while ( have_posts() ) : the_post();
                ?>
                <div class="group-film">
                    <h1><?php the_title(); ?></h1>
                    <div class="content">
                        <?php  the_content(); ?>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </section>
    </div>
</div>
<?php
get_footer();
?>
