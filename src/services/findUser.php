<?php

    require_once "../DB/DB.php";

    function dbFindOne($id) {
        try {
            $pdo = dbConnection();
            $sql = $pdo->prepare("SELECT * FROM usuario WHERE id=$id");
            $sql->execute();
            $data = $sql->fetch();
            return $data ?? false;
        }
        catch(PDOException $error) {
            die( $error->getMessage());
        }
    }


?>
