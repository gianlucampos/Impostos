<!--Template e Css-->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="template/inicio.css" />

<form method="GET" action="#" id="formulario">
    <div class="box">
        <h1>Cálculo de Impostos</h1>
        <input type="text" id="meses"name = "meses" onFocus="field_focus(this, 'Meses');" onblur="field_blur(this, 'Meses');"onkeypress="isNumber(event)" value="Meses" />
        <input type="text" id="salario"name = "salario" onFocus="field_focus(this, 'Salário Base (R$)');" onblur="field_blur(this, 'Salário Base (R$)');" onkeypress="isNumber(event)"value="Salário Base (R$)" />
        <input class="btn" type="submit" value="CLT" onclick="executaAcao('clt')" />
        <input class="btn" type="submit" value="SN" onclick="executaAcao('sn')"/>
    </div> 
</form>

<!--Front-End Javascript-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
            function field_focus(field, email) {
                if (field.value === email) {
                    field.value = '';
                }
            }

            function field_blur(field, email) {
                if (field.value === '') {
                    field.value = email;
                }
            }

            $(document).ready(function () {
                $('.box').hide().fadeIn(1000);
            });
            function isNumber(evt) {
                var char = String.fromCharCode(evt.which);
                if (!(/[0-9]/.test(char))) {
                    evt.preventDefault();
                    alert("É necessario preencher os campos com valores numéricos");
                }
            }
            var mes = document.getElementById('meses').value;
            var salario = document.getElementById('salario').value;

            function executaAcao(acao) {
                if (acao === 'clt') {
                    document.getElementById('formulario').action = "clt.php";
                }
                if (acao === 'sn') {
                    document.getElementById('formulario').action = "sn.php";
                }
            }
            function valida() {
                alert(!(mes === "Meses" || salario === "Salário Base (R$)"));
                return !(mes === "Meses" || salario === "Salário Base (R$)");
            }

</script>