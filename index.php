<!--Template e Css-->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="template/inicio.css" />

<form method="GET">
    <div class="box">
        <h1>Cálculo de Impostos</h1>
        <input type="text" name = "meses" onFocus="field_focus(this, 'Meses');" onblur="field_blur(this, 'Meses');" />
        <input type="text" name = "salario" onFocus="field_focus(this, 'Salário Base');" onblur="field_blur(this, 'Salário Base');" />
        <input class="btn" type="submit" value="CLT" formaction="clt.php" />
        <input class="btn" type="submit" value="SN" formaction="sn.php"/>
    </div> 
</form>

<!--Detalhes Javascript-->
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
</script>