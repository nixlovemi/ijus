<?php
/* Template Name: IJUS - Agenda */
get_header();
$vMT = 140;
?>

<?php
if ( has_post_thumbnail() ) {
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
            <div class="col-md-12">
                <?php
                $agendaData      = simple_fields_values("agenda_box_fields_atividades_data");
                $agendaAtividade = simple_fields_values("agenda_box_fields_atividades_atividade");
                $agendaLocal     = simple_fields_values("agenda_box_fields_atividades_local");
                $agendaPublico   = simple_fields_values("agenda_box_fields_atividades_publico");

                $arrAtividades   = array();
                $arrPassadas     = array();
                for($i=0; $i < count($agendaData); $i++){
                    $vArrData   = $agendaData[$i];
                    $vDataISO   = $vArrData["ISO_8601"];
                    $vData      = date("d/m/Y H:i", strtotime($vDataISO));
                    $vAtividade = $agendaAtividade[$i];
                    $vLocal     = $agendaLocal[$i];
                    $vPublico   = $agendaPublico[$i];

                    $arrLinha = array(
                        "data"      => $vData,
                        "dataISO"   => $vData,
                        "atividade" => $vAtividade,
                        "local"     => $vLocal,
                        "publico"   => $vPublico,
                    );

                    if($vArrData["ISO_8601"] > date("Y-m-d H:i")){
                        $arrAtividades[] = $arrLinha;
                    } else {
                        $arrPassadas[] = $arrLinha;
                    }
                }

                if( count($arrAtividades) > 0 ){
                    echo "<table width='100%' class='agenda-table'>";
                    echo "  <thead>";
                    echo "    <tr>";
                    echo "      <td align='center'>Dia</td>";
                    echo "      <td align='center'>Atividade</td>";
                    echo "      <td align='center'>Local</td>";
                    echo "      <td align='center'>Público</td>";
                    echo "    </tr>";
                    echo "  </thead>";
                    echo "  <tbody class='agenda-body'>";

                    foreach($arrAtividades as $atividade){
                        $vData      = $atividade["data"];
                        $vAtividade = $atividade["atividade"];
                        $vLocal     = $atividade["local"];
                        $vPublico   = $atividade["publico"];

                        echo "<tr>
                                <td>$vData</td>
                                <td>$vAtividade</td>
                                <td>$vLocal</td>
                                <td>$vPublico</td>
                              </tr>";
                    }
                    
                    echo "  </tbody>";
                    echo "</table>";
                }

                if( count($arrPassadas) > 0 ){
                    usort($arrPassadas, function($a, $b) {
                        return $a['dataISO'] < $b['dataISO'];
                    });

                    echo "<div style='margin: 40px 0;' class='col-lg-12 text-center'>
                            <h2 class='section-heading primary'>Passadas</h2>
                            <hr class='primary'>
                          </div>";

                    echo "<table width='100%' class='agenda-table'>";
                    echo "  <thead>";
                    echo "    <tr>";
                    echo "      <td align='center'>Dia</td>";
                    echo "      <td align='center'>Atividade</td>";
                    echo "      <td align='center'>Local</td>";
                    echo "      <td align='center'>Público</td>";
                    echo "    </tr>";
                    echo "  </thead>";
                    echo "  <tbody class='agenda-body'>";

                    foreach($arrPassadas as $passadas){
                        $vData      = $passadas["data"];
                        $vAtividade = $passadas["atividade"];
                        $vLocal     = $passadas["local"];
                        $vPublico   = $passadas["publico"];

                        echo "<tr>
                                <td>$vData</td>
                                <td>$vAtividade</td>
                                <td>$vLocal</td>
                                <td>$vPublico</td>
                              </tr>";
                    }

                    echo "  </tbody>";
                    echo "</table>";
                }
                ?>

                <?php
                /*
                <table class="agenda-table">
                    <thead>
                        <tr>
                            <td>Atividade</td>
                            <td>Local</td>
                            <td>Público</td>
                        </tr></thead>
                    <tbody class="agenda-body">
                        <tr>
                            <td>08/08</td>
                            <td>15h - Apresentação Site do IJUS</td>
                            <td>Sede IJUS</td>
                            <td>Diretoria e Integrante Funjus</td>
                        </tr>
                        <tr>
                            <td>09/08</td>
                            <td>14h30 - Oficina sobre Abordagem de Gênero</td>
                            <td>Sede IJUS</td>
                            <td>Funjus e SECEX</td>
                        </tr>
                        <tr>
                            <td>10/08</td>
                            <td>7h30 - Reunião de Trabalho GT Escola de Sustentabilidade</td>
                            <td>Sede IJUS</td>
                            <td>GT Escola de Sustentabilidade</td>
                        </tr>
                        <tr>
                            <td>10/08</td>
                            <td>15h - Indicadores/Planejamento Juruti 2030/Resultados SECEX</td>
                            <td>Sede IJUS</td>
                            <td>Associados, conselheiros,<br> diretores e integrantes dos comitês de Ética e Fiscal</td>
                        </tr>
                    </tbody>
                </table>
                */
                ?>
            </div>
        </div>
        <br>
    </div>
</section>

<?php
get_footer();