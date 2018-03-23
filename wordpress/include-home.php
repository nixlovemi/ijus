<?php
/* Template Name: IJUS - Homepage */

get_header();
?>

<header id="home">
    <div class="header-content">
        <div class="header-content-inner">
            <div id="myCarouselMain" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <h3 id="homeHeading">CONTRIBUINDO PARA O DESENVOLVIMENTO<br> SUSTENTÁVEL DE JURUTI E ENTORNO</h3>
                    </div>
                    <div class="item">
                        <h3 id="homeHeading">Atender as necessidades do presente,<br> sem comprometer o futuro...</h3>
                    </div>
                    <div class="item">
                        <h3 id="homeHeading">Construir um amanhã<br> melhor para todos.</h3>
                    </div>
                </div>
            </div>

        </div>

        <div class="header-footer">
            <a href="#about" class="page-scroll"><i class="fa fa-2x fa-angle-double-down" style="color:#fff" aria-hidden="true"></i></a>
        </div>
    </div>
</header>

<?php
$quemSomosTitulo = trim( simple_fields_value('home_box_quem_somos_fields_titulo') );
$quemSomosLink   = trim( simple_fields_value('home_box_quem_somos_fields_link_titulo') ) ;
$quemSomosDesc   = trim( simple_fields_value('home_box_quem_somos_fields_descricao') );

if($quemSomosTitulo != "" || $quemSomosDesc != ""){
    ?>

    <section class="bg-white quem-somos-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="col-lg-7 col-lg-offset-4 text-center">
                        <?php
                        $strQuemSomosLink = ($quemSomosLink != "") ? $quemSomosLink: "javascript:;";
                        ?>
                        <a href="<?php echo $strQuemSomosLink; ?>" class="link-home">
                            <h2 class="section-heading primary" style="display:inline"><?php echo $quemSomosTitulo; ?></h2>
                        </a>
                        <hr class="primary">
                        <p class="text-muted text-justify">
                            <?php echo nl2br($quemSomosDesc); ?>
                        </p>

                        <div class="header-footer custom-size">
                            <a href="#destaques" class="page-scroll"><i class="fa fa-2x fa-angle-double-down" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
}
?>

<?php
$destaqueTitulo = trim( simple_fields_value('home_box_destaque_fields_titulo') );
$destaqueDesc   = trim( simple_fields_value('home_box_destaque_fields_descricao') );
$destaqueImg    = trim( simple_fields_value('home_box_destaque_fields_imagem') );
$destaqueImgLnk = trim( simple_fields_value('home_box_destaque_fields_img_link') );

if($destaqueTitulo != "" && $destaqueDesc != ""){
    $strDestaqueLnk = ($destaqueImgLnk != "") ? $destaqueImgLnk: "javascript:;";
    $strDestaqueImg = ($destaqueImg != "") ? $destaqueImg: URL_IMG_NO_IMAGE;
    ?>
    
    <section class="bg-white" id="destaques">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="<?php echo $strDestaqueLnk; ?>" class="link-home">
                        <h2 class="section-heading primary" style="display:inline">DESTAQUE</h2>
                    </a>
                    <hr class="primary">
                    <div class="col-lg-4 col-lg-offset-2 custom-column">
                        <a href="views/noticias/23-08/noticia.php">
                            <img src="<?php echo $strDestaqueImg; ?>" class="img-destaques img-responsive" alt="" width="330" />
                        </a>
                    </div>
                    <div class="col-lg-5">
                        <h4 class="text-primary text-left">
                            <strong><?php echo $destaqueTitulo; ?></strong>
                        </h4>
                        <div class="text-muted text-left">
                            <?php
                            echo nl2br($destaqueDesc);
                            ?>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="header-footer custom-size-destaques">
                        <a href="#portfolio" class="page-scroll"><i class="fa fa-2x fa-angle-double-down" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
}
?>

<?php
$galeriaImgTit = simple_fields_values('home_box_galeria_fields_imagem_titulo');
$galeriaImgUrl = simple_fields_values('home_box_galeria_fields_imagem_url');

if( count($galeriaImgTit) > 0 ){
    $qtQuebra  = 6;
    $qtAtual   = 0;
    $firstLoop = true;
    $cssItem   = " active ";

    echo "<section class='no-padding' id='portfolio'>";
    echo "  <div class='container-fluid'>";
    echo "    <div class='row no-gutter popup-gallery text-center'>";
    echo "      <h2 class='section-heading primary'>Galeria</h2>";
    echo "      <hr class='primary' />";
    echo "      <div id='myCarousel' class='carousel slide lelex' data-ride='carousel'>";
    echo "        <div class='carousel-inner'>";

    for($i=0; $i<count($galeriaImgTit); $i++){
        $vTitulo = $galeriaImgTit[$i];
        $vImg    = $galeriaImgUrl[$i];

        $imageId     = get_image_id($vImg);
        $image_thumb = wp_get_attachment_image_src($imageId, "ijus-home-galeria-thumb");
        $urlThumb    = $image_thumb[0];

        if($qtAtual == 0){
            echo "  <div class='item $cssItem'>";
            echo "    <div class='row no-gutter popup-gallery'>";
        }

        echo "          <div class='col-lg-4 col-sm-6'>
                            <a href='$vImg' class='portfolio-box'>
                                <img src='$urlThumb' class='img-responsive' alt=''>
                                <div class='portfolio-box-caption'>
                                    <div class='portfolio-box-caption-content'>
                                        <div class='project-category text-faded'>
                                            <i class='fa fa-2x fa-search'></i>
                                            <p>$vTitulo</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>";

        $qtAtual++;
        
        if($qtAtual == $qtQuebra){
            echo "    </div>";
            echo "  </div>";

            $qtAtual = 0;
        }

        if($firstLoop){
            $firstLoop = false;
            $cssItem   = "";
        }
    }

    if($qtAtual != 0){
        echo "        </div>";
        echo "      </div>";
    }

    echo "        </div>";

    echo "        <span class='left carousel-control' href='#myCarousel' data-slide='prev'>
                      <!--<span class='glyphicon text-primary glyphicon-chevron-left'></span>-->
                      <span class='fa fa-chevron-left' style='color: #70c416; background-color: white; cursor: pointer; position: relative; top: 50%;'></span>
                      <span class='sr-only'>Previous</span>
                  </span>
                  <span class='right carousel-control' href='#myCarousel' data-slide='next'>
                      <!--<span class='glyphicon text-primary glyphicon-chevron-right'></span>-->
                      <span class='fa fa-chevron-right' style='color: #70c416; background-color: white; cursor: pointer; position: relative; top: 50%;'></span>
                      <span class='sr-only'>Next</span>
                  </span>";

    echo "      </div>";
    echo "    </div>";
    echo "  </div>";
    echo "</section>";
}
?>

<?php
$noticiasQtde = simple_fields_value('home_box_noticias_fields_nr_itens');
$noticiasQtde = ($noticiasQtde == "") ? 8 : $noticiasQtde;

$queryObject = new WP_Query( "post_type=noticias&posts_per_page=$noticiasQtde&orderby=date&post_status=publish" );
if ($queryObject->have_posts()) {
    echo "<section class='bg-white' id='noticias'>";
    echo "  <div class='container text-center news-section'>";
    echo "    <div class='row'>";
    echo "      <div class='col-lg-12'>";
    echo "        <h2 class='section-heading primary'>Notícias</h2>";
    echo "        <hr class='primary'>";
    echo "      </div>";
    echo "    </div>";
    echo "    <div class='row'>";
    echo "      <div class='col-lg-12 text-center'>";
    echo "        <div id='myCarousel-news' class='carousel slide' data-ride='carousel'>";
    echo "          <div class='carousel-inner'>";

    $qtAtual2   = 0;
    $qtQuebra2  = 4;
    $firstLoop2 = true;
    $cssItem2   = " active ";

    while ($queryObject->have_posts()) {
        $queryObject->the_post();

        $vTitle            = get_the_title();
        $vUrlNot           = get_the_permalink();
        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
        $vImgPost          = wp_get_attachment_thumb_url( $post_thumbnail_id );

        $vTexto            = get_the_excerpt();
        $vTexto            = substr($vTexto, 0, 190) . "...";

        if($qtAtual2 == 0){
            echo "  <div class='item $cssItem2'>";
        }

        echo "<div class='col-lg-3 news'>
                <a href='$vUrlNot'>
                  <img src='$vImgPost' width='200' alt=''>
                  <h3 class='text-primary'>$vTitle</h3>
                </a>
                $vTexto
              </div>";

        $qtAtual2++;

        if($qtAtual2 == $qtQuebra2){
            echo "  </div>";

            $qtAtual2 = 0;
        }

        if($firstLoop2){
            $firstLoop2 = false;
            $cssItem2   = "";
        }
    }

    if($qtAtual2 != 0){
        echo "      </div>";
    }

    echo "          </div>";
    echo "          <!-- Left and right controls -->
                    <span class='left carousel-control' href='#myCarousel-news' data-slide='prev-news' style='margin-left: -105px;'>
                        <span class='fa fa-chevron-left' style='color: #70c416; cursor: pointer;'></span>
                        <span class='sr-only'>Previous</span>
                    </span>
                    <span class='right carousel-control' href='#myCarousel-news' data-slide='next-news' style='margin-right: -100px;'>
                        <span class='fa fa-chevron-right' style='color: #70c416; cursor: pointer;'></span>
                        <span class='sr-only'>Next</span>
                    </span>";
    echo "        </div>";
    echo "      </div>";
    echo "    </div>";
    echo "  </div>";
    echo "</section>";
}
?>

<?php
get_footer();