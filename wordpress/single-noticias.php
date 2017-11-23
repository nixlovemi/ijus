<?php
get_header();
?>

<?php  while ( have_posts() ) : the_post(); ?>

    <div class="container" style="margin-top: 140px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading primary">
                    <?php the_title(); ?>
                </h2>
                <hr class="primary" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

<?php endwhile; ?>

<?php
get_footer();
?>