<?php

    require_once "../DB/DB.php";
    function cpfValidation($response) {
        if(is_numeric($response)) {
            if(strlen( $response ) < 11) {
                return  false;
            }
                return true;
        }
        return false;

    }

    function fieldsVerify($nome, $cpf, $data) {
        if(empty($nome) || empty($cpf) || empty($data)) {
            return false;
        }

        return true;
    }



?>
