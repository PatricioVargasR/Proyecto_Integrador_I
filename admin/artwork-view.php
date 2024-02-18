<?php

    include('authentication.php');
    include('includes/header.php');

?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('message.php') ?>

            <div class="card">
                <div class="card-header">
                    <h4> Ver Imagenes
                        <a href="artwork-add.php" class="btn btn-primary float-end">Subir nueva imagen</a>
                    </h4>
                    
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>

                        </thead>
                        <tbody>
                        <!-- Extraemos los datos de la base de datos  -->
                            <?php

                                // $posts = "SELECT * FROM posts WHERE status != '2'"

                                $artwork = "SELECT * FROM artwork WHERE status != '2'";
                                $artwork_run = mysqli_query($conn, $artwork);

                                if (mysqli_num_rows($artwork_run) > 0) {
                                    
                                    foreach($artwork_run as $artworks){
                                        ?>  

                                            <tr>
                                                <td><?= $artworks['id']; ?></td>
                                                <td> <img src="data:image/*;base64,<?= base64_encode($artworks['image']); ?>" alt="<?=$artworks['name'];?>" width="60px" height="60px"></td>
                                                <td><?= $artworks['name']; ?></td>
                                                <td>
                                                        

                                                        <?= $artworks['status'] == '1' ? 'Invisible':'Visible';
                                                        // if($item['status'] == '1') { echo 'Hidden'; } else { echo 'Visible'; }
                                                    ?>


                                                </td>
                                                <!-- <td><?= $artworks['upload_at']; ?></td> -->
                                                <td><a href="artwork-edit.php?id=<?= $artworks['id']; ?>" class="btn btn-success">Editar</a></td>
                                                <td>

                                                    <form action="code.php" method="POST">
                                                        <button type="submit" name="artwork_delete" value="<?=$artworks['id'];?>" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                    
                                                </td>
                                            </tr>

                                        <?php
                                    }

                                
                                } else {

                                    ?>
                                        <tr>
                                            <td colspan="6">Información no encontrada</td>
                                        </tr>
                                    <?php
                                }


                            ?>

                        </tbody>
                    </table>                   

                </div>
            </div>
        </div>
    </div>
</div>


<?php

    include('includes/footer.php');
    include('includes/scripts.php');

?>
