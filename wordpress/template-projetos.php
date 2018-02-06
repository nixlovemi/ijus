<?php
/* Template Name: IJUS - Projetos */
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
            <h2 class="section-heading primary">Projetos</h2>
            <hr class="primary">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <p>O Instituto Juruti Sustentável apoia organizações via projetos de sustentabilidade</p>
        </div>
    </div>

    <?php
    $arrArquivos = array();

    // Projetos Apoiados
    $idxProjApoiados = 1;
    $arrArquivos[$idxProjApoiados]  = [];

    $vProjTitulo     = simple_fields_values("projetos_box_fields_proj_apoiados_titulo");
    $vProjGrupo      = simple_fields_values("projetos_box_fields_proj_apoiados_grupo");
    $vProjArquivo    = simple_fields_values("projetos_box_fields_proj_apoiados_arquivo");
    $vProjUrlArquivo = simple_fields_values("projetos_box_fields_proj_apoiados_url_arquivo");

    for($i=0; $i<count($vProjTitulo); $i++){
        $vTitulo     = $vProjTitulo[$i];
        $vGrupo      = $vProjGrupo[$i];
        $vArquivo    = $vProjArquivo[$i];
        $vUrlArquivo = $vProjUrlArquivo[$i];
        
        if(!array_key_exists($vTitulo, $arrArquivos[$idxProjApoiados])){
            $arrArquivos[$idxProjApoiados][$vTitulo] = [];
        }
        
        if(!array_key_exists($vGrupo, $arrArquivos[$idxProjApoiados][$vTitulo])){
            $arrArquivos[$idxProjApoiados][$vTitulo][$vGrupo] = [];
        }

        $arrArquivos[$idxProjApoiados][$vTitulo][$vGrupo][] = array(
            "arquivo"     => $vArquivo,
            "url_arquivo" => $vUrlArquivo,
        );
    }

    $htmlPA  = "";
    $htmlPA .= "<div id='subgrupo-$idxProjApoiados' class='download-subgrupo'>";
    foreach($arrArquivos[$idxProjApoiados] as $titulo => $arrGrupo){
        $htmlPA .= "<div class='row' style='text-align: left;'>";
        $htmlPA .= "  <div class='row' style='margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ccc;'>";
        $htmlPA .= "    <div class='col-lg-1'>";
        $htmlPA .= "      <i class='fa fa-check-circle text-primary'></i>";
        $htmlPA .= "    </div>";
        $htmlPA .= "    <div class='col-lg-10'>";
        $htmlPA .= "      <p><b>$titulo</b></p>";

        foreach($arrGrupo as $grupo => $grupoInfo){
            $htmlPA .= "      <div class='row'>";
            $htmlPA .= "        <div class='col-lg-12'>";
            $htmlPA .= "          <p>>> $grupo</p>";
            $htmlPA .= "          <ul>";

            foreach($grupoInfo as $itemDwld){
                $vArquivo = $itemDwld["arquivo"];
                $vLink    = $itemDwld["url_arquivo"];

                $htmlPA .= "        <li><a href='$vLink' target='_blank'>$vArquivo</a></li>";
            }

            $htmlPA .= "          </ul>";
            $htmlPA .= "        </div>";
            $htmlPA .= "      </div>";
        }

        $htmlPA .= "    </div>";
        $htmlPA .= "  </div>";
        $htmlPA .= "</div>";
    }
    $htmlPA .= "</div>";
    // =================

    // demanda espontanea
    $idxDemandaEsp = 2;
    $arrArquivos[$idxDemandaEsp] = [];

    $vDemandaEspTitulo     = simple_fields_values("projetos_box_fields_demanda_esp_titulo");
    $vDemandaEspArquivo    = simple_fields_values("projetos_box_fields_demanda_esp_arquivo");
    $vDemandaEspArquivoUrl = simple_fields_values("projetos_box_fields_demanda_esp_url_arquivo");

    for($i=0; $i<count($vDemandaEspTitulo); $i++){
        $vTitulo     = $vDemandaEspTitulo[$i];
        $vArquivo    = $vDemandaEspArquivo[$i];
        $vUrlArquivo = $vDemandaEspArquivoUrl[$i];

        if(!array_key_exists($vTitulo, $arrArquivos[$idxDemandaEsp])){
            $arrArquivos[$idxDemandaEsp][$vTitulo] = [];
        }

        $arrArquivos[$idxDemandaEsp][$vTitulo][] = array(
            "arquivo"     => $vArquivo,
            "url_arquivo" => $vUrlArquivo,
        );
    }

    $htmlDE  = "";
    $htmlDE .= "<div id='subgrupo-$idxDemandaEsp' class='download-subgrupo'>";
    foreach($arrArquivos[$idxDemandaEsp] as $titulo => $arrTitulos){
        $htmlDE .= "<div class='row' style='text-align: left;'>";
        $htmlDE .= "  <div class='row' style='margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ccc;'>";
        $htmlDE .= "    <div class='col-lg-1'>";
        $htmlDE .= "      <i class='fa fa-check-circle text-primary'></i>";
        $htmlDE .= "    </div>";
        $htmlDE .= "    <div class='col-lg-10'>";
        $htmlDE .= "      <p><b>$titulo</b></p>";
        $htmlDE .= "      <div class='row'>";
        $htmlDE .= "        <div class='col-lg-12'>";
        $htmlDE .= "          <ul>";

        foreach($arrTitulos as $itemDwld){
            $vArquivo = $itemDwld["arquivo"];
            $vLink    = $itemDwld["url_arquivo"];

            $htmlDE .= "        <li><a href='$vLink' target='_blank'>$vArquivo</a></li>";
        }

        $htmlDE .= "          </ul>";
        $htmlDE .= "        </div>";
        $htmlDE .= "      </div>";
        $htmlDE .= "    </div>";
        $htmlDE .= "  </div>";
        $htmlDE .= "</div>";
    }
    $htmlDE .= "</div>";
    // ==================

    // projetos parceiros
    $idxProjParceiro = 3;
    $arrArquivos[$idxProjParceiro] = [];

    $vProjParceiroTitulo     = simple_fields_values("projetos_box_fields_proj_parceria_titulo");
    $vProjParceiroGrupo      = simple_fields_values("projetos_box_fields_proj_parceria_grupo");
    $vProjParceiroTexto      = simple_fields_values("projetos_box_fields_proj_parceria_texto");
    $vProjParceiroArquivo    = simple_fields_values("projetos_box_fields_proj_parceria_arquivo");
    $vProjParceiroUrlArquivo = simple_fields_values("projetos_box_fields_proj_parceria_url_arquivo");

    for($i=0; $i<count($vProjParceiroTitulo); $i++){
        $vTitulo     = $vProjParceiroTitulo[$i];
        $vGrupo      = $vProjParceiroGrupo[$i];
        $vTexto      = $vProjParceiroTexto[$i];
        $vArquivo    = $vProjParceiroArquivo[$i];
        $vUrlArquivo = $vProjParceiroUrlArquivo[$i];

        if(!array_key_exists($vTitulo, $arrArquivos[$idxProjParceiro])){
            $arrArquivos[$idxProjParceiro][$vTitulo] = [];
        }

        if(!array_key_exists($vGrupo, $arrArquivos[$idxProjParceiro][$vTitulo])){
            $arrArquivos[$idxProjParceiro][$vTitulo][$vGrupo] = [];
        }

        $arrArquivos[$idxProjParceiro][$vTitulo][$vGrupo][] = array(
            "texto"       => $vTexto,
            "arquivo"     => $vArquivo,
            "url_arquivo" => $vUrlArquivo,
        );
    }

    $htmlPP  = "";
    $htmlPP .= "<div id='subgrupo-$idxProjParceiro' class='download-subgrupo'>";
    foreach($arrArquivos[$idxProjParceiro] as $titulo => $arrGrupo){
        $htmlPP .= "<div class='row' style='text-align: left;'>";
        $htmlPP .= "  <div class='row' style='margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ccc;'>";
        $htmlPP .= "    <div class='col-lg-1'>";
        $htmlPP .= "      <i class='fa fa-check-circle text-primary'></i>";
        $htmlPP .= "    </div>";
        $htmlPP .= "    <div class='col-lg-10'>";
        $htmlPP .= "      <p><b>$titulo</b></p>";

        foreach($arrGrupo as $grupo => $grupoInfo){
            $htmlPP .= "      <div class='row'>";
            $htmlPP .= "        <div class='col-lg-12'>";
            $htmlPP .= "          <p>>> $grupo</p>";
            $htmlPP .= "          <ul>";

            foreach($grupoInfo as $itemDwld){
                $vTexto   = (trim($itemDwld["texto"]) != "") ? nl2br($itemDwld["texto"]): "";
                $vArquivo = $itemDwld["arquivo"];
                $vLink    = $itemDwld["url_arquivo"];

                $htmlPP .= "        <li>";
                $htmlPP .= "          $vTexto";
                $htmlPP .= "          <a href='$vLink' target='_blank'>$vArquivo</a>";
                $htmlPP .= "        </li>";
            }

            $htmlPP .= "          </ul>";
            $htmlPP .= "        </div>";
            $htmlPP .= "      </div>";
        }

        $htmlPP .= "    </div>";
        $htmlPP .= "  </div>";
        $htmlPP .= "</div>";
    }
    $htmlPP .= "</div>";
    // ==================
    ?>

    <div class="row" style="text-align: center; margin-top: 30px;">
        <div>
            <div class="col-md-3 col-lg-offset-1 col-offset-custom dv-btn-grp-download">
                <a href="javascript:;" class="btn-green download-click-grp" id="grp-1" data-grp-id="<?php echo $idxProjApoiados; ?>">Projetos Apoiados</a>
            </div>
            <div class="col-md-3 col-lg-offset-1 col-offset-custom dv-btn-grp-download">
                <a href="javascript:;" class="btn-green download-click-grp" id="grp-2" data-grp-id="<?php echo $idxDemandaEsp; ?>">Demanda Espontânea</a>
            </div>
            <div class="col-md-3 col-lg-offset-1 col-offset-custom dv-btn-grp-download">
                <a href="javascript:;" class="btn-green download-click-grp" id="grp-3" data-grp-id="<?php echo $idxProjParceiro; ?>">Projetos em Parceria</a>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-lg-offset-2 col-offset-custom" style="margin-top: 30px;">
        <?php
        echo $htmlPA;
        echo $htmlDE;
        echo $htmlPP;
        ?>
    </div>
</div>

<?php
get_footer();