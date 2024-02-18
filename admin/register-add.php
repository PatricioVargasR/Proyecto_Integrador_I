<?php

    include('authentication.php');
    include('middleware/superadminAuth.php'); # SuperAdministrador
    include('includes/header.php');

?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> Agregar Usuarios
                        <a href="view-register.php" class="btn btn-danger float-end">Regresar</a>
                    </h4>
                    
                </div>
                <div class="card-body">
                    <form action="codesuperadmin.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Nombre(s)</label>
                                <input type="text" name="fname" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Apellidos</label>
                                <input type="text" name="lname" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Dirección de Correo Electronico</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Contraseña</label>
                                <input type="password" name="password"  id="password" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="">--Selecciona un Rol--</option>
                                    <option value="2">SuperAdministrador</option>
                                    <option value="1">Administrador</option>
                                    <option value="0">Usuario | Exclusivo para pruebas |</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Estado</label>
                                <!-- <input type="checkbox" name="status" width="70px" height="70px" /> -->
                                <input type="checkbox" name="status" class="form-check-input">
                            </div>

                            <div class="col-md-12 mb-3">
                                <button class="btn btn-danger" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
                                <button type="submit" name="add_user"class="btn btn-primary">Agregar Usuario</button>
                            </div>
                            
                        </div>
                    </form>
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
