<?php

    require_once "../DB/DB.php";
    function filterByCpf($cpf) {
            try {
                $pdo = dbConnection();
                $sql = $pdo->prepare("SELECT * FROM usuario WHERE cpf='$cpf'");
                $sql->execute();
                $data = $sql->fetch();
                return $data ?? false;
            }
            catch(PDOException $error) {
                die($error->getMessage());
            }
        }

    function filterByName($name) {
        try {
            $pdo = dbConnection();
            $sql = $pdo->prepare("SELECT * FROM usuario WHERE nome='$name'");
            $sql->execute();
            $data = $sql->fetchAll();
            return $data ?? false;
        }
        catch(PDOException $error) {
            die( $error->getMessage() );
        }
    }

    function filterByDate($date) {
        try {
            $pdo = dbConnection();
            $sql = $pdo->prepare("SELECT * FROM usuario WHERE data_de_nascimento='$date'");
            $sql->execute();
            $data = $sql->fetchAll();
            return $data ?? false;
        }
        catch(PDOException $error) {
            die($error->getMessage());
        }
    }

    function filterByBirthMonth($month) {
        try{

            $pdo = dbConnection();
            $sql = $pdo->prepare("SELECT id,nome,cpf, data_de_nascimento as mes_de_aniversario FROM usuario WHERE MONTH(data_de_nascimento)='$month'");
            $sql->execute();
            $data = $sql->fetchAll();

            return $data ?? false;
        }
        catch(PDOException $error) {
            die($error->getMessage());
        }
    }

?>
