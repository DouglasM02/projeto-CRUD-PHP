<?php

    require_once "../DB/DB.php";

    function dbListAll() {
        try {
            $pdo = dbConnection();
            $sql = $pdo->prepare("SELECT * FROM usuario");
            $sql->execute();
            $data = $sql->fetchAll();
            return $data;
        }
        catch(PDOException $error) {
            die($error->getMessage());
        }
    }





?>
