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

                        $post_id = $_GET['id'];

                        $post_edit = "SELECT * FROM posts WHERE id= '$post_id' LIMIT 1";
                        $post_run = mysqli_query($conn, $post_edit);

                        if(mysqli_num_rows($post_run) > 0){

                            $post_row = mysqli_fetch_array($post_run)

                            //foreach($post_run as $post){

                ?>
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="post_id" value="<?= $post_row['id']?>">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Categorias</label>

                                <?php

                                    if(isset($_GET['id'])){

                                        $category_id = $_GET['id'];

                                        $category = "SELECT * FROM categories WHERE status ='0'";
                                        $category_run = mysqli_query($conn, $category);

                                        if(mysqli_num_rows($category_run) > 0 ){

                                        ?>

                                        <select name="category_id" class="form-control" required>
                                            <option value="">--Selecciona una categoria--</option>
                                            <?php 

                                                foreach($category_run as $categoryitem){
                                                    ?>
                                                        <option value="<?=$categoryitem['id'] ?>" <?=$categoryitem['id'] == $post_row['category_id'] ? 'selected':'' ?>>
                                                            <?= $categoryitem['name']?>
                                                        
                                                        </option>
                                                    <?php
                                                }
                                            
                                            ?>
                                        </select>

                                        <?php

                                    } else {

                                        ?>
                                            <h5>Ninguna categoria disponible</h5>

                                        <?php
                                    }
                                
                                ?>


                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Nombre</label>
                                <input type="text" name="name" value="<?= $post_row['name']; ?>" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Slug (URL) </label>
                                <input type="text" name="slug" value="<?= $post_row['slug']; ?>" class="form-control" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Descripción</label>
                                <textarea name="description" id="summernote" class="form-control" rows="4" required><?= $post_row['description']; ?></textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" value="<?= $post_row['meta_title']; ?>" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4" required><?= $post_row['meta_description']; ?></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4"><?= $post_row['meta_keyword']; ?></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Imagen </label>
                                <input type="hidden" name="old_image" value="data:image/jpeg;base64,<?= base64_encode($post_row['image']); ?>">
                                <input accept="image/*" type="file" name="image" class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Estado</label> </br>
                                <!-- <input type="checkbox" name="status" width="70px" height="70px" /> -->
                                <input type="checkbox" name="status"  <?= $post_row['status'] == '1' ? 'checked' : '' ?>   class="form-check-input">
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="post_update"class="btn btn-primary">Actualizar</button>
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
