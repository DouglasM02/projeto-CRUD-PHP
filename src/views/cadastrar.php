<?php

include_once "../includes/header.php";
include_once "../includes/voltar.php";
include_once "../includes/footer.php";

require_once "../controllers/userController.php";

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$user = new UserController();
$message = null;

$fieldsOk = $user->fieldsVerify($nome, $cpf, $data);
$cpfOk = $user->cpfValidation($cpf);
$cpfDontExists = !$user->filterByCpf($cpf);

if($fieldsOk && $cpfOk) {
    if($cpfDontExists) {
        $dbMessage = $user->insert($nome, $cpf, $data);
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
