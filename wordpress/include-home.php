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
/*
<section class="bg-white"  id="noticias">
    <div class="container text-center news-section">
        <div class="row">
            
                
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-lg-3 news">
                                <a href="views/noticias/05-04/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/05-04/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Alterações</h3></a>
                                O Instituto Juruti Sustentável – IJUS aprovou ontem, 05/04,
                                em Assembleia Extraordinária as alterações estatutárias necessárias para enquadramento do IJUS...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/01-07/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/01-07/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">IJUS lança edital</h3></a>
                                As propostas podem ser submetidas até o dia 7 de agosto e
                                concorrerão a financiamentos que totalizam o valor de R$ 80 mil do fundo do IJUS...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/15-07/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/15-07/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">IJUS apoia produção de DVD</h3></a>
                                As belezas naturais do município de Juruti se agigantam no mês de julho, período em que ocorre anualmente o Festribal...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/01-06/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/01-06/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">IJUS incentiva esportes e cultura</h3></a>
                                Apresentações culturais e demonstrações esportivas marcaram o início do projeto Reviravolta na rotatória da rodovia PA-257, ontem (29), em Juruti...
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-3 news">
                                <a href="views/noticias/26-05/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/26-05/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">IJUS avança no incentivo</h3></a>
                                O Instituto Juruti Sustentável (IJUS) reuniu sexta-feira (26), em Juruti,
                                as dez organizações com projetos financiados este ano pelo fundo do IJUS...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/06-04/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/06-04/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">IJUS entrega cheques para projetos de sustentabilidade</h3></a>
                                Já iniciado os trabalhos e prontas para dar a sua parcela de contribuição ao desenvolvimento sustentável da região de Juruti...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/07-02/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/07-02/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Prefeito Henrique Costa recebe comitiva do IJUS...</h3></a>
                                Uma comitiva da diretoria do Instituto Juruti Sustentável (IJUS) apresentou hoje (07/02) as perspectivas do Instituto...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/01-01/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/01-01/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Você conhece os 13 projetos contemplados</h3></a>
                                Você conhece os 13 projetos contemplados com R$ 250 mil pelo IJUS?
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-3 news">
                                <a href="views/noticias/15-02/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/15-02/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">IJUS prestigiou e fortaleceu parcerias</h3></a>
                                IJUS prestigiou e fortaleceu parcerias na abertura dos trabalhos da Câmara Municipal de vereadores de Juruti.
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/16-02/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/16-02/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Capoeira é cultura brasileira!</h3></a>
                                Criar novas perspectivas à juventude nas comunidades de Terra Santa, desenvolvendo o gosto pela música, atividade corporal, disciplina e senso de coletividade...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/19-05/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/19-05/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">A Associação das Famílias da Casa Familiar Rural </h3></a>
                                A Associação das Famílias da Casa Familiar Rural do Município de Juruti promoveu hoje...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/17-02/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/17-02/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Sabia que a Casa Familiar Rural de Juruti vai receber</h3></a>
                                Os jovens poderão desenvolver habilidades gerenciais, de planejamento e execução...
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-3 news">
                                <a href="views/noticias/12-07/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/12-07/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">IJUS recebe propostas técnicas e comerciais para o serviço</h3></a>
                                Até o dia 12 de julho o Instituto Juruti Sustentável (IJUS) recebe propostas técnicas e comerciais para o serviço...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/01-04/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/01-04/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Com grande expectativa</h3></a>
                                Com grande expectativa, nesta manhã, realizou-se na sede do Instituto Juruti Sustentável...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/01-03/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/01-03/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Grupo Sempre Unidos terá hortas sortidas e fresquinhas em Juruti</h3></a>
                                Vinte novas hortas serão construídas na Comunidade São Francisco Pucú, na região da Ilha de Santa Rita, em Juruti, para dar segurança...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/02-04/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/02-04/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Obrigado Juruti. Você nos inspira a crescer</h3></a>
                                Sua natureza se mostra exuberante. Cidade cheia de cores e sabores...
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-lg-3 news">
                                <a href="views/noticias/01-07-2/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/01-07-2/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">IJUS FAZ PARCERIA E ILUMINA ÁREA PÚBLICA</h3></a>
                                A rotatória da rodovia PA-257 está iluminada numa grande demonstração de que a união...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/01-05/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/01-05/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">A imprensa regional e estadual divulga projetos financiados pelo IJUS</h3></a>
                                Confira as matérias
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/02-03/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/02-03/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Jovens agricultores "guerreiros" de Santa-Ana</h3></a>
                                Vinte e cinco jovens da região do Pompom, área rural de Juruti, agora contam com o apoio...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/01-02/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/01-02/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Juruti Velho vai ficar mais musical</h3></a>
                                A Banda Marcial da Vila Muirapinima, em Juruti Velho, ganha o reforço do...
                            </div>
                        </div>


                        <div class="item">
                            <div class="col-lg-3 news">
                                <a href="views/noticias/08-03/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/08-03/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Sozinhos</h3></a>
                                “Sozinhos, pouco podemos fazer; juntos, podemos fazer muito.” Escolhemos esta frase de Helen Keller...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/02-05/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/02-05/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Pescador: Criando bons hábitos, beneficiando a todos</h3></a>
                                Acredito as pessoas que estão aqui, tem um papel muito importante...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/17-07/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/17-07/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Já enviou seu projeto de biodiversidade ao IJUS?</h3></a>
                                O Instituto Juruti Sustentável (IJUS) recebe propostas de projetos de conservação e uso sustentável...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/02-02/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/02-02/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">O projeto da Associação Beneficente de Juruti</h3></a>
                                Provisão ganhou o IJUS como novo aliado na causa pela correta...
                            </div>
                        </div>


                        <div class="item">
                            <div class="col-lg-3 news">
                                <a href="views/noticias/02-06/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/02-06/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Quadrilha junina de Terra Santa promete!</h3></a>
                                A promessa é de tirar o fôlego com apresentações, coreografias, figurinos e adornos belíssimos na próxima quadrilha junina...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/03-03/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/03-03/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Roça coletiva na Ilha de Santa Rita</h3></a>
                                A Comunidade Barra, na região da Ilha de Santa Rita, em Juruti, vai fortalecer...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/03-02/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/03-02/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Valorizando a cultura da Terra!</h3></a>
                                O grupo Ciranda do Amor traz alegria por meio de apresentações folclóricas em Terra Santa...
                            </div>
                            <div class="col-lg-3 news">
                                <a href="views/noticias/23-08/noticia.php"><img src="<?php bloginfo('template_url'); ?>/img/noticias/23-08/thumbnail/1.jpg" width="200" alt="">
                                    <h3 class="text-primary">Juruti se prepara para implantar o RedeSimples</h3></a>
                                O Serviço Brasileiro de Apoio às Micro e Pequenas Empresas (Sebrae) apresentou os programas “RedeSimples”...
                            </div>


                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <span class="left carousel-control" href="#myCarousel-news" data-slide="prev-news" style="margin-left: -105px;">
                        <span class="fa fa-chevron-left" style="color: #70c416; cursor: pointer;"></span>
                        <span class="sr-only">Previous</span>
                    </span>
                    <span class="right carousel-control" href="#myCarousel-news" data-slide="next-news" style="margin-right: -100px;">
                        <span class="fa fa-chevron-right" style="color: #70c416; cursor: pointer;"></span>
                        <span class="sr-only">Next</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
*/
?>

<?php
get_footer();
?>