<?php

    require_once "../DB/DB.php";

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
                die($error->getMessage());
            }
        }





?>
