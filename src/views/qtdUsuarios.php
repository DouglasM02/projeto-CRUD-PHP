<?php

include_once "../includes/header.php";
include_once "../includes/voltar.php";
include_once "../includes/footer.php";

require_once "../controllers/userController.php";

$user = new UserController();

$qtd = $user->countRows();
$message = '';

if($qtd) {
    $message ="<div class='alert alert-primary'>Quantidade de Cadastros no banco de dados:  ".$qtd['COUNT(*)']."</div>";
}
else {
    $message ="<div class='alert alert-danger'>Não há cadastros no banco de dados</div>".$qtd['COUNT(*)'];
}


?>

<div class="container p-3">
    <?=$message?>
</div>
