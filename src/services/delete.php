<?php

    require_once "../DB/DB.php";

    function dbDelete($id) {
        try {
            $pdo = dbConnection();
            $sql = $pdo->prepare("DELETE FROM usuario WHERE id=$id");
            $sql->execute();
            return "Usuário Removido";
        }
        catch(PDOException $error) {
            return $error->getMessage();
        }
    }


?>
