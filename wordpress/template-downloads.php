<?php
/* Template Name: IJUS - Downloads */
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

<div class="container" style="margin-top: <?php echo $vMT; ?>px">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading primary">Editais & TDRs</h2>
            <hr class="primary">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <p>Faça Download dos Editais e TDRs – Termo de Referência abertos no momento: </p>
        </div>
    </div>

    <?php
    $vDownloadsGrupo   = simple_fields_values("downloads_box_fields_grupo");
    $vDownloadsTitulo  = simple_fields_values("downloads_box_fields_titulo");
    $vDownloadsNomeArq = simple_fields_values("downloads_box_fields_nome_arq");
    $vDownloadsNomeLnk = simple_fields_values("downloads_box_fields_link_arq");

    $arrArquivos = array();
    for($i=0; $i<count($vDownloadsGrupo); $i++){
        $vGrupo   = $vDownloadsGrupo[$i];
        $vTitulo  = $vDownloadsTitulo[$i];
        $vNomeArq = $vDownloadsNomeArq[$i];
        $vNomeLnk = $vDownloadsNomeLnk[$i];

        if(!array_key_exists($vGrupo, $arrArquivos)){
            $arrArquivos[$vGrupo] = array();
        }

        if(!array_key_exists($vTitulo, $arrArquivos[$vGrupo])){
            $arrArquivos[$vGrupo][$vTitulo] = array();
        }

        $arrArquivos[$vGrupo][$vTitulo][] = array(
            "nomeArquivo" => $vNomeArq,
            "linkArquivo" => $vNomeLnk,
        );
    }
    ?>

    <div class="row" style="text-align: center; margin-top: 30px;">
        <?php
        $i     = 0;
        $idGrp = 1;
        foreach($arrArquivos as $grupo => $arrTitulos){
            if($i == 0){
                echo "<div>";
            }

            echo "      <div class='col-md-4 col-lg-offset-1 col-offset-custom dv-btn-grp-download'>
                          <a href='javascript:;' class='btn-green download-click-grp' id='grp-$idGrp' data-grp-id='$idGrp'>$grupo</a>
                        </div>";
            $i++;
            $idGrp++;

            if($i == 2){
                echo "</div>";
                $i = 0;
            }
        }

        if($i != 0){
            echo "</div>";
        }
        ?>
    </div>

    <div class="col-md-8 col-lg-offset-2 col-offset-custom" style="margin-top: 30px;">
        <?php
        $idGrp2 = 1;
        foreach($arrArquivos as $grupo => $arrTitulos){
            echo "<div id='subgrupo-$idGrp2' class='download-subgrupo'>";

            foreach($arrTitulos as $titulo => $arrInfo){
                echo "<div class='row' style='text-align: left;'>";
                echo "  <div class='row' style='margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ccc;'>";
                echo "    <div class='col-lg-1'>";
                echo "      <i class='fa fa-check-circle text-primary'></i>";
                echo "    </div>";
                echo "    <div class='col-lg-10'>";
                echo "      <p>$titulo</p>";
                echo "      <div class='row'>";
                echo "        <div class='col-lg-12'>";

                foreach($arrInfo as $itemDwld){
                    $vArquivo = $itemDwld["nomeArquivo"];
                    $vLink    = $itemDwld["linkArquivo"];

                    echo "      <a href='$vLink' target='_blank'>$vArquivo</a>";
                    echo "      <br />";
                }

                echo "        </div>";
                echo "      </div>";
                echo "    </div>";
                echo "  </div>";
                echo "</div>";


                ?>

                <?php
            }

            echo "</div>";
            $idGrp2++;
        }
        ?>
    </div>

    <?php
    /*
    <div class="row" style="text-align: center;">
        <div class="col-md-8 col-lg-offset-2 col-offset-custom">
            <?php
            $vDownloadsGrupo   = simple_fields_values("downloads_box_fields_grupo");
            $vDownloadsTitulo  = simple_fields_values("downloads_box_fields_titulo");
            $vDownloadsNomeArq = simple_fields_values("downloads_box_fields_nome_arq");
            $vDownloadsNomeLnk = simple_fields_values("downloads_box_fields_link_arq");

            $arrArquivos = array();
            for($i=0; $i<count($vDownloadsGrupo); $i++){
                $vGrupo   = $vDownloadsGrupo[$i];
                $vTitulo  = $vDownloadsTitulo[$i];
                $vNomeArq = $vDownloadsNomeArq[$i];
                $vNomeLnk = $vDownloadsNomeLnk[$i];

                if(!array_key_exists($vGrupo, $arrArquivos)){
                    $arrArquivos[$vGrupo] = array();
                }

                if(!array_key_exists($vTitulo, $arrArquivos[$vGrupo])){
                    $arrArquivos[$vGrupo][$vTitulo] = array();
                }

                $arrArquivos[$vGrupo][$vTitulo][] = array(
                    "nomeArquivo" => $vNomeArq,
                    "linkArquivo" => $vNomeLnk,
                );
            }

            foreach($arrArquivos as $grupo => $arrTitulos){
                echo "<h3 style='margin-bottom: 20px;'>$grupo</h3>";

                foreach($arrTitulos as $titulo => $arrInfo){
                    echo "<div class='row' style='text-align: left;'>";
                    echo "  <div class='row' style='margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ccc;'>";
                    echo "    <div class='col-lg-1'>";
                    echo "      <i class='fa fa-check-circle text-primary'></i>";
                    echo "    </div>";
                    echo "    <div class='col-lg-10'>";
                    echo "      <p>$titulo</p>";
                    echo "      <div class='row'>";
                    echo "        <div class='col-lg-12'>";

                    foreach($arrInfo as $itemDwld){
                        $vArquivo = $itemDwld["nomeArquivo"];
                        $vLink    = $itemDwld["linkArquivo"];

                        echo "      <a href='$vLink' target='_blank'>$vArquivo</a>";
                        echo "      <br />";
                    }

                    echo "        </div>";
                    echo "      </div>";
                    echo "    </div>";
                    echo "  </div>";
                    echo "</div>";
                    
                    
                    ?>

                    <?php
                }
            }
            ?>
        </div>
    </div>
    */
    ?>
</div>

<?php
get_footer();