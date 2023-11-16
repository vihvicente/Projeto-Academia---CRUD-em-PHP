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

<form action="../controller/controlEquipamento.php" method="post">
    <h1>Incluir Equipamento</h1>
    <br /><br />
    Nome do Equipamento: <input type="text" name="nome" size="20" />
    <br /><br />
    Video: <input type="text" name="video" size="20" />
    <br /><br />
    Marca do Equipamento: <input type="text" name="marca" size="40" />
    <br /><br />
    <br /><br />
    <input type="hidden" name="acao" value="Incluir">
    <input type="submit" value="Incluir" />
</form>

<form action="../controller/controlEquipamento.php" method="post">
    <h1>Alterar dados do Equipamento</h1>
    Nome do Equipamento: <input type="text" name="nome" size="20" />
    <br /><br />
    Video: <input type="text" name="video" size="20" />
    <br /><br />
    Marca do Equipamento: <input type="text" name="marca" size="40" />
    <br /><br />
    <br /><br />
    <input type="hidden" name="acao" value="Alterar">
    <input type="submit" value="Alterar" />
</form>

</body>
</html>