<?php
/* Template Name: IJUS - Boletim */
get_header();
$vMT = 140;
?>

<?php
if ( has_post_thumbnail() ) {
    $vMT = 20;
    ?>

    <div class="container-fluid">
        <div class="row">
            <img src="<?php the_post_thumbnail_url(); ?>" class="baner-sobre-nos img-responsive" alt="">
        </div>
    </div>

    <?php
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading primary"><?php echo the_title(); ?></h2>
            <hr class="primary">
        </div>
    </div>
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-lg-10 text-center col-md-offset-1">
            <?php
            $vBoletimTexto = simple_fields_value("boletim_box_fields_texto_texto");
            echo $vBoletimTexto;
            ?>
        </div>
    </div>

    <?php
    $boletimDwnUrlImg = simple_fields_values("boletim_box_fields_download_url_imagem");
    $boletimDwnTit    = simple_fields_values("boletim_box_fields_download_titulo");
    $boletimDwnUrlArq = simple_fields_values("boletim_box_fields_download_url_arquivo");

    $qtAtual   = 0;
    $qtQuebra  = 4;

    for($i=0; $i<count($boletimDwnUrlImg); $i++){
        $vUrlImg = $boletimDwnUrlImg[$i];
        $vDwnTit = $boletimDwnTit[$i];
        $vDwnArq = $boletimDwnUrlArq[$i];

        if( $qtAtual == 0 ){
            echo "<div class='row' style='margin-bottom: 20px;'>";
        }

        echo "      <div class='col-md-3'>
                      <a target='_blank' href='$vDwnArq'>
                        <img src='$vUrlImg' class='thumbnail-boletim' />
                        <br />
                        <i class='fa fa-circle-o text-primary-dark'></i>
                        - $vDwnTit -
                      </a>
                    </div>";

        $qtAtual++;

        if($qtAtual == $qtQuebra){
            echo "</div>";
            $qtAtual = 0;
        }
    }

    if($qtAtual != 0){
        echo "</div>";
    }
    ?>
</div>

<?php
get_footer();