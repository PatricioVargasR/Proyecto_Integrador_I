<?php

    include('includes/config.php');

    $page_title = "Página de Registro";
    $meta_description = "Página de registro del museo del santo";
    $meta_keywords = "El santo, Tulancingo, Hidalgo, Cultura";

    include('includes/header.php');

    if(isset($_SESSION['auth'])){

        $_SESSION['message'] = "Actualmente ya has iniciado sesión";
        header("Location: index.php");
        exit(0);

    }

    include('includes/navbar.php');
?>


<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5"> 

                <?php include('message.php'); ?>


                <div class="card">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">

                    <form action="registercode.php" method="POST">
                        
                        <div class="form-group mb-3">
                            <label for="">Nombre(s)</label>
                            <input type="text" name="fname" placeholder="Ingresa tu primer nombre" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Apellidos</label>
                            <input type="text"  name="lname" placeholder="Ingresa tu segundo nombre" class="form-control" >
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Correo Electronico</label>
                            <input type="email" name="email" placeholder="Ingresa tu correo electronico" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Contraseña</label>
                            <input type="password" name="password" id="password"placeholder="Ingresa tu contraseña" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Confirma tu contraseña</label>
                            <input type="password" name="cpassword" id="cpassword"placeholder="Confirma tu contraseña" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                                <button class="btn btn-danger" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
                                <button class="btn btn-danger" type="button" onclick="mostrarContrasena2()">Mostrar confirmar</button>
                                <hr>
                            <button type="submit" name="register_btn" class="btn btn-primary">Enviar</button>
                        </div>
                        
                    </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
        function mostrarContrasena(){
            var tipo = document.getElementById("password");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }

        function mostrarContrasena2(){
            var tipo = document.getElementById("cpassword");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }

</script>


<?php

    include('includes/footer.php');
?>