<?php

include_once "../includes/header.php";
include_once "../includes/footer.php";

require_once "../assets/returnMessage.php";
require_once "../controllers/userController.php";

$id = $_GET['alterar'] ?? false;
$form = '';
$messageNome = '';
$messageCpf = '';
$messageData = '';
$nomeRetorno = null;
$cpfRetorno = null;
$dataRetorno = null;
$user = new UserController();

$userInformation = $user->findOne($id);

$nome = $_POST['nome'] ?? false;
$cpf = $_POST['cpf'] ?? false;
$data = $_POST['data'] ?? false;

$fieldsOk = $user->fieldsVerify($nome, $cpf, $data);

if($fieldsOk) {
    $cpfDontExists = !$user->cpfValidation($cpf);

    $nomeRetorno = $user->updateOne($id,"nome",$nome);
    $dataRetorno = $user->updateOne($id,"data_de_nascimento",$data);

    if($cpfDontExists) {
        $cpfRetorno = $user->updateOne($id,"cpf",$cpf);
        $messageCpf = returnMessage($cpfRetorno);
    }
    else {
        $messageCpf = "<div class='alert alert-danger'>CPF já existe no banco de dados</div>";
    }

    $messageNome = returnMessage($nomeRetorno);
    $messageData = returnMessage($dataRetorno);

}
else {
    $messageNome = '';
    $messageCpf = '';
    $messageData = '';
}


if($id && $userInformation) {
    $form = "
        <form action='./alterar.php?alterar=".$userInformation['id']."' method='post'>
            <label for='name' class='form-label'>Nome:</label>
            <input id='name' name='nome' type='text' class='form-control mb-2' placeholder='Digite um nome' value='".$userInformation['nome']."'/>
            <label for='cpf' class='form-label'>CPF:</label>
            <input id='cpf' name='cpf' type='text' class='form-control mb-2' placeholder='Digite um CPF' maxlength='11' value='".$userInformation['cpf']."'/>
            <label for='data' class='form-label'>Data de nascimento:</label>
            <input id='data' name='data' type='date' class='form-control mb-3' value='".$userInformation['data_de_nascimento']."'/>
            <button type='submit' class='btn btn-warning'>Alterar</button>
        </form>
    ";
}
else {
    $form = "<div class='alert alert-warning'>Erro inesperado</div>";
}




?>

<div class="container p-3">
    <a href="/projeto/src/views/listar.php" class="mt-3 btn btn-primary">Voltar</a>
    <?=$messageNome ?>
    <?=$messageCpf ?>
    <?=$messageData ?>
    <?= $form ?>
</div>
