<?php

    include('authentication.php');
    include('middleware/superadminAuth.php'); # SuperAdministrador
    include('includes/header.php');

?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Usuario</h4>
    <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item active">Dashboard</li>
         <li class="breadcrumb-item">User</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Editar Usuarios
                    <a href="view-register.php" class="btn btn-danger float-end">Regresar</a>
                 </h4>
                    
                </div>
                <div class="card-body">

                    <?php 

                    if(isset($_GET['id'])){

                        $user_id = $_GET['id'];

                        $users = "SELECT * FROM users WHERE id= '$user_id'";
                        $users_run = mysqli_query($conn, $users);

                        if(mysqli_num_rows($users_run) > 0){

                            foreach($users_run as $users){

                                ?>
                                    <form action="codesuperadmin.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $users['id']; ?>">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="">Nombre(s)</label>
                                                <input type="text" name="fname" value="<?= $users['fname']; ?>" class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Apellidos</label>
                                                <input type="text" name="lname" value="<?= $users['lname']; ?>"  class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Dirección de Correo Electronico</label>
                                                <input type="email" name="email" value="<?= $users['email']; ?>"  class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Contraseña</label>
                                                <!-- <input type="hidde" name="old_password" value="<?= $users['password'] ?>"> -->
                                                <input type="password" name="password" value="<?= $users['password'] ?>" id="password" class="form-control" required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Role</label>
                                                <select name="role" class="form-control" required>
                                                    <option value="">--Selecciona un Rol--</option>
                                                    <option value="2" <?= $users['role'] == '1' ? 'select' : ''?>>SuperAdministrador</option>
                                                    <option value="1" <?= $users['role'] == '1' ? 'select' : '' ?>>Administrador</option>
                                                    <option value="0"  <?= $users['role'] == '1' ? 'select' : '' ?>>Usuario | Exclusivo para pruebas |</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Estado</label>
                                                <!-- <input type="checkbox" name="status" width="70px" height="70px" /> -->
                                                <input type="checkbox" name="status" <?= $users['status'] == '1' ? 'checked' : '' ?> class="form-check-input">
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button class="btn btn-danger" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
                                                <button type="submit" name="update_user"class="btn btn-primary">Actualizar Usuario</button>
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
    include('includes/scripts.php');

?>
