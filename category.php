<?php

    include('includes/config.php');

    if(isset($_GET['title'])){

        $slug = mysqli_real_escape_string($conn, $_GET['title']);

        $category = "SELECT slug,meta_title,meta_description,meta_keyword FROM categories WHERE slug = '$slug' AND status='0' LIMIT 1";
        $category_run = mysqli_query($conn, $category);

        if(mysqli_num_rows($category_run) > 0){

            $categoryItem = mysqli_fetch_array($category_run);

            $page_title = $categoryItem['meta_title'];
            $meta_description = $categoryItem['meta_title'];
            $meta_keywords = $categoryItem['meta_keyword'];

        } else {

            
            $page_title = "Página de Categorias";
            $meta_description = "Página de categorias del museo del santo";
            $meta_keywords = "El santo, Tulancingo, Hidalgo, Cultura";
        }            
        
    } else {

        $page_title = "Página de Categorias";
        $meta_description = "Página de categorias del museo del santo";
        $meta_keywords = "El santo, Tulancingo, Hidalgo, Cultura";

    } 


    include('includes/header.php');
    include('includes/navbar.php');
?>


<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white" >Acerca de la categoría</h3>
                <div class="underline"></div>
                <?php

                if(isset($_GET['title'])){
                    
                    $slug = mysqli_real_escape_string($conn, $_GET['title']);

                    $category = "SELECT name,slug,description, meta_keyword FROM categories WHERE slug='$slug' AND status = '0' LIMIT 1";
                    $category_run = mysqli_query($conn, $category);

                    if(mysqli_num_rows($category_run) > 0){

                        foreach ($category_run as $item) {
                            
                            
                        ?>
                            <p class="text-white">Nombre de la Categoría: <?= $item['name'] ?></p>
                            <p class="text-white">Descripción: <?= $item['description'] ?></p>
                            <p class="text-white">Palabras Claves: <?= $item['meta_keyword'] ?></p>
                        <?php
                        }

                    }
                }
                ?>
            </div>
        </div>
    </div>
</div> 

<section class="portafolio">
        <h2>Últimas noticias relacionadas</h2>
        <p>
            
        </p>
        <ul class="cartas">
            <?php

                if(isset($_GET['title'])){
                    
                    $slug = mysqli_real_escape_string($conn, $_GET['title']);

                    $category = "SELECT id,slug FROM categories WHERE slug='$slug' AND status = '0' LIMIT 1";
                    $category_run = mysqli_query($conn, $category);

                    if(mysqli_num_rows($category_run) > 0){

                        $categoryItem = mysqli_fetch_array($category_run);
                        $category_id = $categoryItem['id'];

                        $posts = "SELECT category_id, name, slug, created, image, meta_description FROM posts WHERE category_id='$category_id' AND status='0' ORDER BY id DESC ";
                        $posts_run = mysqli_query($conn, $posts);

                        if (mysqli_num_rows($posts_run) > 0) {
                            
                            foreach ($posts_run as $postItems) {

                                ?>
                        <!-- <a href="<?= base_url('posts/'.$postItems['slug']); ?>" class="text-decoration-none"> -->
                            <li class="carta">
                                <?php

                                    if($postItems['image'] != null):
                                                    
                                        ?>  
                                            <img src="data:image/jpeg;base64,<?= base64_encode($postItems['image']); ?>" alt="<?=$postItems['name'];?>" style="width:100%">
                                            <!-- <img src="<?= base_url('uploads/posts/'.$postItems['image']);?>" alt="<?=$postItems['name'];?>"> -->
                                <?php endif; ?>
                                            
                                <h3><?=$postItems['name'];?></h3>
                                <p>
                                     <?=$postItems['meta_description'];?><br/><p>
                                     <div>
                                        <label class="text-dark me-3"><?= date('d-M-Y', strtotime($postItems['created'])); ?> </label>
                                        
                                    </div>
                                    <br>
                                    <a href="<?= base_url('posts/'.$postItems['slug']); ?>" class="btn btn-primary">Ver noticia</a>
                                </p>
                            </li>
                        <!-- </a> -->
                                <?php



                            }

                        } else{

                            ?>
                                <h4>Posts no disponible</h4>
                            <?php

                        }

                    } else {
                        
                        ?>
                            <h4>No se encontró la categoria</h4>
                        <?php
   
                    }

                } else {
                    ?>
                        <h4>No se encontró la URL</h4>
                    <?php
                }

            ?>
            </div>
    </section>

<?php

    include('includes/footer.php');
?>