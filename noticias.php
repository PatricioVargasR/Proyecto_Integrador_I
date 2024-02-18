<?php

    include('includes/config.php');

    
    $page_title = "Página de Noticias";
    $meta_description = "Página de noticias del museo del santo";
    $meta_keywords = "El santo, Museo del santo";

    include('includes/navbar.php');
    include('includes/header.php');

?>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white" >Categorias</h3>
                <div class="underline"></div>
            </div>
        

            <?php 
                $homeCategory = "SELECT * FROM categories WHERE navbar_status = '0' AND status = '0' LIMIT 12";
                $homeCategory_run = mysqli_query($conn, $homeCategory);

                if(mysqli_num_rows($homeCategory_run) > 0){

                    foreach ($homeCategory_run as $cateItem) {
                        
                        ?>  
                        <div class="col-md-3 mb-4">
                            <a href="<?= base_url('category/'.$cateItem['slug']); ?>" class="text-decoration-none">
                                <div class="card card-body">
                                    <?= $cateItem['name']; ?>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }

            ?>
        </div>
    </div>
</div>

<div class="py-5 b-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9" style="font-size:18px; text-align: justify;">
                <h3 class="text-dark">El museo del santo</h3>
                <div class="underline"></div>
                <p>¡Bienvenido Visitante!</p>
                <p>Te presentamos la página dedicada a las noticias que suceden en nuestra región, sin olvidarnos de lo que trata nuestro sitio, el querido Museo Del Santo, así que siente libre en buscar en las distintas categorías de información.</p>
                <p>Ocalsionalmente se públican Eventos en esta sección, es fácil de indetificarlos por como los nombramos, así que hay que estar muy atento para que puedas venir a visitarnos.</p>
                <p>En esta página podrás conocer la mayoría de cosas que suele pasar cerca de aquí.</p>

                <!-- <img src="uploads/posts/Noticia.jpg"  class="rounded float-end" style="height:400px; width: 835px"alt=""> -->
            </div>
 
                <?php

                    $homeEfe = "SELECT * FROM efemeride WHERE status='0' ORDER BY id DESC LIMIT 1";
                    $homeEfe_run = mysqli_query($conn, $homeEfe);


                    if(mysqli_num_rows($homeEfe_run) > 0){

                        foreach ($homeEfe_run as $efemerideItem) {
                            
                            ?>
                                <div class="col-md-3">
                                    <div class="card">

                                        <div class="card-header">
                                            <h3>Efemeride de la fecha:<?= $efemerideItem['name'] ?></h3>(<?= date('d-M-Y', strtotime($efemerideItem['date'])); ?>)
                                        </div>
                                        <div class="card-body">
                                            <?= $efemerideItem['description'] ?>
                                            <h6>Publicada: <label class="text-dark me-2"><?= date('d-M-Y', strtotime($efemerideItem['created'])); ?> </label></h6>
                                        </div>
                                    </div>
                                </div>

                            <?php
                        }
                    }

                ?>

        </div>
    </div>
</div>

<section class="portafolio">
        <h2>Noticias</h2>
        <p>
            Te presentamos las últimas noticias públicadas
        </p>
        <ul class="cartas">
        <?php
            $homePosts = "SELECT * FROM posts WHERE status='0' ORDER BY id DESC LIMIT 3";
            $homePosts_run = mysqli_query($conn, $homePosts);

            if(mysqli_num_rows($homePosts_run) > 0){

                foreach ($homePosts_run as $postItem) {
                    
                    ?>

                            <li class="carta">
                                <?php

                                    if($postItem['image'] != null):
                                                    
                                        ?>
                                            <img src="data:image/jpeg;base64,<?= base64_encode($postItem['image']); ?>" alt="<?=$postItem['name'];?>" style="width:100%">
                                            <!-- <img src="<?= base_url('uploads/posts/'.$postItem['image']);?>" alt="<?=$postItem['name'];?>"> -->
                                <?php endif; ?>
                                            
                                <h3><?=$postItem['name'];?></h3>
                                <p>
                                     <?=$postItem['meta_description'];?><br/><p>
                                     <a href="<?= base_url('posts/'.$postItem['slug']); ?>" class="btn btn-primary">Leer más</a>
                                </p>
                            </li>
                    <?php

                }
            }
        ?>

    </section>


<?php

    include('includes/footer.php')


?>