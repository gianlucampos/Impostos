<html>  
    <style>
        #tabelaImpostos {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .output{
            color: green;
        }
    </style>
    <body>  
        <div>
            <?php

            function arredonda($input) {
                return round($input * 100) / 100;
            }

            function calculaAliquota($input) {
                $input = $input <= 1693.72 ? 0.08 : $input; //  aliquota 8%
                $input = $input >= 1693.73 && $input <= 2822.90 ? 0.09 : $input; // aliquota 9%
                $input = $input >= 2822.91 && $input <= 5645.80 ? 0.11 : $input; // aliquota 11%
                return $input;
            }

            $inss = "";
            $fgts = "";
            $d13salario = "";
            $inss_sem_d13 = "";
            $fgts_sem_d13 = "";
            $ferias1_12 = "";
            $ferias1_3 = "";
            $inss_sem_ferias1_12 = "";
            $inss_sem_ferias1_3 = "";
            $fgts_sem_ferias1_12 = "";
            $fgts_sem_ferias1_3 = "";
            $avisoPrevio1_12 = "";
            $multaFgts = "";
            $custoMensal = "";
            $custoMensalSalario = "";
            $custoHora = "";

            $Anos = isset($_GET['Anos']) ? $_GET['Anos'] : "";
            if (!empty($Anos)) {
                ?>
                <h2 style="margin-left: 100px" > Consolidação das Leis do Trabalho</h2>
                <h2 style="margin-left: 900px;">Custo em  <?php echo $Anos ?> Ano(s): </h2>
                <?php
            }
            $salario = isset($_GET['salario']) ? $_GET['salario'] : "";
            if (!empty($salario)) {
                $aliquota = calculaAliquota($salario);
                //Inss
                $inss = arredonda($aliquota * $salario);
                //Fgts
                $fgts = arredonda(0.08 * $salario);
                //13º salário
                $d13salario = arredonda($salario / 12);
                //Férias
                $ferias1_12 = arredonda($d13salario);
                $ferias1_3 = arredonda($ferias1_12 / 3);
                //Aviso prévio
                $avisoPrevio1_12 = arredonda((1 / 12) * $salario * 0.0833);
                //Sem 13º salário
                $inss_sem_d13 = arredonda($aliquota * $d13salario);
                $fgts_sem_d13 = arredonda(0.08 * $d13salario);
                //Sem Férias
                $inss_sem_ferias1_12 = arredonda($aliquota * $ferias1_12);
                $inss_sem_ferias1_3 = arredonda($aliquota * $inss_sem_ferias1_12);
                $fgts_sem_ferias1_12 = arredonda(0.08 * $ferias1_12);
                $fgts_sem_ferias1_3 = arredonda(0.08 * $ferias1_3);
                //Multa 50% FGTS 
                $multaFgts = ($fgts + $fgts_sem_d13 + $fgts_sem_ferias1_12 + $fgts_sem_ferias1_3) / 2;
                //Custos
                $custoMensal = $inss + $fgts + $d13salario + $avisoPrevio1_12 + $multaFgts + $ferias1_12 + $ferias1_3 +
                        $inss_sem_d13 + $fgts_sem_d13 +
                        $inss_sem_ferias1_12 + $fgts_sem_ferias1_12 +
                        $inss_sem_ferias1_3 + $fgts_sem_ferias1_3;

                $custoMensalSalario = arredonda($custoMensal + $salario);
                $custoAnual = $custoMensalSalario * 12 * $Anos;
                $custoHora = arredonda($custoMensal / 220);
            }
            ?>

        </div>
        <div>
            <table id="tabelaImpostos">
                <title></title>
                <tr>
                    <th><h2>Salário Bruto</h2></th> 
                    <th><h2>R$ <?php echo $salario; ?> </h2></th>
                </tr>
                <tr>
                    <td>INSS:<?php
                        echo "  Alíquota de ";
                        echo $aliquota * 100;
                        echo "%"
                        ?></td>
                    <td class="output">R$ <?php echo $inss; ?></td>
                </tr>
                <tr>
                    <td>FGTS:</td>
                    <td class="output">R$ <?php echo $fgts; ?></td>
                </tr>
                <tr>
                    <td>1/12 13º salário</td>
                    <td class="output">R$ <?php echo $d13salario; ?></td>
                </tr>
                <tr>
                    <td>INSS sem 13º salário</td>
                    <td class="output">R$ <?php echo $inss_sem_d13; ?></td>
                </tr>
                <tr>
                    <td>FGTS sem 13º salário</td>
                    <td class="output">R$ <?php echo $fgts_sem_d13; ?></td>
                </tr>
                <tr>
                    <td>1/12 Férias</td>
                    <td class="output">R$ <?php echo $ferias1_12; ?></td>                
                </tr>
                <tr>
                    <td>1/3 Férias</td> 
                    <td class="output">R$ <?php echo $ferias1_3; ?></td>                
                </tr>
                <tr>
                    <td>INSS sem 1/12 Férias </td>
                    <td class="output">R$ <?php echo $inss_sem_ferias1_12; ?></td>                
                </tr>
                <tr>
                    <td>INSS sem 1/3 Férias</td>
                    <td class="output">R$ <?php echo $inss_sem_ferias1_3; ?></td>                
                </tr>
                <tr>
                    <td>FGTS sem Férias</td>
                    <td class="output">R$ <?php echo $fgts_sem_ferias1_12; ?></td>                
                </tr>
                <tr>
                    <td>FGTS sem 1/3 Férias</td>
                    <td class="output">R$ <?php echo $fgts_sem_ferias1_3; ?></td>                
                </tr>
                <tr>
                    <td>1/12 Aviso prévio</td>
                    <td class="output">R$ <?php echo $avisoPrevio1_12; ?></td>                
                </tr>
                <tr>
                    <td>50% multa FGTS</td>
                    <td class="output">R$ <?php echo $multaFgts; ?></td>                
                </tr>
                <tr>
                    <td>Total custo Anual</td>
                    <td class="output">R$ <?php echo $custoAnual; ?></td>                
                </tr>
                <tr>
                    <td>Total custo mensal</td>
                    <td class="output">R$ <?php echo $custoMensalSalario; ?></td>                
                </tr>
                <tr>
                    <td>Total custo mensal (sem salário)</td>
                    <td class="output">R$ <?php echo $custoMensal; ?></td>                
                </tr>
                <tr>
                    <td>Total custo hora</td>
                    <td class="output">R$ <?php echo $custoHora; ?></td>                
                </tr>
            </table>
        </div>
        <a href="index.php">Voltar</a>
    </body>
</html>