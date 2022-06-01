
<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])){?>
            <div class="alert alert-<?php= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset(); }?>
            <div class="card card-body">
                <form action="save.php" method = "POST">
                    <div class="form-group">
                        <input type="text" name="Titulo" class = "form-control" 
                        placeholder= "Titulo de la tarea" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="Descripcion" rows="2" class="form-control"
                        placeholder="Descripcion de la tarea"></textarea>
                    </div>
                    <input type = "submit" class = "btn btn-success btn-block" name = "save-task" value = "Guadar">
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                                $query = "select * from tarea";
                               $resultado_task = mysqli_query($Conn, $query);

                               while($row = mysqli_fetch_array($resultado_task)){  ?>
                                        <tr>
                                            <td><?php  echo $row['TITULO']?></td>
                                            <td><?php  echo $row['DESCRIPCION']?></td>
                                            <td><?php  echo $row['FECHA']?></td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $row['ID']?>" class="btn btn-secondary">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                <a href="delete.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                   
                             <?php  } ?>
                        </tbody>
                </table>
        </div>
    </div>
</div>


    
<?php include("includes/footer.php") ?>