<?php

include_once "../includes/header.php";
include_once "../includes/voltar.php";
include_once "../includes/footer.php";

require "../services/formValidation.php";
require "../services/filters.php";
require "../services/insert.php";

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$message = null;

$fieldsOk = fieldsVerify($nome, $cpf, $data);
$cpfOk = cpfValidation($cpf);
$cpfDontExists = !filterByCpf($cpf);

if($fieldsOk && $cpfOk) {
    if($cpfDontExists) {
        $dbMessage = dbInsert($nome, $cpf, $data);
        $message = "<p class='alert alert-success'>$dbMessage</p>";
    }
    else {
        $message = "<p class='alert alert-primary'>CPF já existe no banco de dados</p>";
    }

}
else {
    $message = "<p class='alert alert-danger'>Preencha todos os Campos e/ou<br>verifique se o CPF possui apenas números e 11 digitos</p>";
}


?>

<section class="ml-3 p-3">
    <?=$message?>
</section>
