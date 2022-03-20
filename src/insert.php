<?php

require "./userResponseVerify.php";
require "./dataBaseHandle.php";

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['dataDeNascimento'];

if(userResponseVerify($nome, $cpf, $data)) {
    if(cpfValidation($cpf)) {
        $cpfToVerify = dbFilterByCpf($cpf);
        if($cpfToVerify) {
            echo "Usuário já existe";
            echo "<br><br>";
            echo "<a href=/projeto/src/>Voltar</a>";
        }
        else {

            $insert = dbInsert($nome, $cpf, $data);
            echo $insert;
            echo "<br><br>";
            echo "<a href=/projeto/src/>Voltar</a>";
        }
    }
    else {
        echo "Preencha o CPF com apenas números e coloque 11 digitos";
        echo "<br><br>";
        echo "<a href=/projeto/src/>Voltar</a>";
    }
}
else {
    echo "Preencha todos os campos";
    echo "<br><br>";
    echo "<a href=/projeto/src/>Voltar</a>";
}


?>
