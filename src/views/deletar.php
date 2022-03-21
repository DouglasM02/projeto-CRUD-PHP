<?php

include_once "../includes/header.php";
//include_once "../includes/voltar.php";
include_once "../includes/footer.php";

require_once "../services/delete.php";

$id = $_GET['deletar'] ?? false;
$message = '';

if($id) {
    $dado = dbDelete($id);
    $message = "<div class='alert alert-success mt-3'>".$dado."</div>";
}
else {
    $message = "<div class='alert alert-warning mt-3'>Erro ao deletar</div>";
}

?>

<div class="container mt-2">
    <a href="/projeto/src/views/listar.php" class="mt-3 btn btn-primary">Voltar</a>
    <?= $message ?>
</div>
