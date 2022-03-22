<?php

require_once "../config/config.php";
class User {
    private $drive;
    private $host;
    private $dbname;
    private $user;
    private $password;
    private $pdo;

    public function __construct()
    {
        $this->drive= DB_DRIVE;
        $this->host= DB_HOST;
        $this->dbname = DB_DATABASE_NAME;
        $this->user =  DB_USER;
        $this->password = DB_PASSWORD;

         try {
            $this->pdo = new PDO($this->drive.":host=".$this->host.";dbname=".$this->dbname, $this->user, $this->password);
        }
    catch(Exception $error) {
            die( $error->getMessage());
        }
    }

    public function findAll() {
        try {
            $sql = $this->pdo->prepare("SELECT * FROM usuario");
            $sql->execute();
            $data = $sql->fetchAll();
            return $data;
        }
        catch(PDOException $error) {
            die($error->getMessage());
        }
    }

    public function findOne($id) {
         try {
            $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE id=$id");
            $sql->execute();
            $data = $sql->fetch();
            return $data ?? false;
        }
        catch(PDOException $error) {
            die( $error->getMessage());
        }
    }

    public function insert($nome,$cpf,$data) {
        try {
                $sql = $this->pdo->prepare("INSERT INTO usuario VALUE (null, ?, ?,?)");
                $sql->bindParam(1,$nome);
                $sql->bindParam(2,$cpf);
                $sql->bindParam(3,$data);
                $sql->execute();
                return "Inserido com sucesso";
            }
            catch(PDOException $error) {
                die($error->getMessage());
            }
    }

    public function delete($id){
        try {
            $sql = $this->pdo->prepare("DELETE FROM usuario WHERE id=$id");
            $sql->execute();
            return "Usuário Removido";
        }
        catch(PDOException $error) {
            return $error->getMessage();
        }
    }

    public function updateOne($id, $campo, $valor) {
         try {
        $sql = $this->pdo->prepare("UPDATE usuario SET  $campo='$valor' WHERE id=$id");
        $sql->execute();
        return "$campo alterado com sucesso";
    }
    catch(PDOException $error) {
        die($error->getMessage());
    }
    }

    public function countRows() {
         try {
            $sql = $this->pdo->prepare("SELECT COUNT(*) FROM usuario");
            $sql->execute();
            $data = $sql->fetch();
            return $data ?? false;

        }
        catch(PDOException $error) {
            return $error->getMessage();
        }
    }

    public function filterByCpf($cpf) {
         try {
                $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE cpf='$cpf'");
                $sql->execute();
                $data = $sql->fetch();
                return $data ?? false;
            }
            catch(PDOException $error) {
                die($error->getMessage());
            }
    }

    public function filterByName($name) {
        try {
            $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE nome='$name'");
            $sql->execute();
            $data = $sql->fetchAll();
            return $data ?? false;
        }
        catch(PDOException $error) {
            die( $error->getMessage() );
        }
    }

    public function filterByDate($date) {
        try {
            $sql = $this->pdo->prepare("SELECT * FROM usuario WHERE data_de_nascimento='$date'");
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
            $sql = $this->pdo->prepare("SELECT id,nome,cpf, data_de_nascimento as mes_de_aniversario FROM usuario WHERE MONTH(data_de_nascimento)='$month'");
            $sql->execute();
            $data = $sql->fetchAll();
            return $data ?? false;
        }
        catch(PDOException $error) {
            die($error->getMessage());
        }
    }

}


?>
