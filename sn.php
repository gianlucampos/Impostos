<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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

    </head>

    <body>
        <div>
            <?php
            $fgts = "";
            $d13salario = "";
            $fgts_sem_d13 = "";
            $ferias1_12 = "";
            $ferias1_3 = "";
            $fgts_sem_ferias1_12 = "";
            $fgts_sem_ferias1_3 = "";
            $avisoPrevio1_12 = "";
            $multaFgts = "";
            $custoMensal = "";
            $custoMensalSalario = "";
            $custoHora = "";

            $Anos = isset($_GET['Anos']) ? $_GET['Anos'] : "";
            if (!empty($Anos)) {
                
            }
            $salario = isset($_GET['salario']) ? $_GET['salario'] : "";
            if (!empty($salario)) {

                $fgts = (0.08 * $salario);
                $d13salario = ($salario / 12);
                $ferias1_12 = ($d13salario);
                $ferias1_3 = ($ferias1_12 / 3);
                $fgts_sem_d13 = (0.08 * $d13salario);
                $fgts_sem_ferias1_12 = (0.08 * $ferias1_12);
                $fgts_sem_ferias1_3 = (0.08 * $ferias1_3);
                $avisoPrevio1_12 = (0.0833 * $salario);
                $multaFgts = ($fgts + $fgts_sem_d13 + $fgts_sem_ferias1_12 + $fgts_sem_ferias1_3) / 2;
                $custoMensal = $fgts +
                        $d13salario +
                        $fgts_sem_d13 +
                        $ferias1_12 +
                        $ferias1_3 +
                        $fgts_sem_ferias1_12 +
                        $fgts_sem_ferias1_3 +
                        $avisoPrevio1_12 +
                        $multaFgts;
                $custoMensalSalario = $custoMensal + $salario;
                $custoHora = $custoMensal / 220;
                $custoAnual = ($custoMensalSalario - $multaFgts - $avisoPrevio1_12) * 12 * $Anos;
            }
            ?>

        </div>
        <div>
            <table id="tabelaImpostos">
                <title></title>
                <tr>
                    <th>Salário Bruto</th> 
                    <th>R$ <?php echo $salario; ?> </th>
                </tr>
                <tr>
                    <td>FGTS:</td>
                    <td><?php echo $fgts; ?></td>
                </tr>
                <tr>
                    <td>1/12 13º salário</td>
                    <td><?php echo $d13salario; ?></td>
                </tr>

                <tr>
                    <td>FGTS sem 13º salário</td>
                    <td><?php echo $fgts_sem_d13; ?></td>
                </tr>
                <tr>
                    <td>1/12 Férias</td>
                    <td><?php echo $ferias1_12; ?></td>                
                </tr>
                <tr>
                    <td>1/3 Férias</td>
                    <td><?php echo $ferias1_3; ?></td>                
                </tr>

                <tr>
                    <td>FGTS sem Férias</td>
                    <td><?php echo $fgts_sem_ferias1_12; ?></td>                
                </tr>
                <tr>
                    <td>FGTS sem 1/3 Férias</td>
                    <td><?php echo $fgts_sem_ferias1_3; ?></td>                
                </tr>
                <tr>
                    <td>1/12 Aviso prévio</td>
                    <td><?php echo $avisoPrevio1_12; ?></td>                
                </tr>
                <tr>
                    <td>50% multa FGTS</td>
                    <td><?php echo $multaFgts; ?></td>                
                </tr>
                <tr>
                    <td>Total custo mensal</td>
                    <td><?php echo $custoMensalSalario; ?></td>                
                </tr>
                <tr>
                    <td>Total custo Anual</td>
                    <td class="output">R$ <?php echo $custoAnual; ?></td>                
                </tr>
            </table>
        </div>
    </body>
</html>
