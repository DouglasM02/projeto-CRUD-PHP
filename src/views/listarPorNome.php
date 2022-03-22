<?php

include_once "../includes/header.php";
include_once "../includes/voltar.php";
include_once "../includes/footer.php";

require_once "../controllers/userController.php";

$nome = $_POST['nome'] ?? false;
$users = new UserController();
$values = null;
if($nome) {
  $values = $users->filterByName($nome);
}

$message = '';
if($values) {

    foreach($values as $key => $user) {
            $message .= "
            <tr>
                <th scope='row'>".$user['id']."</th>
                <td>".$user['nome']."</td>
                <td>".$user['cpf']."</td>
                <td>".$user['data_de_nascimento']."</td>
                <td>
                    <a href='alterar.php?alterar=".$user['id']."' class='btn btn-warning'>Alterar</a>
                    <a href='deletar.php?deletar=".$user['id']."' class='btn btn-danger'>Excluir</a>
                </td>
            </tr>
            ";
    }
}
else {
    $message= "<div class='alert alert-danger'>Não foi encontrado usuário com esse nome</div>";
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
