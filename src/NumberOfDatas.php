<?php

require "./dataBaseHandle.php";

$numOfRows = dbNumberOfDatas();

echo "número de dados no banco de dados: ".$numOfRows['COUNT(*)'];
echo "<br><br>";
echo "<a href=/projeto/src/>Voltar</a>";

?>
