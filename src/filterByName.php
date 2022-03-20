<?php

require "./userResponseVerify.php";
require "./dataBaseHandle.php";

$nome = $_POST['nome'];

$users = dbFilterByName($nome);

if($users) {

    foreach( $users as $key => $user) {
        echo "ID: ".$user['id'];
        echo "<br>";
        echo "Nome: ".$user['nome'];
        echo "<br>";
        echo "CPF: ".$user['cpf'];
        echo "<br>";
        echo "Data de Nascimento: ".$user['data_de_nascimento'];
        echo "<br>";
        echo "<a href=alterar.php?alterar=".$user['id'].">Alterar</a>";
        echo "<br>";
        echo "<a href=deletar.php?deletar=".$user['id'].">Deletar</a>";
        echo "<br><br>";
    }
    echo "<br><br>";
    echo "<a href=/projeto/src/>Voltar</a>";
}
else {
    echo "não foram encontrados usuários com esse nome";
    echo "<br><br>";
    echo "<a href=/projeto/src/>Voltar</a>";
}





?>