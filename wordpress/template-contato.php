/* Template Name: IJUS - Pág. Contato */

<?php
get_header();
?>

<div class="container-fluid">
    <div class="row">
        <img src="<?php bloginfo('template_url'); ?>/img/banner2.jpg" class="baner-sobre-nos img-responsive" alt="">
    </div>
</div>
<br>
<section class="bg-white" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading primary">Contato</h2>
                <hr class="primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <p class="section-sub-heading primary">Quero receber noticias do ijus</p>
                <form method="post" id="newsletter">
                    <input name="assunto" value="Quero receber noticias do ijus" type="hidden">

                    <label for="" class="form-label">Nome: </label>
                    <input name="nome" value="" class="form-control" type="text"><br>

                    <label for="" class="form-label">Telefone: </label>
                    <input name="telefone" value="" class="form-control" type="text"><br>

                    <label for="" class="form-label">E-mail: </label>
                    <input name="email" value="" class="form-control" type="text"><br>

                    <label for="" class="form-label">Profissão: </label>
                    <input name="profissao" value="" class="form-control" type="text"><br>

                    <label for="" class="form-label">Instituição: </label>
                    <input name="instituicao" value="" class="form-control" type="text"><br>
                    <button class="btn btn-success pull-right" type="submit" id="btn-enviar-newsletter" name="button">Enviar</button>
                </form>

            </div>
            <div class="col-lg-4 ">
                <br><br><br>
                <p class="margin">
                    Avenida Marechal Rondon S/n - Bom pastor<br>
                    Juruti - Pará- Brasil CEP 68170-000<br>
                    e-mail:<br>
                    Instituto_juruti_sustentavel@hotmail.com<br>
                    contato@ijus.org.br<br>

                    Fone +55 93 99190-0791<br><br>

                    Nos siga no Facebook e saiba <br> das últimas novidades&nbsp;&nbsp;
                    <a href="https://www.facebook.com/ijus.org.br/" class="fa fa-facebook-square fa-2x"></a><br><br>
                </p>
            </div>

        </div>
        <br><br><br><br><br>
        <div class="row">
            <div class="col-lg-6" style="margin-top: -71px;">
                <p class="section-sub-heading primary">Escreva ao IJUS</p>
                <form method="post" id="contato">
                    <input name="assunto" value="Contato ijus" type="hidden">
                    <label for="" class="form-label">Nome: </label>
                    <input name="nome" value="" class="form-control" id="txt-nome" type="text">
                    <label for="" class="form-label">Email: </label>
                    <input name="email" value="" class="form-control" id="txt-email" type="email">
                    <label for="">Mensagem: </label>
                    <textarea name="mensagem" rows="8" cols="80" class="form-control" id="txt-mensagem"></textarea>
                    <br>
                    <strong class="message"></strong>
                    <strong class="error text-danger">Preencha todos os campos</strong>
                    <button class="btn btn-success pull-right" type="submit" id="btn-enviar" name="button">Enviar</button>
                </form>
            </div>
            <div class="col-lg-6">
                <iframe style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyConR0L5GP-Jl0m5UJtVCejZVZHpysVFl0
                        &amp;q=Instituto+Juruti+Sustentável+-+IJUS" allowfullscreen="" width="100%" height="250" frameborder="0">
                </iframe>
            </div>
        </div>

        <br>


    </div>
</section>

<?php
get_footer();
?>