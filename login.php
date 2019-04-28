<?php

  require_once ("./database.php");

  $login = new database();
  $result = $login->getUser($_POST["email"],$_POST["senha"]);

  if(!empty($result))
  {
    session_start();
    $_SESSION["nome"] = $result[0]["nome"];
    $_SESSION["email"] = $result[0]["email"];
    $_SESSION["id"] = $result[0]["id"];

    header('Location: ./views/main.view.php');
  }else
  {
    header('Location: ./views/login.view.php');
  }
