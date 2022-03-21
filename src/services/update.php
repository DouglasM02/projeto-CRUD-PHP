<?php

require_once "../DB/DB.php";

function dbUpdate($id, $campo,$valor) {
    try {
        $pdo = dbConnection();
        $sql = $pdo->prepare("UPDATE usuario SET  $campo='$valor' WHERE id=$id");
        $sql->execute();
        return "$campo alterado com sucesso";
    }
    catch(PDOException $error) {
        die($error->getMessage());
    }
}





?>
