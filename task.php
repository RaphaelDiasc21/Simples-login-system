<?php
    require_once('./database.php');
    session_start();
    $task = new database();

    $task->setTask($_SESSION["id"],$_POST["title"],$_POST["body"]);

    header('location: ./views/main.view.php');