<?php
/* Template Name: IJUS - Investidor */
get_header();
$vMT = 140;
?>

<?php
$vEmailContato = simple_fields_value("investidores_box_fields_info_email_contato");

if (has_post_thumbnail()) {
    $vMT = 20;
    ?>

    <div class="container-fluid">
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

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <?php
                $vTexto = simple_fields_value("investidores_box_fields_info_texto");
                echo $vTexto;
                ?>
            </div>
        </div>
        <br><br>

        <?php
        // var dos formularios
        $vInvestNome  = "";
        $vInvestEmail = "";
        $vInvestTel   = "";
        // ===================

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $assunto  = (isset($_POST["assunto"])) ? $_POST["assunto"]: "";
            $nome     = (isset($_POST["nome"])) ? $_POST["nome"]: "";
            $email    = (isset($_POST["email"])) ? $_POST["email"]: "";
            $telefone = (isset($_POST["telefone"])) ? $_POST["telefone"]: "";

            $erros = "";
            if(strlen($nome) < 3){
                $erros .= "  - Nome <br />";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erros .= "  - Email <br />";
            }

            if(strlen($telefone) < 8){
                $erros .= "  - Nome <br />";
            }

            if($erros != ""){

                $vInvestNome  = $nome;
                $vInvestEmail = $email;
                $vInvestTel   = $telefone;
                ?>

                <div class="row" style="margin-top: 50px;">
                    <div class="col-lg-6 col-md-offset-3">
                        <div class="alert alert-warning">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            <strong>Alerta!</strong> Antes de enviar o contato, preencha corretamente os seguintes campos:
                            <br />
                            <?php echo $erros; ?>
                        </div>
                    </div>
                </div>

                <?php
            } else {
                $htmlMail  = "Nome: $nome<br />";
                $htmlMail .= "Email: $email<br />";
                $htmlMail .= "Telefone: $telefone<br />";

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

        <div class="row">
            <div class="col-md-6 col-lg-offset-3">
                <form method="post" id="seja-investidor">
                    <input name="assunto" value="Contato ijus" type="hidden">
                    <label for="" class="form-label">Nome: </label>
                    <input name="nome" value="<?php echo $vInvestNome; ?>" class="form-control" id="txt-nome" type="text">
                    <label for="" class="form-label">Email: </label>
                    <input name="email" value="<?php echo $vInvestEmail; ?>" class="form-control" id="txt-email" type="email">
                    <label for="" class="form-label">Telefone: </label>
                    <input name="telefone" value="<?php echo $vInvestTel; ?>" class="form-control" id="txt-tel" type="text">
                    <br>
                    <strong class="message"></strong>
                    <strong class="error text-danger">Preencha todos os campos</strong>
                    <button class="btn btn-success pull-right" type="submit" id="btn-enviar-seja-investidor" name="button">Enviar</button>
                </form>

            </div>
        </div>
        <br>


    </div>
</section>

<?php
get_footer();
