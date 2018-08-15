<!DOCTYPE HTML>  
<html>
    <head>
    </head>
    <style>
        #tabelaImpostos {
            font-family: arial, sans-serif;
            border-collapse: collapse;
/*            width: 100%;*/
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
/*            padding: 8px;*/
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <body>  
        <div>
            <?php
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
            ?>

            <form method="post" action="">  
                <h2>Impostos Via CLT</h2>
                Nome: <input type="text" name="nome" value="">
                <br><br>
                Salario: <input type="text" name="salario" value="">
                <br><br>
                <input type="submit" name="submit" value="Calcular">  
            </form>


            <?php
            $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
            if (!empty($nome)) {
                ?>
                <h2> <?php echo $nome ?> vai gastar/custar: </h2>
                <?php
            }
            $salario = isset($_POST['salario']) ? $_POST['salario'] : "";
            if (!empty($salario)) {
                $inss = 0.278 * $salario; //6
                $fgts = 0.08 * $salario; //7
                $d13salario = $salario/12; //8
                $inss_sem_d13 = 0.278 * $d13salario; //9
                $fgts_sem_d13 = 0.08 * $d13salario; //10
                $ferias1_12 = $d13salario; //11
                $ferias1_3 = $ferias1_12/3; //12
                $inss_sem_ferias1_12 = 0.278 * $ferias1_12; //13
                $inss_sem_ferias1_3 = 0.278 * $inss_sem_ferias1_12; //14
                $fgts_sem_ferias1_12 = 0.08 * $ferias1_12; //15
                $fgts_sem_ferias1_3 = 0.278 * $ferias1_3; //16
                $avisoPrevio1_12 = (1 / 12) * $salario; //17
                $multaFgts = ($fgts_sem_d13 + $fgts_sem_d13 + $fgts_sem_ferias1_12 + $fgts_sem_ferias1_3) / 2; //18
                $custoMensal = 
                        $inss +
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
                    <th>Salário Bruto</th> 
                    <th>R$ <?php echo $salario; ?> </th>
                </tr>
                <tr>
                    <td>INSS:</td>
                    <td><?php echo $inss; ?></td>
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
                    <td>INSS sem 13º salário</td>
                    <td><?php echo $inss_sem_d13; ?></td>
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
                    <td>INSS sem 1/12 Férias </td>
                    <td><?php echo $inss_sem_ferias1_12; ?></td>                
                </tr>
                <tr>
                    <td>INSS sem 1/3 Férias</td>
                    <td><?php echo $inss_sem_ferias1_3; ?></td>                
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
            </table>
        </div>
    </body>
</html>