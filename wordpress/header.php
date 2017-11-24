<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php bloginfo('blogname'); ?><?php wp_title(' | '); ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php bloginfo('template_url'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- ROBOTO -->
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Roboto:300,300i,400,500,700" rel="stylesheet">

        <!-- Plugin CSS -->
        <link href="<?php bloginfo('template_url'); ?>/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="<?php bloginfo('template_url'); ?>/css/creative.css" rel="stylesheet">

        <?php if (is_singular()): ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php endif; ?>

        <?php wp_head(); ?>
    </head>
    <body id="page-top">

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid nav-container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                    </button>

                    <a href="<?php bloginfo('url'); ?>" class="page-scroll">
                        <img src="<?php bloginfo('template_url'); ?>/img/logotipo.png" id="logo" class="logo-img navbar-brand page-scroll"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="javascript:;">Quem Somos?</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php bloginfo('url'); ?>/#noticias">Notícias</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php bloginfo('url'); ?>/downloads">Editais & TDRs</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="transparencia.php">Portal da Transparência</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php bloginfo('url'); ?>/sala-da-imprensa">Sala da imprensa</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="javascript:;">Boletim Informativo</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="javascript:;">Agenda</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="javascript:;">Contato</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="javascript:;">Seja um investidor</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>