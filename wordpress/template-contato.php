<?php
/* Template Name: IJUS - CONTATO */
get_header();
$vMT = 140;
?>

<?php
$vEmailContato = simple_fields_value("contato_box_fields_info_email_contato");

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

        <?php
        // var dos formularios
        $vNotNome = "";
        $vNotTel  = "";
        $vNotMail = "";
        $vNotProf = "";
        $vNotInst = "";

        $vConNome = "";
        $vConMail = "";
        $vConMens = "";
        // ===================

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $assunto     = (isset($_POST["assunto"])) ? $_POST["assunto"]: "";
            $nome        = (isset($_POST["nome"])) ? $_POST["nome"]: "";
            $telefone    = (isset($_POST["telefone"])) ? $_POST["telefone"]: "";
            $email       = (isset($_POST["email"])) ? $_POST["email"]: "";
            $profissao   = (isset($_POST["profissao"])) ? $_POST["profissao"]: "";
            $instituicao = (isset($_POST["instituicao"])) ? $_POST["instituicao"]: "";
            $mensagem    = (isset($_POST["mensagem"])) ? $_POST["mensagem"]: "";
            $recebNotic  = (isset($_POST["receb-noticias"]) && $_POST["receb-noticias"] == "S") ? "Sim": "Não";
            $ehNoticias  = ($assunto == "Quero receber noticias do ijus");

            $erros = "";
            if(strlen($nome) < 3){
                $erros .= "  - Nome <br />";
            }
            
            if($ehNoticias && strlen($telefone) < 8){
                $erros .= "  - Telefone <br />";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erros .= "  - Email <br />";
            }

            if($ehNoticias && strlen($instituicao) < 3){
                $erros .= "  - Institui&ccedil;&atilde;o <br />";
            }

            if(!$ehNoticias && strlen($mensagem) < 5){
                $erros .= "  - Mensagem <br />";
            }

            if($erros != ""){

                if($ehNoticias){
                    $vNotNome = $nome;
                    $vNotTel  = $telefone;
                    $vNotMail = $email;
                    $vNotProf = $profissao;
                    $vNotInst = $instituicao;
                } else {
                    $vConNome = $nome;
                    $vConMail = $email;
                    $vConMens = $mensagem;
                }

                ?>

                <div class="row" style="margin-top: 50px;">
                    <div class="col-lg-6 col-md-offset-3">
                        <div class="alert alert-warning">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            <strong>Alerta!</strong> Antes de registrar, preencha corretamente os seguintes campos:
                            <br />
                            <?php echo $erros; ?>
                        </div>
                    </div>
                </div>

                <?php
            } else {
                $htmlMail = "Nome: $nome<br />";
                $htmlMail .= "Email: $email<br />";

                if($ehNoticias){
                    $htmlMail .= "Telefone: $telefone<br />";
                    $htmlMail .= "Profiss&atilde;o: $profissao<br />";
                    $htmlMail .= "Institui&ccedil;&atilde;o: $instituicao<br />";
                } else {
                    $htmlMail .= "Quero receber notícias: $recebNotic<br />";
                    $htmlMail .= "Mensagem: <i>".nl2br($mensagem)."</i><br />";
                }

                $to      = $vEmailContato;
                $subject = $assunto;
                $body    = $htmlMail;

                $ret = send_email($to, $subject, $body);
                if($ret){
                    $msg = "Contato enviado com sucesso!";
                } else {
                    $msg = "Erro ao enviar Registro. Tente novamente em breve!";
                }
                ?>

                <div class="row" style="margin-top: 50px;">
                    <div class="col-lg-6 col-md-offset-3">
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            <strong>Sucesso!</strong> <?php echo $msg; ?>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>

        <?php
        /*
        <div class="row">
            <div class="col-lg-6">
                <p class="section-sub-heading primary">Quero receber noticias do ijus</p>
                <form method="post" id="newsletter">
                    <input name="assunto" value="Quero receber noticias do ijus" type="hidden">

                    <label for="" class="form-label">Nome: </label>
                    <input name="nome" value="<?php echo $vNotNome; ?>" class="form-control" type="text"><br>

                    <label for="" class="form-label">Telefone: </label>
                    <input name="telefone" value="<?php echo $vNotTel; ?>" class="form-control" type="text"><br>

                    <label for="" class="form-label">E-mail: </label>
                    <input name="email" value="<?php echo $vNotMail; ?>" class="form-control" type="text"><br>

                    <label for="" class="form-label">Profissão: </label>
                    <input name="profissao" value="<?php echo $vNotProf; ?>" class="form-control" type="text"><br>

                    <label for="" class="form-label">Instituição: </label>
                    <input name="instituicao" value="<?php echo $vNotInst; ?>" class="form-control" type="text"><br>
                    <button class="btn btn-success pull-right" type="submit" id="btn-enviar-newsletter" name="button">Enviar</button>
                </form>
            </div>
            <div class="col-lg-4 ">
                <br><br><br>
                <?php
                $vTxtEndereco = simple_fields_value("contato_box_fields_info_txt_endereco");
                echo $vTxtEndereco;
                ?>
            </div>

        </div>
        <br><br><br><br><br>
        */
        ?>
        
        <div class="row">
            <div class="col-lg-6" style="margin-top: -71px;">
                <p class="section-sub-heading primary">Escreva ao IJUS</p>
                <form method="post" id="contato">
                    <input name="assunto" value="Contato ijus" type="hidden">
                    <label for="" class="form-label">Nome: </label>
                    <input name="nome" value="<?php echo $vConNome; ?>" class="form-control" id="txt-nome" type="text">
                    <label for="" class="form-label">Email: </label>
                    <input name="email" value="<?php echo $vConMail; ?>" class="form-control" id="txt-email" type="email">
                    <label for="">Mensagem: </label>
                    <textarea name="mensagem" rows="8" cols="80" class="form-control" id="txt-mensagem"><?php echo $vConMens; ?></textarea>

                    <br />
                    <table border="0">
                        <tr>
                            <td>
                                <label for="" class="form-label">Quero receber notícias do IJUS</label>
                            </td>
                            <td>
                                <input name="receb-noticias" value="S" class="form-control" id="txt-receb-noticias" type="checkbox" style="position: relative;top: -4px;left: 10px;" />
                            </td>
                        </tr>
                    </table>

                    <br>
                    <strong class="message"></strong>
                    <strong class="error text-danger">Preencha todos os campos</strong>
                    <button class="btn btn-success pull-right" type="submit" id="btn-enviar" name="button">Enviar</button>
                </form>
            </div>
            <div class="col-lg-6">
                <?php
                $vEnderecoMapa = simple_fields_value("contato_box_fields_info_endereco_mapa");
                if(trim($vEnderecoMapa) != ""){
                   ?>
                    <iframe style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyConR0L5GP-Jl0m5UJtVCejZVZHpysVFl0
                            &amp;q=<?php echo urlencode($vEnderecoMapa) ?>" allowfullscreen="" width="100%" height="250" frameborder="0">
                    </iframe>
                   <?php
                }
                ?>
                
            </div>
        </div>

        <br>


    </div>
</section>

<?php
get_footer();