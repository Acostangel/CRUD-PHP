<?php   

include("db.php");

    if(isset($_POST['save-task'])){
       $titulo = $_POST['Titulo'];
       $Descripcion = $_POST['Descripcion'];

      $query = "INSERT INTO tarea(TITULO, DESCRIPCION) VALUES ('$titulo','$Descripcion')";
      $resultado = mysqli_query($Conn,$query);
        if (!$resultado) {
            die("Query Failed");
        }

        $_SESSION['message']='success';
        $_SESSION['message_type']='bg-success';
        header("location: index.php");
    }
?>