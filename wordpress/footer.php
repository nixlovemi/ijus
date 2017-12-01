    <aside class="bg-primary-dark footer">
            <div class="container text-justify text-white">
                <div class="row">
                    <div class="col-lg-3 col-lg-offset-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="<?php bloginfo('template_url'); ?>/img/logotipo.png" alt="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-10">
                                <p style="font-size: 12px;">Acompanhe e participe<br> das ações do IJUS em Juruti. </p>
                                <p style="font-size: 12px;line-height: .5;margin-bottom:10px;">Acesse nosso Facebook</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="https://www.facebook.com/ijus.org.br/" class="text-primary white-hover fa fa-2x fa-facebook-square"></a>&nbsp;

                                <a href="tel:55 +93 99190-0791" class="text-primary white-hover"><i class="fa fa-2x fa-whatsapp"></i>&nbsp;+55 93 99190-0791</a>&nbsp;

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                Contato: contato@ijus.org.br
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-offset-1 col-lg-2 border-col">
                        <br><br>
                        <a href="sobre-nos.php" class="text-white">Quem Somos?</a> <br>
                        <a href="<?php bloginfo('url'); ?>/#noticias" class="text-white">Notícias</a> <br>
                        <a href="<?php bloginfo('url'); ?>/downloads" class="text-white">Editais & TDRs</a> <br>
                        <a href="transparencia.php" class="text-white">Portal da Transparência</a> <br>
                        <a href="<?php bloginfo('url'); ?>/sala-da-imprensa" class="text-white">Sala da imprensa</a> <br>
                        <a href="<?php bloginfo('url'); ?>/boletim-informativo/" class="text-white">Boletim Informativo</a> <br>
                        <a href="<?php bloginfo('url'); ?>/agenda/" class="text-white">Agenda</a> <br>
                        <a href="<?php bloginfo('url'); ?>/contato/" class="text-white">Contato</a> <br>
                        <a href="<?php bloginfo('url'); ?>/investidores/" class="text-white">Seja um investidor</a> <br>
                    </div>

                    <div class="col-lg-4">
                        <br><br>
                        <div class="text-primary-dark">
                            NOTICIAS
                        </div>

                        <?php
                        $queryObject = new WP_Query( "post_type=noticias&posts_per_page=4&orderby=date&post_status=publish" );
                        if ($queryObject->have_posts()) {
                            echo "<ul>";
                            while ($queryObject->have_posts()) {
                                $queryObject->the_post();

                                $vTitle  = get_the_title();
                                $vUrlNot = get_the_permalink();
                                
                                echo "<li><a href='$vUrlNot' class='text-white font-footer'>$vTitle</a></li>";
                            }
                            echo "</ul>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <style media="screen">
        .font-footer{
            font-size: 15px;
        }
    </style>

    <!-- jQuery -->
    <script src="<?php bloginfo('template_url'); ?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php bloginfo('template_url'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php bloginfo('template_url'); ?>/js/creative.js"></script>
    <script type="text/javascript">
        $('[data-slide="prev-news"]').click(function () {
            $('#myCarousel-news').carousel('prev');
            $('#myCarousel-news').carousel('pause');
        });
        $('[data-slide="next-news"]').click(function () {
            $('#myCarousel-news').carousel('next');
            $('#myCarousel-news').carousel('pause');
        });
    </script>

    <?php wp_footer(); ?>
</body>

</html>