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

<form action="../controller/controlSecretaria.php" method="post">
    <h1>Incluir Secretaria</h1>
    Nome: <input type="text" name="nome" size="20" />
    <br /><br />
    Endereço: <input type="text" name="endereco" size="20" />
    <br /><br />
    Telefone: <input type="text" name="telefone" size="20" />
    <br /><br />
    CPF: <input type="text" name="CPF" size="20" />
    <br /><br />
    Email: <input type="text" name="email" size="40" />
    <br /><br />
    Turno: <input type="text" name="turno" size="20" />
    <br /><br />
    <br /><br />
    <input type="hidden" name="acao" value="Incluir">
    <input type="submit" value="Incluir" />
</form>

<form action="../controller/controlSecretaria.php" method="post">
    <h1>Alterar dados da Secretaria</h1>
    CPF para referênciar: <input type="text" name="CPF" size="20" />
    <br /><br />
    Nome: <input type="text" name="nome" size="20" />
    <br /><br />
    Endereço: <input type="text" name="endereco" size="20" />
    <br /><br />
    Telefone: <input type="text" name="telefone" size="20" />
    <br /><br />
    Email: <input type="text" name="email" size="40" />
    <br /><br />
    Turno: <input type="text" name="turno" size="20" />
    <br /><br />
    <br /><br />
    <input type="hidden" name="acao" value="Alterar">
    <input type="submit" value="Alterar" />
</form>

<form action="../controller/controlSecretaria.php" method="post">
    <h1> Consultar dados da Secretaria</h1>
    Digite o CPF: <input type="text" name="CPF" size="20">
    <input type="hidden" name="acao" value="Consultar">
    <input type="submit" value="Consultar" >
<table border="1">
    <tr>
        <td><b>Nome</b></td>
        <td><b>Endereço</b></td>
        <td><b>Telefone</b></td>
        <td><b>CPF</b></td>
        <td><b>Email</b></td>
        <td><b>Turno</b></td>
    </tr>
    <?php
    if (isset($_SESSION)){
        foreach ($_SESSION as $linha => $value){
            echo '<tr>';
            foreach ($_SESSION[$linha] as $campo){
                echo '<td>' . $campo . '</td>';
            }
            echo '</tr>';
        }
    }

    ?>
</table>

</form>

<form action="../controller/controlSecretaria.php" method="post">
    <h1> Consultar Lista dados da Secretaria</h1>
    <input type="hidden" name="acao" value="consultarFull">
	<input type="submit" value="consultarFull">

</form>

<table border="1">
    <tr>
        <td><b>Nome</b></td>
        <td><b>Endereço</b></td>
        <td><b>Telefone</b></td>
        <td><b>CPF</b></td>
        <td><b>Email</b></td>
        <td><b>Turno</b></td>
    </tr>
    <?php
    include_once ('../model/classes/Secretaria.php');
    include_once ('../model/classes/Pessoa.php');

    if (!empty($_SESSION['lista'])){
    
        $listaArray = $_SESSION['lista'];
        $qtdLinhas = count($listaArray);

        for ($i=0; $i < $qtdLinhas; $i++) { 
            $lista[$i] = new Secretaria(
                $listaArray[$i]['nome'],
                $listaArray[$i]['endereco'],
                $listaArray[$i]['telefone'],
                $listaArray[$i]['CPF'],
                $listaArray[$i]['email'],
                $listaArray[$i]['turno']
            );
        }

        for ($i=0; $i < $qtdLinhas; $i++) { 
            echo '<tr>';
            echo '<td>' . $lista[$i]->getNome().'</td>';
            echo '<td>' . $lista[$i]->getEndereco().'</td>';
            echo '<td>' . $lista[$i]->getTelefone().'</td>';
            echo '<td>' . $lista[$i]->getCPF().'</td>';
            echo '<td>' . $lista[$i]->getEmail().'</td>';
            echo '<td>' . $lista[$i]->getTurno().'</td>';
            echo '</tr>';
        }
    }





?>
</table>


</body>
</html>

