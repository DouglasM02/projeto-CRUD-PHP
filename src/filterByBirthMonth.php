<?php

require "./userResponseVerify.php";
require "./dataBaseHandle.php";

date_default_timezone_set('America/Sao_Paulo');
$month = date('m');

print_r($month);

$users = dbFilterByBirthMonth($month);

if($users) {

    foreach( $users as $key => $user) {
            echo "ID: ".$user['id'];
            echo "<br>";
            echo "Nome: ".$user['nome'];
            echo "<br>";
            echo "CPF: ".$user['cpf'];
            echo "<br>";
            echo "Data de Nascimento: ".$user['mes_de_aniversario'];
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
    echo "Não há usuários que fazem aniversário esse mês";
    echo "<br><br>";
    echo "<a href=/projeto/src/>Voltar</a>";
}

?>
