<?php
include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM tarea where id = $id";
        $resultado = mysqli_query($Conn,$query);
        if (!$resultado) {
            die("Query Filed");
        }

        $_SESSION['message'] = 'Registro eliminado correctamente';
        $_SESSION['message_type'] = 'Danger';
        header("location: Index.php");
    }
?>