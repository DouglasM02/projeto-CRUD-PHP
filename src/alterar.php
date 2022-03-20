

<?php

require "./userResponseVerify.php";
require "./dataBaseHandle.php";



$id = $_GET['alterar'];
$nome = null;
$cpf = null;
$data = null;

echo "<form method='post' action=alterar.php?alterar=". $id .">";
echo "<label>NOME</label>";
echo "<input type='text' name='nome' value=''''/>";
echo "<label>CPF</label>";
echo "<input type='text' name='cpf' maxlength='11' value=''/>";
echo "<label>DATA DE NASCIMENTO</label>";
echo "<input type='date' name='dataDeNascimento' value=''/>";
echo "<button type='submit'>Enviar</button>";
echo "</form>";

if(userParamVerify($id)) {
     if (isset($_POST['nome']))
     {
         $nome = $_POST['nome'];
         if(userParamVerify($nome)) {
            $message = dbUpdate($id,'nome',$nome);
            echo $message;
            echo "<br>";
         }
      }

   if (isset($_POST['cpf']))
   {
       $cpf = $_POST['cpf'];
       if(userParamVerify($cpf)) {

            if(cpfValidation($cpf)) {

                $message = dbUpdate($id,"cpf",$cpf);
                echo $message;
                echo "<br>";
            }
            else {
                echo "Preencha o CPF com apenas números e coloque 11 digitos";
                echo "<br>";
            }
       }
   }

    if (isset($_POST['dataDeNascimento']))
    {
        $data = $_POST['dataDeNascimento'];
        if(userParamVerify($data)) {
            $message = dbUpdate($id,"data_de_nascimento",$data);
            echo $message;
            echo "<br>";
        }
    }

    echo "<br><br>";
    echo "<a href=/projeto/src/listAll.php>Voltar</a>";
}
else {
    echo "Usuário não encontrado";
    echo "<br><br>";
    echo "<a href=/projeto/src/listAll.php>Voltar</a>";
}


?>
