<?php

class database {
     private $con;

     public function __construct()
     { 
        try{
        $this->con = new PDO('mysql:host=127.0.0.1;dbname=cadastro_teste', 'root',''); 

        }catch(PDOException $e){
            echo $e->gerMessage();
        }
    }

     public function insert($nome,$email,$senha)
     {

        try{
        $query = $this->con->prepare("INSERT INTO usuario(nome,email,senha)VALUES(:nome,:email,:senha)");
        $query->bindParam(":nome",$nome);
        $query->bindParam(":email",$email);
        $query->bindParam(":senha",$senha);
        $query->execute();
        return $query->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
     }

     public function getUser($email,$senha)
     { 
        $query = $this->con->prepare("SELECT id,nome,email,senha FROM usuario WHERE email = :email and senha = :senha");
        $query->execute([':email' => $email, ':senha' => $senha]);
        $user = $query->fetchAll(PDO::FETCH_ASSOC);
        return $user;
     }

     public function getTasks($id)
     {
      $query = $this->con->prepare("SELECT title,body FROM tasks WHERE id_usuario = ?");
      $query->execute([$id]);
      $results = $query->fetchAll(PDO::FETCH_ASSOC);
      return $results;
     }

     public function setTask($id_usuario,$title,$body)
     {
      $query = $this->con->prepare("INSERT INTO tasks(id_usuario,title,body)VALUES(:id,:title,:body)");
      $query->execute(["id" => $id_usuario, "title" => $title, "body" => $body]);

      return $query->rowCount();
     }
  }

  ?>