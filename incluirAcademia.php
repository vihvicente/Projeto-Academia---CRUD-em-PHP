<html>
<body>
<?php session_start();
error_reporting (E_ALL &  ~E_WARNING );?>

    <!-- Caixa para a mensagem de erro que pode ser sido armazenada na sessão -->
    <center>
        <b>
            <?php if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                $_SESSION['msg'] = "";
            }?>
        </b>
    </center>

<form action="../controller/controlAcademia.php" method="post">
    <h1>Incluir Academia</h1>
    Dia da Semana: <input type="text" name="dia" size="20" />
    <br /><br />
    Notificação: <input type="text" name="notificacao" size="20" />
    <br /><br />
    <br /><br />
    <input type="hidden" name="acao" value="Incluir">
    <input type="submit" value="Incluir" />
</form>

<form action="../controller/controlAcademia.php" method="post">
    <h1>Alterar dados da Academia</h1>
    <br /><br />
    Dia da Semana: <input type="text" name="dia" size="20" />
    <br /><br />
    Notificação: <input type="text" name="notificacao" size="20" />
    <br /><br />
    <br /><br />
    <input type="hidden" name="acao" value="Alterar">
    <input type="submit" value="Alterar" />
</form>




</body>
</html>



   


