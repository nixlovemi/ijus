<?php
/* Template Name: IJUS - Portal Transparência */
get_header();
$vMT = 140;

$htmlTitPost = "";
$htmlPost    = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vAction = $_POST["acao"];

    if ($vAction == "post-mov-mensal") {
        $vMovMensalMes    = simple_fields_values("portal_box_fields_mov_mensal_mes");
        $vMovMensalAno    = simple_fields_values("portal_box_fields_mov_mensal_ano");
        $vMovMensalTitulo = simple_fields_values("portal_box_fields_mov_mensal_titulo");
        $vMovMensalUrlArq = simple_fields_values("portal_box_fields_mov_mensal_url_arquivo");

        $arrMovimentacoes = [];
        for ($i = 0; $i < count($vMovMensalMes); $i++) {
            $vMes   = $vMovMensalMes[$i];
            $vAno   = $vMovMensalAno[$i];
            $Titulo = $vMovMensalTitulo[$i];
            $UrlArq = $vMovMensalUrlArq[$i];

            // $vStrMes = mesToStr($vMes);

            $idxMesAno = "$vAno-$vMes";
            if (!array_key_exists($idxMesAno, $arrMovimentacoes)) {
                $arrMovimentacoes[$idxMesAno] = [];
            }

            $arrMovimentacoes[$idxMesAno][] = array(
                "titulo" => $Titulo,
                "url" => $UrlArq,
            );
        }

        $arrMovFilter = [];
        $vAno         = $_POST["mov-mensal-ano"];
        $vMes         = $_POST["mov-mensal-mes"];

        $vStrMes     = mesToStr($vMes);
        $htmlTitPost = "Movimentações de $vStrMes/$vAno";

        if ($vMes != "" && $vAno != "") {
            $idxMesAno = "$vAno-$vMes";
            $arrLoop   = isset($arrMovimentacoes[$idxMesAno]) ? $arrMovimentacoes[$idxMesAno]
                    : array();

            if (count($arrLoop) <= 0) {
                $htmlPost .= "<center><p>Nenhum resultado para essa pesquisa.</p></center>";
            } else {
                foreach ($arrLoop as $movMesAno) {
                    $vTitulo = strtoupper($movMesAno["titulo"]);
                    $vUrlArq = $movMesAno["url"];

                    $htmlPost .= "<div class='row' style='margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ccc;'>
                                        <div class='col-lg-1'>
                                                <i class='fa fa-check-circle text-primary'></i>
                                        </div>
                                        <div class='col-lg-10'>
                                                <p>$vTitulo</p>
                                                <div class='row'>
                                                        <div class='col-lg-12'>
                                                                <a href='$vUrlArq' target='_blank'>Arquivo Download</a>
                                                                <br />
                                                        </div>
                                                </div>
                                        </div>
                                  </div>";
                }
            }
        }
    } else if ($vAction == "post-eve-tecnico") {
        $vEveTecnicoTitulo = simple_fields_values("portal_box_fields_eve_tecnico_titulo");
        $vEveTecnicoTexto  = simple_fields_values("portal_box_fields_eve_tecnico_texto");
        $htmlTitPost       = "Eventos Técnicos";

        if (count($vEveTecnicoTitulo) <= 0) {
            $htmlPost .= "<center><p>Nenhum evento técnico encontrado.</p></center>";
        } else {
            for ($i = 0; $i < count($vEveTecnicoTitulo); $i++) {
                $vTitulo = $vEveTecnicoTitulo[$i];
                $vTexto  = nl2br($vEveTecnicoTexto[$i]);

                $htmlPost .= "<div class='row' style='margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ccc;'>
                                    <div class='col-lg-1'>
                                            <i class='fa fa-check-circle text-primary'></i>
                                    </div>
                                    <div class='col-lg-10'>
                                            <p><b>$vTitulo</b></p>
                                            <div class='row'>
                                                    <div class='col-lg-12'>
                                                            $vTexto
                                                    </div>
                                            </div>
                                    </div>
                              </div>";
            }
        }
    } else if ($vAction == "post-vis-campo") {
        // mudou nome pra relatorio anual
        $vVisCampoAno    = simple_fields_values("portal_box_fields_vis_campo_ano");
        $vVisCampoTitulo = simple_fields_values("portal_box_fields_vis_campo_titulo");
        $vVisCampoUrlPdf = simple_fields_values("portal_box_fields_vis_campo_url_pdf");
        $htmlTitPost     = "Relatório Anual";

        if (count($vVisCampoTitulo) <= 0) {
            $htmlPost .= "<center><p>Nenhuma visita em campo encontrada.</p></center>";
        } else {
            $arrVisCampo = [];

            for ($i = 0; $i < count($vVisCampoTitulo); $i++) {
                $vAno    = $vVisCampoAno[$i];
                $vTitulo = $vVisCampoTitulo[$i];
                $vUrlPdf = $vVisCampoUrlPdf[$i];

                if(!array_key_exists($vAno, $arrVisCampo)){
                    $arrVisCampo[$vAno] = [];
                }
                
                $arrVisCampo[$vAno][] = array(
                    "titulo" => $vTitulo,
                    "urlPdf" => $vUrlPdf,
                );
            }
            
            foreach($arrVisCampo as $vAno => $vConteudo){
                $htmlPost .= "<div class='row' style='margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ccc;'>";
                $htmlPost .= "  <div class='col-lg-1'>";
                $htmlPost .= "    <i class='fa fa-check-circle text-primary'></i>";
                $htmlPost .= "  </div>";
                $htmlPost .= "  <div class='col-lg-10'>";
                $htmlPost .= "    <p><b><a href='javascript:;' onclick=\" $('#arquivos-$vAno').toggle(500) \">$vAno</a></b></p>";
                $htmlPost .= "    <div class='row'>";
                $htmlPost .= "      <div class='col-lg-12' style='display:none;' id='arquivos-$vAno'>";
                
                foreach($vConteudo as $info){
                    $vUrl    = $info["urlPdf"];
                    $vTitulo = $info["titulo"];
                    
                    $htmlPost .= "    <a href='$vUrl' target='_blank'>$vTitulo</a><br />";
                }
                
                $htmlPost .= "      </div>";
                $htmlPost .= "    </div>";
                $htmlPost .= "  </div>";
                $htmlPost .= "</div>";
            }
        }
    }
}
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
            <h2 class="section-heading primary">Portal da Transparência</h2>
            <hr class="primary">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <p>O Instituto Juruti Sustentável torna público e transparente suas ações, considerando-as de interesse público.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-lg-offset-3 col-border-right text-center">
            <p class="text-primary">Movimentação mensal</p>
            <a href="#" class="link" data-file="views/transparencia/investimento-mensal.html"></a>
            <br />

            <form action="./" id="frm-mov-mensal" method="post">
                <input type="hidden" name="acao" value="post-mov-mensal" />
                <select class="select select-ano" name="mov-mensal-ano" id="mov-mensal-ano" onChange="loadMovMensal()">
                    <option value="">Ano</option>
                    <?php
                    for ($i = 2015; $i <= date("Y"); $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <br />
                <select class="select select-ano" name="mov-mensal-mes" id="mov-mensal-mes" onChange="loadMovMensal()">
                    <option value="">Mês</option>
                    <option value="01">Janeiro</option>
                    <option value="02">Fevereiro</option>
                    <option value="03">Março</option>
                    <option value="04">Abril</option>
                    <option value="05">Maio</option>
                    <option value="06">Junho</option>
                    <option value="07">Julho</option>
                    <option value="08">Agosto</option>
                    <option value="09">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                </select>
            </form>
        </div>
        <div class="col-lg-3 col-md-offset-1 text-center">
            <p class="text-primary">Prestação de contas Social </p><br>
            <div style="height: 60px;">
                <form action="./" id="frm-eve-tecnico" method="post">
                    <input type="hidden" name="acao" value="post-eve-tecnico" />
                    <a href="javascript:;" onClick="loadEveTecnico()" class="btn-green btn-eventos" style="margin-bottom: 30px;">Resultados de Projetos</a>
                </form>
            </div>
            <div style="height: 60px;">
                <form action="./" id="frm-vis-campo" method="post">
                    <input type="hidden" name="acao" value="post-vis-campo" />
                    <a href="javascript:;" onClick="loadVisCampo()" class="btn-green">Relatórios Anuais</a>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-lg-offset-2 col-offset-custom" style="margin-top: 30px;">
            <?php
            // se tiver algum post, aparece aqui...
            if ($htmlPost != "") {
                ?>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading primary"><?php echo $htmlTitPost; ?></h2>
                        <hr class="primary">
                    </div>
                </div>
                <div class="row body-html-post-portal">
                    <div class="col-lg-12">
                <?php echo $htmlPost; ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
get_footer();
