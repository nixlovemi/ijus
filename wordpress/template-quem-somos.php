<?php
/* Template Name: IJUS - Quem Somos */
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
        <div class="col-lg-8 col-md-offset-2">
            <?php
            $vTextoInicial = simple_fields_value("quem_somos_box_fields_texto_inicial_text");
            echo $vTextoInicial;
            ?>
        </div>
    </div>

    <?php
    $vTitulos = simple_fields_values("quem_somos_box_fields_bloco_texto_titulo");
    $vTextos  = simple_fields_values("quem_somos_box_fields_bloco_texto_texto");

    for($i=0; $i<count($vTitulos); $i++){
        $titulo = $vTitulos[$i];
        $texto  = $vTextos[$i];

        echo "<div class='row' style='margin-bottom: 30px;'>";
        echo "  <div class='col-lg-12 text-center'>";
        echo "    <h2 class='section-heading primary'>$titulo</h2>";
        echo "    <hr class='primary'>";
        echo "  </div>";
        echo "  <div class='col-lg-8 col-md-offset-2'>";
        echo $texto;
        echo "  </div>";
        echo "</div>";
    }
    ?>

    <?php
    $vLinksTit = simple_fields_values("quem_somos_box_fields_links_titulo");
    $vLinksIco = simple_fields_values("quem_somos_box_fields_links_icone");
    $vLinksUrl = simple_fields_values("quem_somos_box_fields_links_arquivo");
    
    $qtAtual3 = 0;
    $qtQuebra = 3;
    
    for($i=0; $i<count($vLinksTit); $i++){
        $vLinkTitulo = $vLinksTit[$i];
        $vLinkIcon   = $vLinksIco[$i];
        $vLinkPath   = $vLinksUrl[$i];
        $vOffset     = ($qtAtual3 == 0) ? "col-md-offset-2": "col-md-offset-1";

        if($qtAtual3 == 0){
            echo "<div class='row'>";
        }

        echo "<div class='col-md-2 $vOffset'>
                <h3 class='section-heading primary'>$vLinkTitulo!!</h3>
                <a href='$vLinkPath' target='_blank'>
                    <img src='$vLinkIcon' class='icon associados-icon'>
                </a>
              </div>";

        $qtAtual3++;

        if($qtAtual3 == $qtQuebra){
            echo "</div>";
            $qtAtual3 = 0;
        }
    }

    if($qtAtual3 != 0){
        echo "</div>";
    }
    ?>
    
    <br><br><br>

    <?php
    $vFormTexto = simple_fields_value("quem_somos_box_fields_formulario_texto");
    $vFormURL   = simple_fields_value("quem_somos_box_fields_formulario_url_arquivo");
    
    if($vFormURL != ""){
        ?>
    
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <?php
                echo $vFormTexto;
                ?>
                <br />
                <a target="_blank" href="<?php echo $vFormURL; ?>" class="btn-green">Formulário de pedido de participação</a>
            </div>
        </div>
    
        <?php
    }
    ?>
    
</div>

<?php
get_footer();