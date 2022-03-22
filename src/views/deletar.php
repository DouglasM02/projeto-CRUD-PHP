<?php

include_once "../includes/header.php";
include_once "../includes/footer.php";

require_once "../controllers/userController.php";

$id = $_GET['deletar'] ?? false;
$user = new UserController();
$message = '';

if($id) {
    $value = $user->delete($id);
    if($value) {
        $message = "<div class='alert alert-success mt-3'>".$value."</div>";
    }
    else {
        $message = "<div class'alert alert-danger'>Erro ao deletar</div>";
    }
}
else {
    $message = "<div class='alert alert-warning mt-3'>Erro ao deletar</div>";
}

?>

<div class="container mt-2">
    <a href="/projeto/src/views/listar.php" class="mt-3 btn btn-primary">Voltar</a>
    <?= $message ?>
</div>
