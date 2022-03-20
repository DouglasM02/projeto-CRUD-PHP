<?php

require "./userResponseVerify.php";
require "./dataBaseHandle.php";

$cpf = $_POST['cpf'];

if(cpfValidation($cpf)) {
    $user = dbFilterByCpf($cpf);
    if($user) {

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
        echo "<a href=/projeto/src/>Voltar</a>";
        echo "<br><br>";
    }
    else {
        echo "Usuário não encontrado";
        echo "<br><br>";
        echo "<a href=/projeto/src/>Voltar</a>";
    }
}
else {
    echo "Preencha o CPF com apenas números e coloque 11 digitos";
    echo "<br><br>";
    echo "<a href=/projeto/src/>Voltar</a>";
}



?>
