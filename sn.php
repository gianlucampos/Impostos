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
            ?>

            <form method="post" action="">  
                <h2>Impostos Via Simples Nacional</h2>
                Meses: <input type="text" name="meses" value="">
                <br><br>
                Salario: <input type="text" name="salario" value="">
                <br><br>
                <input type="submit" name="submit" value="Calcular">  
            </form>


            <?php
            $meses = isset($_POST['meses']) ? $_POST['meses'] : "";
            if (!empty($meses)) {
                ?>
                <h2> <?php echo $meses ?> O empregado vai custar: </h2>
                <?php
            }
            $salario = isset($_POST['salario']) ? $_POST['salario'] : "";
            if (!empty($salario)) {
               
                $fgts = (0.08 * $salario); 
                $d13salario = ($salario/12);
                $ferias1_12 = ($d13salario); 
                $ferias1_3 = ($ferias1_12/3); 
                $fgts_sem_d13 = (0.08 * $d13salario);
                $fgts_sem_ferias1_12 = (0.08 * $ferias1_12); 
                $fgts_sem_ferias1_3 = (0.278 * $ferias1_3); 
                $avisoPrevio1_12 = (0.0833 * $salario);
                $multaFgts = ($fgts + $fgts_sem_d13 + $fgts_sem_ferias1_12 + $fgts_sem_ferias1_3) / 2; //18
                $custoMensal = 
                
                        
                        $fgts +
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
