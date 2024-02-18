

<?php
    
    include('includes/config.php');


    $page_title = "Página de Restaurantes";
    $meta_description = "Página de restaurantes del museo del santo";
    $meta_keywords = "El santo, Museo del santo";

    include('includes/navbar.php');
    
    include('includes/header.php');
?>
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="font-size:20px; text-align: justify;">
                <h3 class="text-dark" >Restaurentes</h3>
                <div class="underline"></div>
                Una de las cosas que distingue a Tulancingo es su gastronomía aquí te cuento sobre algunos Restarantes en Tulancingo que no te puedes perder si nos visitas, o si no tienes ganas de preparar comida en casa.
        </div>
        <br/><center><img src="<?= base_url('uploads/posts/Ejemplos2.jpg'); ?>" style="width: 700px" alt="Museo del Santo"></center>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="font-size:20px; text-align: justify">
                <h2>Restaurante Colonial Tulancingo</h2>
                <div class="underline"></div>
                    <p>Este restaurante es icónico en el pueblo. Abrió sus puertas en el año 1973 Esto se debe principalmente a que ofrece una oferta de platillos amplia, a un precio sin igual. Tiene tanta aceptación que hace algunos años abrieron una segunda sucursal. Ambas sucursales se encuentran muy cerca del jardín así es fácil llegar preguntándole a cualquier persona. Eso sí, a horas pico y días festivos probablemente tengas que hacer fila.</p>
                    <!-- <h2>Hoteles fuera del centro de Tulancingo</h2>
                    <div class="underline"></div> -->

                    <h2>Derhgo Tulancingo</h2>
                    <div class="underline"></div>

                    <p>Uno de nuestros favoritos es un pequeño pero decioso restaurante también cerca del centro de Tulancingo. Derhgo ofrece alimentos de amaranto, si como lo lees, prácticamente todos sus platillos llevan este nutritivo ingrediente. Todo en general está delicioso, así que decidir entre sus chilaquiles o las gorditas de amaranto con requeson será una tarea que probablemente tengas que dejar a la suerte.</p>

                    <h2>Terramar Tulancingo</h2>
                    <div class="underline"></div>

                    <p>Si te gustan los mariscos, Terramar es una opción que tienes que conocer. Cuenta con 2 sucursales a una calle del jardín la floresta. Así que si te gustan los mariscos esta es una buena opción para probar. </p>
                    
                    <h2>Restaurant Enrique’s</h2>
                    <div class="underline"></div>
                    <p>Otro de esos restaurantes icónicos de Tulancingo. El restaurante Enriques en Tulancingo. Te ofrece una carta amplia con platillos para todos los gustos, incluye platillos tradicionales como la deliciosa barbacoa estilo Tulancingo, entre otros platillos. Todo a un precio muy asequible.</p>

                    <h2>Che toro</h2>
                    <div class="underline"></div>
                    <p>Chetoro es un Restaurante en Tulancingo que ofrece una variedad esquisita de cortes para todos los gustos, este lugar se encuentra fuera del primer cuadro de la ciudad pero a no más de 5 minutos en auto. Si lo tuyo son las carnes esta es una opción para probar.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="cold-m2-12" style="font-size:20px; text-align: justify">
            <h2></h2>

            </div>
        </div>
    </div>
</div>
 -->

<?php

    include('includes/footer.php')


?>