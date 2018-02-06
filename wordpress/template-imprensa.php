<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Template Name: IJUS - Imprensa */
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
            <h2 class="section-heading primary"><?php the_title(); ?></h2>
            <hr class="primary">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-md-offset-2">
            <?php
            $imprensaTexto = simple_fields_value("imprensa_box_fields_texto");
            echo $imprensaTexto;
            ?>
        </div>
    </div>

    <div class="row" style="margin:10px 0 22px 0;">
        <div class="col-lg-8 col-md-offset-2 text-center">
            <img src="<?php bloginfo('template_url'); ?>/img/paper.png" class="icon-paper" alt="">
        </div>
    </div>

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-8 col-md-offset-2 p-menor">
            <?php
            $imprensaContato = simple_fields_value("imprensa_box_fields_contato");
            echo $imprensaContato;
            ?>
        </div>
    </div>

    <div class="row" style="padding: 30px 0;">
        <div class="col-lg-12 text-center">
            <!--<a href="views/imprensa/cadastro.php" class="btn-green">Cadastre-se</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
            <a href="<?php bloginfo('url'); ?>/#portfolio" class="btn-green">Fotografia</a><br>
        </div>
    </div>
</div>

<?php
$vAssunto   = (isset($_POST["assunto"])) ? $_POST["assunto"]: "";
$vNome      = (isset($_POST["nome"])) ? trim($_POST["nome"]): "";
$vSexo      = (isset($_POST["sexo"])) ? $_POST["sexo"]: "";
$vEmail     = (isset($_POST["email"])) ? $_POST["email"]: "";
$vSobrenome = (isset($_POST["sobrenome"])) ? $_POST["sobrenome"]: "";
$vEditora   = (isset($_POST["editora"])) ? $_POST["editora"]: "";
$vVeiculo   = (isset($_POST["veiculo"])) ? $_POST["veiculo"]: "";
$vCargo     = (isset($_POST["cargo"])) ? $_POST["cargo"]: "";
$vTelefone1 = (isset($_POST["telefone1"])) ? $_POST["telefone1"]: "";
$vTelefone2 = (isset($_POST["telefone2"])) ? $_POST["telefone2"]: "";
$vEmpresa   = (isset($_POST["empresa"])) ? $_POST["empresa"]: "";
$vEstado    = (isset($_POST["estado"])) ? $_POST["estado"]: "";
$vSite      = (isset($_POST["site"])) ? $_POST["site"]: "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $vEmailCadastro = (isset($_POST["email_cadastro"])) ? $_POST["email_cadastro"]: "";

    $erros = "";
    if(strlen($vNome) < 3){
        $erros .= "  - Nome <br />";
    }
    
    if(strlen($vEmpresa) < 3){
        $erros .= "  - Empresa <br />";
    }

    if (!filter_var($vEmail, FILTER_VALIDATE_EMAIL)) {
        $erros .= "  - Email <br />";
    }

    if(strlen($vTelefone1) < 8){
        $erros .= "  - Telefone 1 <br />";
    }

    if($erros != ""){
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
        $htmlMail  = "<strong>Cadastro de Imprensa - Dados</strong><br />";
        $htmlMail .= "Nome: $vNome<br />";
        $htmlMail .= "Sobrenome: $vSobrenome<br />";
        $htmlMail .= "Sexo: $vSexo<br />";
        $htmlMail .= "Email: $vEmail<br />";
        $htmlMail .= "Editora: $vEditora<br />";
        $htmlMail .= "Ve&iacute;culo: $vVeiculo<br />";
        $htmlMail .= "Cargo: $vCargo<br />";
        $htmlMail .= "Telefone 1: $vTelefone1<br />";
        $htmlMail .= "Telefone 2: $vTelefone2<br />";
        $htmlMail .= "Empresa: $vEmpresa<br />";
        $htmlMail .= "Estado: $vEstado<br />";
        $htmlMail .= "Site: $vSite<br />";

        $to      = $vEmailCadastro;
        $subject = $vAssunto;
        $body    = $htmlMail;
        
        $ret = send_email($to, $subject, $body);
        if($ret){
            $msg = "Registro enviado com sucesso!";

            $vNome      = "";
            $vSexo      = "";
            $vEmail     = "";
            $vSobrenome = "";
            $vEditora   = "";
            $vVeiculo   = "";
            $vCargo     = "";
            $vTelefone1 = "";
            $vTelefone2 = "";
            $vEmpresa   = "";
            $vEstado    = "";
            $vSite      = "";
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

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading primary">Cadastro de imprensa</h2>
            <hr class="primary">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h4>
                Cadastre-se e passe a receber notícias sobre o Instituto Juruti Sustentável - IJUS.<br>
            </h4>
            <p class="text-muted">(Este é um cadastro específico para profissionais de imprensa)</p>
        </div>
    </div>
    <form method="post" id="form-cadastro" action="">
        <input name="assunto" value="Cadastro sala de imprensa ijus" type="hidden" />
        <input name="mensagem" value="" id="mensagem" type="hidden" />

        <?php
        $vEmailCadastro = simple_fields_value("imprensa_box_fields_email_cadastro");
        ?>
        <input name="email_cadastro" value="<?php echo $vEmailCadastro; ?>" id="email_cadastro" type="hidden" />

        <div class="row">
            <div class="col-lg-4">
                <label for="" class="form-label">Nome: </label>
                <input name="nome" value="<?php echo $vNome; ?>" class="form-control" id="txt-nome" type="text">

                <label for="" class="form-label">Sexo: </label><br>
                <input name="sexo" value="Masculino" id="txt-sexo" type="radio"> Masculino
                <input name="sexo" value="Feminino" id="txt-sexo" type="radio"> Feminino<br>

                <label for="" class="form-label">Email: </label>
                <input name="email" value="<?php echo $vEmail; ?>" class="form-control" id="txt-email" type="email">
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Sobrenome: </label>
                <input name="sobrenome" value="<?php echo $vSobrenome; ?>" class="form-control" id="txt-sobrenome" type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <label for="">Editoria: </label>
                <input class="form-control" name="editora" type="text" value="<?php echo $vEditora; ?>">
            </div>
            <div class="col-md-2">
                <label for="">Veiculo: </label>
                <input class="form-control" name="veiculo" type="text" value="<?php echo $vVeiculo; ?>">

            </div>
            <div class="col-md-4">
                <label for="">Cargo: </label>
                <input class="form-control" name="cargo" type="text" value="<?php echo $vCargo;?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="" class="form-label">Telefone 1: </label>
                <input name="telefone1" value="<?php echo $vTelefone1; ?>" class="form-control" type="text">
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Telefone 2: </label>
                <input name="telefone2" value="<?php echo $vTelefone2; ?>" class="form-control" type="text">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="" class="form-label">Instituição na qual trabalho:* </label>
                <input name="empresa" value="" class="form-control" type="text" value="<?php echo $vEmpresa; ?>">
            </div>
            <div class="col-md-2">
                <label for="" class="form-label">Estado: </label>
                <input name="estado" value="" class="form-control" type="text" value="<?php echo $vEstado; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="" class="form-label">Site: </label>
                <input name="site" value="" class="form-control" type="text" value="<?php echo $vSite; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <br>

                <button class="btn btn-success pull-left" type="submit" id="btn-cadastrar" name="button">Cadastrar</button>
            </div>
        </div>
        <strong class="success text-success">Mensagem enviada com sucesso</strong>
        <strong class="error text-danger">Preencha todos os campos</strong>
    </form>
</div>

<?php
get_footer();