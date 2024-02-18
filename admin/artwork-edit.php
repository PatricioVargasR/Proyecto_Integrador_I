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
                    <h4> Agregar Imagenes
                        <a href="artwork-view.php" class="btn btn-danger float-end">Regresar</a>
                    </h4>
                    
                </div>
                <div class="card-body">

                <?php 

                    if(isset($_GET['id'])){

                        $artwork_id = $_GET['id'];

                        $artwork_edit = "SELECT * FROM artwork WHERE id= '$artwork_id'  LIMIT 1";
                        $artwork_run = mysqli_query($conn, $artwork_edit);

                        if(mysqli_num_rows($artwork_run) > 0){

                            $artworks = mysqli_fetch_array($artwork_run)

                            //foreach($post_run as $post){

                ?>
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">

                            
                            <input type="hidden" name="artwork_id" value="<?= $artworks['id']; ?>">
                            
                                <label for="">Imagen </label>
                                
                                <input accept="image/*" type="file" name="image" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Nombre</label>
                                <input type="text" name="name" value="<?= $artworks['name']; ?>" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Estado</label> </br>
                                <!-- <input type="checkbox" name="status" width="70px" height="70px" /> -->
                                <input type="checkbox" name="status" value="<?= $artworks['status'] == '1' ? 'checked' : '' ?> " class="form-check-input">
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="artwork-update"class="btn btn-primary">Actualizar Imagen</button>
                            </div>
                        </div>
                    </form>
                    <?php
                        }

                        } else {
                                
                            ?>

                                <h4>No se encontró información</h4>

                            <?php
                        }
                            
                        
                ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

    include('includes/footer.php');
    include('includes/scripts.php');

?>
