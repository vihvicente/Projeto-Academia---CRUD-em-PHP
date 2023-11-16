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

<form action="../controller/controPessoa.php" method="post">
    <h1>Incluir Pessoa</h1>
    Nome: <input type="text" name="nome" size="20" />
    <br /><br />
    Celular: <input type="text" name="celular" size="20" />
    <br /><br />
    CPF: <input type="text" name="cpf" size="20" />
    <br /><br />
    Endereço: <input type="text" name="endereco" size="20" />
    <br /><br />
    Email: <input type="text" name="email" size="40" />
    <br /><br />
    <input type="hidden" name="acao" value="Incluir">
    <input type="submit" value="Incluir" />
</form>