<?php
    require "./config.php";
    //require "./userResponseVerify.php";

    function dbConnection() {
        $connection = null;

        try {
            $connection = new PDO(DB_DRIVE.":host=".DB_HOST.";dbname=".DB_DATABASE_NAME, DB_USER, DB_PASSWORD);
        }
        catch(Exception $error) {
            return $error->getMessage();
        }

        return $connection;

    }

    function dbInsert($nome, $cpf, $data) {
        try {

            $pdo = dbConnection();
            $sql = $pdo->prepare("INSERT INTO usuario VALUE (null, ?, ?,?)");
            $sql->bindParam(1,$nome);
            $sql->bindParam(2,$cpf);
            $sql->bindParam(3,$data);
            $sql->execute();
            return "Inserido com sucesso";
        }
        catch(PDOException $error) {
            return $error->getMessage();
        }
    }

    function dbSelectAll() {
        try {
            $pdo = dbConnection();
            $sql = $pdo->prepare("SELECT * FROM usuario");
            $sql->execute();
            $data = $sql->fetchAll();
            return $data;
        }
        catch(PDOException $error) {
            return $error->getMessage();
        }
    }

    function dbFilterByCpf($cpf) {
        try {
            $pdo = dbConnection();
            $sql = $pdo->prepare("SELECT * FROM usuario WHERE cpf='$cpf'");
            $sql->execute();
            $data = $sql->fetch();
            return $data ?? false;
        }
        catch(PDOException $error) {
            return $error->getMessage();
        }
    }

     function dbFilterByName($name) {
        try {
            $pdo = dbConnection();
            $sql = $pdo->prepare("SELECT * FROM usuario WHERE nome='$name'");
            $sql->execute();
            $data = $sql->fetchAll();
            return $data ?? false;
        }
        catch(PDOException $error) {
            return $error->getMessage();
        }
    }

    function dbFilterByDate($date) {
        try {
            $pdo = dbConnection();
            $sql = $pdo->prepare("SELECT * FROM usuario WHERE data_de_nascimento='$date'");
            $sql->execute();
            $data = $sql->fetchAll();
            return $data ?? false;
        }
        catch(PDOException $error) {
            return $error->getMessage();
        }
    }

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

    function dbUpdate($id, $campo,$valor) {
        try {
            $pdo = dbConnection();
            $sql = $pdo->prepare("UPDATE usuario SET  $campo='$valor' WHERE id=$id");
            $sql->execute();
            return "$campo alterado com sucesso";
        }
        catch(PDOException $error) {
            return $error->getMessage();
        }
    }

    function dbNumberOfDatas () {
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

    function dbFilterByBirthMonth($month) {
        $pdo = dbConnection();
        $sql = $pdo->prepare("SELECT id,nome,cpf, data_de_nascimento as mes_de_aniversario FROM usuario WHERE MONTH(data_de_nascimento)='$month'");
        $sql->execute();
        $data = $sql->fetchAll();

        return $data ?? false;
    }

?>
