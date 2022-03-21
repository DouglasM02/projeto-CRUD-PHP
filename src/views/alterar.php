<?php

include_once "../includes/header.php";
//include_once "../includes/voltar.php";
include_once "../includes/footer.php";

require_once "../services/filters.php";
require_once "../services/findUser.php";
require_once "../services/formValidation.php";
require_once "../services/update.php";
require_once "../assets/returnMessage.php";

$id = $_GET['alterar'] ?? false;
$datas = '';
$messageNome = '';
$messageCpf = '';
$messageData = '';
$nomeRetorno = null;
$cpfRetorno = null;
$dataRetorno = null;
$user = dbFindOne($id);



$nome = $_POST['nome'] ?? false;
$cpf = $_POST['cpf'] ?? false;
$data = $_POST['data'] ?? false;

$fieldsOk = fieldsVerify($nome, $cpf, $data);

if($fieldsOk) {
    $cpfDontExists = !filterByCpf($cpf);

    $nomeRetorno = dbUpdate($id,"nome",$nome);
    $dataRetorno = dbUpdate($id,"data_de_nascimento",$data);

    if($cpfDontExists) {
        $cpfRetorno = dbUpdate($id,"cpf",$cpf);
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


if($id && $user) {
    $datas = "
        <form action='./alterar.php?alterar=".$user['id']."' method='post'>
            <label for='name' class='form-label'>Nome:</label>
            <input id='name' name='nome' type='text' class='form-control mb-2' placeholder='Digite um nome' value='".$user['nome']."'/>
            <label for='cpf' class='form-label'>CPF:</label>
            <input id='cpf' name='cpf' type='text' class='form-control mb-2' placeholder='Digite um CPF' maxlength='11' value='".$user['cpf']."'/>
            <label for='data' class='form-label'>Data de nascimento:</label>
            <input id='data' name='data' type='date' class='form-control mb-3' value='".$user['data_de_nascimento']."'/>
            <button type='submit' class='btn btn-warning'>Alterar</button>
        </form>
    ";
}
else {
    $datas = "<div class='alert alert-warning'>Erro inesperado</div>";
}




?>

<div class="container p-3">
    <a href="/projeto/src/views/listar.php" class="mt-3 btn btn-primary">Voltar</a>
    <?=$messageNome ?>
    <?=$messageCpf ?>
    <?=$messageData ?>
    <?= $datas ?>
</div>
