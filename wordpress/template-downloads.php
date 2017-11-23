<?php
/* Template Name: IJUS - Downloads */
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

<div class="container" style="margin-top: <?php echo $vMT; ?>px">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading primary">Downloads</h2>
            <hr class="primary">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <p>Faça Download dos Editais e TDRs – Termo de Referência abertos no momento: </p>
        </div>
    </div>

    <div class="row" style="text-align: center;">
        <div class="col-md-8 col-lg-offset-2 col-offset-custom">
            <?php
            $vDownloadsGrupo   = simple_fields_values("downloads_box_fields_grupo");
            $vDownloadsTitulo  = simple_fields_values("downloads_box_fields_titulo");
            $vDownloadsNomeArq = simple_fields_values("downloads_box_fields_nome_arq");
            $vDownloadsNomeLnk = simple_fields_values("downloads_box_fields_link_arq");

            $arrArquivos = array();
            for($i=0; $i<count($vDownloadsGrupo); $i++){
                $vGrupo   = $vDownloadsGrupo[$i];
                $vTitulo  = $vDownloadsTitulo[$i];
                $vNomeArq = $vDownloadsNomeArq[$i];
                $vNomeLnk = $vDownloadsNomeLnk[$i];

                if(!array_key_exists($vGrupo, $arrArquivos)){
                    $arrArquivos[$vGrupo] = array();
                }

                if(!array_key_exists($vTitulo, $arrArquivos[$vGrupo])){
                    $arrArquivos[$vGrupo][$vTitulo] = array();
                }

                $arrArquivos[$vGrupo][$vTitulo][] = array(
                    "nomeArquivo" => $vNomeArq,
                    "linkArquivo" => $vNomeLnk,
                );
            }

            foreach($arrArquivos as $grupo => $arrTitulos){
                echo "<h3 style='margin-bottom: 20px;'>$grupo</h3>";

                foreach($arrTitulos as $titulo => $arrInfo){
                    echo "<div class='row' style='text-align: left;'>";
                    echo "  <div class='row' style='margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #ccc;'>";
                    echo "    <div class='col-lg-1'>";
                    echo "      <i class='fa fa-check-circle text-primary'></i>";
                    echo "    </div>";
                    echo "    <div class='col-lg-10'>";
                    echo "      <p>$titulo</p>";
                    echo "      <div class='row'>";
                    echo "        <div class='col-lg-12'>";

                    foreach($arrInfo as $itemDwld){
                        $vArquivo = $itemDwld["nomeArquivo"];
                        $vLink    = $itemDwld["linkArquivo"];

                        echo "      <a href='$vLink' target='_blank'>$vArquivo</a>";
                        echo "      <br />";
                    }

                    echo "        </div>";
                    echo "      </div>";
                    echo "    </div>";
                    echo "  </div>";
                    echo "</div>";
                    
                    
                    ?>

                    <?php
                }
            }

            /*foreach($arrArquivos as $grupo => $arrTitulos){
                echo "<h3>$grupo</h3>";

                foreach($arrTitulos as $titulo => $arrInfo){
                    echo "<div class='row'>";
                    echo "  <div class='row marign-bordered'>";
                    echo "    <div class='col-lg-1'>";
                    echo "      <i class='fa fa-check-circle text-primary' />";
                    echo "    </div>";
                    echo "    <div class='col-lg-10'>";
                    echo "      <p>$titulo</p>";
                    echo "      <div class='row'>";
                    echo "        <div class='col-lg-12'>";

                    foreach($arrInfo as $itemDwld){
                        $vArquivo = $itemDwld["nomeArquivo"];
                        $vLink    = $itemDwld["linkArquivo"];

                        echo "      <a href='$vLink' target='_blank'>$vArquivo</a>";
                        echo "      <br />";
                    }

                    echo "        </div>";
                    echo "      </div>";
                    echo "    </div>";
                    echo "  </div>";
                    echo "</div>";
                }

                echo "<br /><br /><br />";
            }*/
            ?>
        </div>
    </div>
    
    <!--
    <br>
    <div class="row">
        <div class="col-lg-5 col-md-offset-1 text-center">
            <a href="#" class="btn-green" id="editais">Editais</a>
        </div>
        <div class="col-lg-5 text-center">
            <a href="#" class="btn-green" id="btn-ja-apoiados">Projetos</a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-5 col-md-offset-1 text-center">
            <a href="#" class="btn-green" id="btn-tdrs">TDRs</a>
        </div>
        <div class="col-lg-5 text-center">
            <a href="#" class="btn-green">Serviços</a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-8 col-lg-offset-2 col-offset-custom">
            <div style="display:none;" class="content" id="editais-content">
                <div class="row">
                            <div class="row marign-bordered">
                                <div class="col-lg-1">
                                    <i class="fa fa-check-circle text-primary"></i>
                                </div>
                                <div class="col-lg-10">
                                    <p>CONSERVAÇÃO E USO SUSTENTÁVEL DA BIODIVERSIDADE</p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="downloads/edital.pdf">Edital</a><br>
                                            <a href="downloads/folder.pdf">Folder</a><br>
                                            <a href="downloads/formulario-inscricao.pdf">Formulário de Inscrição</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div class="row">
                            <div class="row marign-bordered">
                                <div class="col-lg-1">
                                    <i class="fa fa-check-circle text-primary"></i>
                                </div>
                                <div class="col-lg-10">
                                    <p>Chamada de projetos para projetos para o desenvolvimento de Juruti e entorno</p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="downloads/EDITAL 001.2017 (FINAL).pdf">EDITAL 001.2017 (FINAL)</a><br>
                                            <a href="downloads/EDITAL 001.2016 Rev Final.pdf">EDITAL 001.2016 Rev Final</a><br>
                                            <a href="downloads/Resultado FINAL Chamada de Projetos para o Desenvolvimento Sustentável de Juruti em Entorno 04.01.2016.pdf">Resultado FINAL Chamada de Projetos para o Desenvolvimento Sustentável de Juruti em Entorno</a><br>
                                            <a href="downloads/Resultados da Chamada de Projetos para o Desenvolvimento Sustentável de Juruti em Entorno Classificados.pdf">Resultados da Chamada de Projetos para o Desenvolvimento Sustentável de Juruti em Entorno Classificados</a><br>
                                            <a href="downloads/PRORROGAÇÃO DO PRAZO DE ENVIO edital 01.2017.pdf">Prorrogação do prazo de envio edital 01.2017</a><br>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><table>
                    <thead>
                        <tr class="head">
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
            <div style="display:none" class="content" id="ja-apoiados">
                <table>
                    <thead>
                        <tr class="head">
                            <th></th>
                            <th></th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="fa fa-check-circle text-primary"></i></td>
                            <td class="title">SERVIÇOS CONTÁBEIS IJUS</td>
                            <td><a href="downloads/TDR-03.2017-SERVICOS-CONTABEIS-IJUS.pdf"><i class="fa fa-circle-o text-primary"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="display:none" class="content" id="tdrs-content">
                <div class="row">
                    <div class="row marign-bordered">
                        <div class="col-lg-1">
                            <i class="fa fa-check text-primary"></i>
                        </div>
                        <div class="col-lg-4">
                            <p>03/2017</p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <li><a href="downloads/TDR 03.2017 - SERVIÇOS CONTÁBEIS IJUS.pdf">Serviços Contábeis</a></li>
                                    <li><a href="downloads/TDR 03.2017 Resultado Contabilidade.pdf">Resultado</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row marign-bordered">
                        <div class="col-lg-1">
                            <i class="fa fa-check text-primary"></i>
                        </div>
                        <div class="col-lg-4">
                            <p>02/2017</p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <li><a href="downloads/TDR 02.2017 - Escola de Sustentabilidade.pdf">Escola de Sustentabilidade</a></li>
                                    <li><a href="downloads/CANCELAMENTO TDR 02 2017.pdf">Cancelamento</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row marign-bordered">
                        <div class="col-lg-1">
                            <i class="fa fa-check text-primary"></i>
                        </div>
                        <div class="col-lg-4">
                            <p>01/2017</p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <li><a href="downloads/TDR 01.2017 SERVIÇOS JURÍDICOS.pdf">Serviços Jurídicos</a></li>
                                    <li><a href="downloads/TDR 01.2017 Resultado.pdf">Resultado</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row marign-bordered">
                        <div class="col-lg-1">
                            <i class="fa fa-check text-primary"></i>
                        </div>
                        <div class="col-lg-4">
                            <p>03/2016</p>
                                <div class="col-lg-12">
                                    <div class="row">
                                    <li><a href="downloads/TDR 03.2016 - Serviços Gráficos.pdf">Serviços Gráficos</a></li>
                                    <li><a href="downloads/TDR 03.2016 Resultado.pdf">Resultado</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row marign-bordered">
                        <div class="col-lg-1">
                            <i class="fa fa-check text-primary"></i>
                        </div>
                        <div class="col-lg-4">
                            <p>02/2016</p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <li><a href="downloads/TDR 02.2016 - Contabilidade.pdf">Contabilidade</a></li>
                                    <li><a href="downloads/TDR 02.2016 Resultado.pdf">Resultado</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row marign-bordered">
                        <div class="col-lg-1">
                            <i class="fa fa-check text-primary"></i>
                        </div>
                        <div class="col-lg-4">
                            <p>01/2016</p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <li><a href="downloads/TDR 01.2016 - Comunicação.pdf">Comunicação</a></li>
                                    <li><a href="downloads/TDR 01.2016 Resultado.pdf">Resultado</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
</div>

<?php
get_footer();