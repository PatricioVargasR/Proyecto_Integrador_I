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
                    <h4> Ver y Modificar dato curioso
                        <a href="index.php" class="btn btn-danger float-end">Regresar</a>
                    </h4>
                    
                </div>
                <div class="card-body">

                <?php 

                    if(isset($_GET['id'])){

                        $curiosity_id = $_GET['id'];

                        $curiosity_edit = "SELECT * FROM curiosity WHERE id= '$curiosity_id'  LIMIT 1";
                        $curiosity_run = mysqli_query($conn, $curiosity_edit);

                        if(mysqli_num_rows($curiosity_run) > 0){

                            $curiosity_row = mysqli_fetch_array($curiosity_run)

                            //foreach($post_run as $post){

                ?>
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="curiosity_id" value="<?= $curiosity_row['id']?>">
                        <div class="row">
                                
                
                            <div class="col-md-12 mb-3">
                                <label for="">Descripción</label>
                                <textarea name="description" id="summernote" class="form-control" rows="4" required><?= $curiosity_row['description']; ?></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Estado</label> </br>
                                <!-- <input type="checkbox" name="status" width="70px" height="70px" /> -->
                                <input type="checkbox" name="status"  <?= $curiosity_row['status'] == '1' ? 'checked' : '' ?>   class="form-check-input">
                            </div>



                            <div class="col-md-12 mb-3">
                                <button type="submit" name="curiosity_update" class="btn btn-primary">Actualizar</button>
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
