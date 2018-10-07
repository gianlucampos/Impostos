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

            $salario = isset($_GET['meses']) ? $_GET['meses'] : "";
            if (!empty($nome)) {
                ?>
                <h2> <?php echo $nome ?> vai gastar/custar: </h2>
                <?php
            }
            $salario = isset($_GET['salario']) ? $_GET['salario'] : "";
            if (!empty($salario)) {
                $inss = arredonda(0.278 * $salario); //6
                $fgts = arredonda(0.08 * $salario); //7
                $d13salario = arredonda($salario / 12); //8
                $inss_sem_d13 = arredonda(0.278 * $d13salario); //9
                $fgts_sem_d13 = arredonda(0.08 * $d13salario); //10
                $ferias1_12 = arredonda($d13salario); //11
                $ferias1_3 = arredonda($ferias1_12 / 3); //12
                $inss_sem_ferias1_12 = arredonda(0.278 * $ferias1_12); //13
                $inss_sem_ferias1_3 = arredonda(0.278 * $inss_sem_ferias1_12); //14
                $fgts_sem_ferias1_12 = arredonda(0.08 * $ferias1_12); //15
                $fgts_sem_ferias1_3 = arredonda(0.278 * $ferias1_3); //16
                $avisoPrevio1_12 = arredonda((1 / 12) * $salario); //17
                $multaFgts = ($fgts + $fgts_sem_d13 + $fgts_sem_ferias1_12 + $fgts_sem_ferias1_3) / 2; //18
                $custoMensal = $inss +
                        $fgts +
                        $d13salario +
                        $inss_sem_d13 +
                        $fgts_sem_d13 +
                        $ferias1_12 +
                        $ferias1_3 +
                        $inss_sem_ferias1_12 +
                        $inss_sem_ferias1_3 +
                        $fgts_sem_ferias1_12 +
                        $fgts_sem_ferias1_3 +
                        $avisoPrevio1_12 +
                        $multaFgts;
                $custoMensalSalario = $custoMensal + $salario;
                $custoHora = $custoMensal / 220;
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
                    <td>INSS:</td>
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
                    <td>Total custo mensal</td>
                    <td class="output">R$ <?php echo $custoMensalSalario; ?></td>                
                </tr>
            </table>
        </div>
        <a href="index.php">Voltar</a>
    </body>
</html>