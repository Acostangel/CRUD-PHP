<?php 
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM tarea WHERE id = $id";
        $resultado = mysqli_query($Conn,$query);
        if(mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $titulo = $row['TITULO'];
            $descripcion = $row['DESCRIPCION'];
        }
        if (isset($_POST['update'])){
            $id = $_GET['id'];
            $titulo = $_POST['titulo'];   
            $descripcion = $_POST['descripcion'];

            $query = "UPDATE tarea SET titulo = '$titulo',descripcion ='$descripcion' WHERE id = $id";
            mysqli_query($Conn,$query);
            $_SESSION['message'] = "Registro actualizado con exito";
            $_SESSION['message_type'] = "Seccess";
            header("location: index.php");
        }
    }   
?>
<?php  include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method = "POST">
                    <div class="form-group">
                        <input type = "text" name="titulo"  value="<?php echo $titulo; ?>"
                        class = "form-control" placeholder = "Actualizar titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="Form-control" placeholder = "Actualizar Descripcion">
                                <?php echo $descripcion;?>
                        </textarea>
                        <button class="btn btn-success" name = "update">
                                Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php  include("includes/footer.php"); ?>