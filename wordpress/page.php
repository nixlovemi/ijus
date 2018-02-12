<?php
get_header();
$vMT = 140;
?>

<?php
if (has_post_thumbnail()) {
    $vMT = 20;
    ?>

    <div class="container-fluid container-img-header">
        <div class="row">
            <img src="<?php the_post_thumbnail_url(); ?>" class="baner-sobre-nos img-responsive" alt="">
        </div>
    </div>

    <?php
}
?>

<div class="container" style="margin-top: <?php echo $vMT; ?>px">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading primary"><?php the_title(); ?></h2>
            <hr class="primary">
        </div>
    </div>

    <div class="row" style="margin-bottom: 30px;">
        <div class="col-lg-8 col-md-offset-2 body-html-post-portal">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    the_content();
                } // end while
            } // end if
            ?>
        </div>
    </div>

</div>

<?php
get_footer();