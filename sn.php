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
            width: 50%;
            text-align: center;
            margin: auto;
   
 
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
       
            padding: .7em;
            margin: 5;
            
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
           function arredonda($input) {
                return round($input * 100) / 100;
            }
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
              ?>
              <h2 style="margin-left: 321px" > Simples Nacional</h2>
                <h2 style="margin-left: 710px;">Custo em  <?php echo $Anos ?> Ano(s): </h2>
                <?php
            }
            $salario = isset($_GET['salario']) ? $_GET['salario'] : "";
            if (!empty($salario)) {
               
                $fgts = arredonda(0.08 * $salario); 
                $d13salario = arredonda($salario/12);
                $ferias1_12 = arredonda($d13salario); 
                $ferias1_3 = arredonda($ferias1_12/3); 
                $fgts_sem_d13 = arredonda(0.08 * $d13salario);
                $fgts_sem_ferias1_12 = arredonda(0.08 * $ferias1_12); 
                $fgts_sem_ferias1_3 = arredonda(0.278 * $ferias1_3); 
                $avisoPrevio1_12 = arredonda(0.0833 * $salario);
                $multaFgts = arredonda($fgts + $fgts_sem_d13 + $fgts_sem_ferias1_12 + $fgts_sem_ferias1_3) / 2; //18
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
                $custoAnual = $custoMensalSalario * 12 * $Anos;
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
                    <td>R$ <?php echo $fgts; ?> </td>
                </tr>
                <tr>
                    <td>1/12 13º salário</td>
                    <td>R$ <?php echo $d13salario; ?> </td>
                </tr>
              
                <tr>
                    <td>FGTS sem 13º salário</td>
                    <td>R$ <?php echo $fgts_sem_d13; ?> </td>
                </tr>
                <tr>
                    <td>1/12 Férias</td>
                    <td>R$ <?php echo $ferias1_12; ?> </td>                
                </tr>
                <tr>
                    <td>1/3 Férias</td>
                    <td>R$ <?php echo $ferias1_3; ?> </td>                
                </tr>
                <tr>            
                </tr>
               
                              
               
                <tr>
                    <td>FGTS sem Férias</td>
                    <td>R$ <?php echo $fgts_sem_ferias1_12; ?> </td>                
                </tr>
                <tr>
                    <td>FGTS sem 1/3 Férias</td>
                    <td>R$ <?php echo $fgts_sem_ferias1_3; ?> </td>                
                </tr>
                <tr>
                    <td>1/12 Aviso prévio</td>
                    <td>R$ <?php echo $avisoPrevio1_12; ?> </td>                
                </tr>
                <tr>
                    <td>50% multa FGTS</td>
                    <td>R$ <?php echo $multaFgts; ?> </td>                
                </tr>
                <tr>
                    <td>Total custo mensal</td>
                    <td>R$ <?php echo $custoMensalSalario; ?></td>                
                </tr>
                    <td>Total custo Anual</td>
                    <td class="output">R$ <?php echo $custoAnual; ?></td>  
            </table>
            
        </div>
        <a style=" margin-left: 321px;"href="index.php">Voltar</a>
    </body>
</html>
