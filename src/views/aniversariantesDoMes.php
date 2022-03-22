<?php

include_once "../includes/header.php";
include_once "../includes/voltar.php";
include_once "../includes/footer.php";

require_once "../controllers/userController.php";

$users = new UserController();

$values = $users->filterByBirthMonth();

$message = '';

if($values) {

  foreach($values as $key => $user) {
      $date = date_create($user['mes_de_aniversario']);
      $dataAniversario = date_format($date,"d/m");

      $message .= "
          <tr>
              <th scope='row'>".$user['id']."</th>
              <td>".$user['nome']."</td>
              <td>".$user['cpf']."</td>
              <td>".$dataAniversario."</td>
              <td>
                  <a href='alterar.php?alterar=".$user['id']."' class='btn btn-warning'>Alterar</a>
                  <a href='deletar.php?deletar=".$user['id']."' class='btn btn-danger'>Excluir</a>
              </td>
          </tr>
          ";
  }
}
else {
  $message = "<div class='alert alert-danger'>Não foram encontrados usuários que fazem aniversário este mês</div>";
}

?>
<section class="container">

    <table class="table table-dark table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Data do aniversário</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?=$message ?>
  </tbody>
</table>
</section>
