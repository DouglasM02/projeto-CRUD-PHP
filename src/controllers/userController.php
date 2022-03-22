<?php

require_once "../models/User.php";

class UserController {
    private $user;

    public function __construct()
    {

        try {
            $this->user = new User();
        }
        catch(Exception $error) {
            die($error->getMessage());
        }
    }

    public function cpfValidation($cpf) {
         if(is_numeric($cpf)) {
            if(strlen( $cpf ) < 11) {
                return  false;
            }
                return true;
        }
        return false;
    }

    public function fieldsVerify($nome, $cpf, $data) {
        if(empty($nome) || empty($cpf) || empty($data)) {
            return false;
        }
        return true;
    }

    public function findAll() {
        $value = $this->user->findAll();
        if($value) {
            return $value;
        }
        return false;
    }

    public function findOne($id) {
        $value = $this->user->findOne($id);
        if($value){
            return $value;
        }
        return false;
    }

    public function insert($nome,$cpf,$data) {
        $value = $this->user->insert($nome,$cpf,$data);
        if ($value) {
            return $value;
        }
        return false;
    }

    public function delete($id) {
        $value = $this->user->delete($id);

        if($value) {
            return $value;
        }
        return false;
    }

    public function updateOne($id, $campo, $valor) {
        $value = $this->user->updateOne($id,$campo,$valor);
        if ($value) {
            return $value;
        }
        return false;
    }

    public function countRows() {
        $value = $this->user->countRows();
        if ($value) {
            return $value;
        }
        return false;
    }

    public function filterByCpf($cpf) {
        $value = $this->user->filterByCpf($cpf);
        if ($value) {
            return $value;
        }
        return false;
    }

    public function filterByName($name) {
        $value = $this->user->filterByName($name);
        if ($value) {
            return $value;
        }
        return false;
    }

    public function filterByDate($date) {
        $value = $this->user->filterByDate($date);
        if ($value) {
            return $value;
        }
        return false;
    }

    function filterByBirthMonth() {
        date_default_timezone_set('America/Sao_Paulo');
        $month = date('m');
        $value = $this->user->filterByBirthMonth($month);
        if ($value) {
            return $value;
        }
        return false;
    }

}










?>
