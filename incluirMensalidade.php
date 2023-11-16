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

<form action="../controller/controlMensalidade.php" method="post">
    <h1>Incluir Mensalidade</h1>
    <br /><br />
    CPF: <input type="text" name="CPF" size="20" />
    <br /><br />
    Pagamento: <input type="text" name="pagamento" size="20" />
    <br /><br />
    Plano: <input type="text" name="plano" size="20" />
    <br /><br />
    Preço: <input type="text" name="preco" size="40" />
    <br /><br />
    <br /><br />
    <input type="hidden" name="acao" value="Incluir">
    <input type="submit" value="Incluir" />
</form>

<form action="../controller/controlMensalidade.php" method="post">
    <h1>Alterar dados da Mensalidade</h1>
    <br /><br />
    CPF: <input type="text" name="CPF" size="20" />
    <br /><br />
    Pagamento: <input type="text" name="pagamento" size="20" />
    <br /><br />
    Plano: <input type="text" name="plano" size="20" />
    <br /><br />
    Preço: <input type="text" name="preco" size="40" />
    <br /><br />
    
    <br /><br />
    <input type="hidden" name="acao" value="Alterar">
    <input type="submit" value="Alterar" />
</form>

</body>
</html>