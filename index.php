

<?php
    
    include('includes/config.php');


    $page_title = "Página de Inicio";
    $meta_description = "Página de inicio del museo del santo";
    $meta_keywords = "El santo, Museo del santo";

    include('includes/navbar.php');
    
    include('includes/header.php');
?>

<style>

    .paginainicio{
        background-image: url("assets/img/65054.jpg"); 
    }   

    .carta p{
        text-align: justify;
        
    }


</style>

<section class="paginainicio" id="inicio">
        <div class="contenido">
            <div class="texto" style="text-align:center">
                <h1>Museo del Santo</h1>
                <p>
                ¿Eres amante de las luchas? Entonces no dejes de visitar el Museo de El Santo, El Enmascarado de Plata. ¿Ya sabes dónde está? 
                </p>
            </div>
            <a href="<?= base_url('recorrido.html'); ?>">Recorrido Virtual</a>
        </div>
    </section>

    <section class="portafolio">
        <h3>No se lo puede perder</h3>
        <div class="underline"></div>
        <!-- <p>
            Explra nuestras maravillosas opciones de servicios.
        </p> -->
        <ul class="cartas">
            <li class="carta">
                <img src="<?= base_url('uploads/posts/Ferrocarril.jpg') ?>" alt="img">
                <h3>Museo del Ferrocarril</h3>
                <p>A través de exposiciones interactivas, maquetas a escala, fotografías históricas y una variedad de artefactos, los visitantes pueden explorar cómo los ferrocarriles han sido vitales para la conectividad global, el transporte de mercancías y el avance de la sociedad. </p>
            </li>
            <li class="carta">
                <img src="uploads/posts/Datos.jpg" alt="img">
                <h3>Museo de Datos Historicos</h3>
                <p>A través de exhibiciones interactivas, visualizaciones cautivadoras y narrativas enriquecedoras, los visitantes tienen la oportunidad de sumergirse en el pasado a través de datos cuantitativos y cualitativos.  </p>
            </li>
            <li class="carta">
                <img src="uploads/posts/Cineteca.jpg" alt="img">
                <h3>Cineteca</h3>
                <p>La cineteca es un espacio dedicado al arte y la cultura cinematográfica. En este lugar, los amantes del cine pueden explorar una amplia variedad de películas que abarcan diferentes géneros, épocas y culturas. </p>
            </li>
        </ul>
    </section>

    <section class="portafolio">
        <h3>Noticias</h3>
        <div class="underline"></div>
        <!-- <p>
            Toma una vista de algo de nuestras memorables obras
        </p> -->
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
                                            <!-- <img src="<?= base_url('uploads/posts/'.$postItem['image']);?>" alt="<?=$postItem['name'];?>" style="width:100%"> -->
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

    
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
        <div class="card">

        <?php

            $query = "SELECT * FROM curiosity WHERE status='0' LIMIT 1";
            $query_run = mysqli_query($conn, $query);

            if(mysqli_num_rows($query_run) > 0){

                foreach ($query_run as $curiosity ) {
                    
                    ?>

                        <div class="card-header">
                            <h5>¿Sabías que?</h5>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <p><?= $curiosity['description']; ?></p>
                            <!-- <p class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></p> -->
                            </blockquote>
                        </div>
                    <?php

                }
            }


        ?>


    </div>
    <br><br><br>
        </div>
    </div>
</div>

<?php

    include('includes/footer.php');
?>