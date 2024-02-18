<?php

    include('includes/config.php');


    $page_title = "Página de Login";
    $meta_description = "Página de login del museo del santo";
    $meta_keywords = "El santo, Tulancingo, Hidalgo, Cultura";

    include('includes/header.php');

    if(isset($_SESSION['auth'])){


        if(!isset($_SESSION['message'])){

            $_SESSION['message'] = "Actualmente ya has iniciado sesión";
        }             

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
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Correo Electronico</label>
                                <input type="email" name="email" placeholder="Enter Email Address" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Contraseña</label>
                                <input type="password" name="password" id="password" placeholder="Enter Email Address" class="form-control" required>
                                
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-danger" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>

                                <hr>
                                <center><button type="submit" name="login_btn" class="btn btn-primary">Iniciar Sesión</button></center>
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
</script>

<?php

    include('includes/footer.php');
?>