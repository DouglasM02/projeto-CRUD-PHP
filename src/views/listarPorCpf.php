<?php

include_once "../includes/header.php";
include_once "../includes/voltar.php";
include_once "../includes/footer.php";

require_once "../controllers/userController.php";

$cpf = $_POST['cpf'] ?? false;

$user = new UserController();
$message = '';
$value = null;

if($cpf) {
  $value = $user->filterByCpf($cpf);
}


if($value){
$message .= "
        <tr>
            <th scope='row'>".$value['id']."</th>
            <td>".$value['nome']."</td>
            <td>".$value['cpf']."</td>
            <td>".$value['data_de_nascimento']."</td>
            <td>
                <a href='alterar.php?alterar=".$value['id']."' class='btn btn-warning'>Alterar</a>
                <a href='deletar.php?deletar=".$value['id']."' class='btn btn-danger'>Excluir</a>
            </td>
        </tr>
        ";

}
else {
    $message = "<div class='alert alert-danger'>CPF não econtrado</div>";
}


?>
<section class="container">

    <table class="table table-dark table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?=$message ?>
  </tbody>
</table>
</section>
