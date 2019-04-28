<?php
  require_once('../database.php');

  if(session_status() != 1){
    header('Location: /login.view.php');
    
  }else{
      session_start();
      $task = new database();
      $tasks = $task->getTasks($_SESSION["id"]);
      
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $_SESSION["nome"] ?></h1>
    
    <h2>Alguma tarefa ? </h2>

    <form method="POST" action="../task.php">
      Titulo:
      <input type="text" name="title">

      Descrição:
      <input type="text" name="body">

      <button type="submit"> OK </button>
    
    </form>

    <?php if(empty($tasks)) { ?>
      <?php echo "Voce não tem nenhuma tarefa para hoje" ?>
    <?php }else{ ?>
      <ul> 
        <?php foreach($tasks as $t){ ?>          
            <li><?php echo $t["title"].": ".$t["body"] ?></li>
        <?php } ?>
      </ul>
        <?php } ?>

</body>
</html>