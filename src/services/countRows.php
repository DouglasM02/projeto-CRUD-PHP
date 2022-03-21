<?php

    require_once "../DB/DB.php";

    function countRows () {
        try {

            $pdo = dbConnection();
            $sql = $pdo->prepare("SELECT COUNT(*) FROM usuario");
            $sql->execute();
            $data = $sql->fetch();
            return $data ?? false;

        }
        catch(PDOException $error) {
            return $error->getMessage();
        }
    }


?>
