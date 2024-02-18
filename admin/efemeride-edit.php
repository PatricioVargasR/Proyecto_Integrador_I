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
                    <h4> Modificar Posts
                        <a href="post-view.php" class="btn btn-danger float-end">Regresar</a>
                    </h4>
                    
                </div>
                <div class="card-body">

                <?php 

                    if(isset($_GET['id'])){

                        $efemeride_id = $_GET['id'];

                        $efemeride_edit = "SELECT * FROM efemeride WHERE id= '$efemeride_id' LIMIT 1";
                        $efemeride_run = mysqli_query($conn, $efemeride_edit);

                        if(mysqli_num_rows($efemeride_run) > 0){

                            $efemeride_row = mysqli_fetch_array($efemeride_run)

                            //foreach($post_run as $post){

                ?>
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="efemeride_id" value="<?= $efemeride_row['id']?>">
                        <div class="row">
                        
                            <div class="col-md-6 mb-3">
                                <label for="">Nombre</label>
                                <input type="text" name="name"  value="<?= $efemeride_row['name']; ?>" class="form-control" required>
                            </div>
                                
                            <div class="col-md-6 mb-3">
                                
                                <label for="">Fecha de la Efemeride</label>
                                    <?php
                                        $formatted_date = date('Y-m-d', strtotime($efemeride_row['date']));
                                    ?>
                                    <input type="date" name="date" value="<?= $formatted_date; ?>" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Estado</label> </br>
                                <!-- <input type="checkbox" name="status" width="70px" height="70px" /> -->
                                <input type="checkbox" name="status"  <?= $efemeride_row['status'] == '1' ? 'checked' : '' ?>   class="form-check-input">
                            </div>

                
                            <div class="col-md-12 mb-3">
                                <label for="">Descripción</label>
                                <textarea name="description" id="summernote" class="form-control" rows="4" required><?= $efemeride_row['description']; ?></textarea>
                            </div>


                            <div class="col-md-12 mb-3">
                                <button type="submit" name="efemeride_update"class="btn btn-primary">Actualizar</button>
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
