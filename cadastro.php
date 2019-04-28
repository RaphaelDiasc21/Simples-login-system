<?php

require_once('./database.php');

$cadastro = new database();
$result = $cadastro->insert($_GET["nome"],$_GET["email"],$_GET["senha"]);

if($result > 0){
    echo "usuario cadastrado";
}else{
    echo "usuario não cadastrado !";
}




?>