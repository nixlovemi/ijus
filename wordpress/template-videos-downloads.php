<?php
/* Template Name: IJUS - Vídeos/Downloads */
get_header();
$vMT = 140;
?>

<?php
if ( has_post_thumbnail() ) {
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

<section class="bg-white" id="contact" style="margin-top: <?php echo $vMT; ?>px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading primary"><?php the_title(); ?></h2>
                <hr class="primary">
            </div>
        </div>

        <div class="row" style="text-align: center; margin-top: 30px;">
            <h4><b>VÍDEOS</b></h4>

            <br /><br />

            <?php
            $vidDownTitulo    = simple_fields_values("videos_downloads_box_fields_titulo");
            $vidDownDescricao = simple_fields_values("videos_downloads_box_fields_descricao");
            $vidDownYoutube   = simple_fields_values("videos_downloads_box_fields_youtube");

            $idxQuebra  = 0;
            $vlrQuebra  = 2;
            $htmlVideos = "";
            for($i=0; $i<count($vidDownTitulo); $i++){
                $vTitulo    = $vidDownTitulo[$i];
                $vDescricao = $vidDownDescricao[$i];
                $vYoutube   = trim($vidDownYoutube[$i]);

                if($idxQuebra == 0){
                    $htmlVideos .= "<div>";
                }

                // checa se o link do youtube está com embed
                $posWatch = strpos($vYoutube, "watch?v=");
                if($posWatch !== false){
                    $arrLinkYT = explode("watch?v=", $vYoutube);
                    $vYoutube  = "https://www.youtube.com/embed/" . $arrLinkYT[1];
                }

                // conteudo
                // https://www.youtube.com/watch?v=xrcjMBT5_wo
                // https://www.youtube.com/embed/xrcjMBT5_wo
                $htmlVideos .= "<div class='col-md-6 dv-btn-grp-download'>
                                    <p>$vTitulo</p>
                                    <p><i>$vDescricao</i></p>
                                    <div class='video-container'>
                                        <iframe src='$vYoutube' allow='autoplay; encrypted-media' allowfullscreen='' width='560' height='315' frameborder='0'></iframe>
                                    </div>
                                </div>";

                $idxQuebra++;
                if($idxQuebra == $vlrQuebra){
                    $htmlVideos .= "</div>";
                    $idxQuebra = 0;
                }
            }

            if($idxQuebra != 0){
               $htmlVideos .= "</div>";
            }

            echo $htmlVideos;
            ?>
        </div>


        <div class="row" style="text-align: center; margin-top: 30px;">
            <div class="col-md-8 col-lg-offset-2 col-offset-custom" style="margin-top: 30px;">
                <h4><b>DOWNLOADS</b></h4>

                <br /><br />

                <div class="row" style="text-align: left;">
                    <?php
                    $vidDownArqTitulo    = simple_fields_values("videos_downloads_box_fields_arquivos_titulo");
                    $vidDownArqDescricao = simple_fields_values("videos_downloads_box_fields_arquivos_descricao");
                    $vidDownArqLink      = simple_fields_values("videos_downloads_box_fields_arquivos_arquivo");

                    for($i=0; $i<count($vidDownArqTitulo); $i++){
                        $vArqTitulo    = $vidDownArqTitulo[$i];
                        $vArqDescricao = $vidDownArqDescricao[$i];
                        $vArqLink      = $vidDownArqLink[$i];

                        echo "<div class='row' style='margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ccc;'>
                                <div class='col-lg-1'>
                                    <i class='fa fa-check-circle text-primary'></i>
                                </div>
                                <div class='col-lg-10'>
                                    <p>$vArqTitulo</p>
                                    <p><i>$vArqDescricao</i></p>
                                    <div class='row'>
                                        <div class='col-lg-12'>
                                            <a href='$vArqLink' target='_blank'>Arquivo download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();