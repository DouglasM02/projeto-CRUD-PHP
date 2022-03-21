<?php

include_once "../includes/header.php";
include_once "../includes/voltar.php";
include_once "../includes/footer.php";
include_once "../services/countRows.php";

$qtd = countRows();
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
