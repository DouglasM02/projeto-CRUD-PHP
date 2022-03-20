<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de CPF</title>
    <link rel="stylesheet" href="./index.css" />
</head>
<body>
    <form action="insert.php" method="post">
        <label>NOME</label>
        <input type="text" name="nome" value=""/>
        <label>CPF</label>
        <input type="text" name="cpf" maxlength="11"/>
        <label>DATA DE NASCIMENTO</label>
        <input type="date" name="dataDeNascimento"/>
        <button type="submit">Enviar</button>
    </form>
    <br><br>
    <a href="listAll.php" class="btn">Listar todos os usuários</a>
    <br><br>
    <form action="filterByCpf.php" method="post">
        <label>CPF para pesquisar</label>
        <input type="text" name="cpf" maxlength="11"/>
        <button type="submit">Enviar</button>
    </form>
    <br><br>
    <form action="filterByName.php" method="post">
        <label>Nome para pesquisar</label>
        <input type="text" name="nome"/>
        <button type="submit">Enviar</button>
    </form>
    <br><br>
    <form action="filterByDate.php" method="post">
        <label>Nome para pesquisar</label>
        <input type="date" name="date"/>
        <button type="submit">Enviar</button>
    </form>
    <br><br>
    <a href="NumberOfDatas.php" class="btn">quantidade de cadastros existentes</a>
    <br><br>
    <br><br>
    <a href="filterByBirthMonth.php" class="btn">aniversariantes do mês</a>
</body>
</html>
