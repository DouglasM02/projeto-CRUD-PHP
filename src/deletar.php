<?php

require "./userResponseVerify.php";
require "./dataBaseHandle.php";

$id = $_GET['deletar'];

if(userParamVerify($id)) {
    $message = dbDelete($id);
    echo $message;
    echo "<br><br>";
    echo "<a href=/projeto/src/listAll.php>Voltar</a>";
}
else {
    echo "Usuário não encontrado";
    echo "<br><br>";
    echo "<a href=/projeto/src/listAll.php>Voltar</a>";
}




?>
