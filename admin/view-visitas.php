<?php

    include('authentication.php');
    include('middleware/superadminAuth.php');#SuperAdministrador
    include('includes/header.php');


?>

<div class="container-fluid px-4">
        <h4 class="mt-4">Usuario</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Menú de Administración</li>
            <li class="breadcrumb-item">Usuarios</li>
        </ol>

        <div class="row">
            <div class="col-md-12">
                <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4> Visitas                               
                            <!-- <a href="register-add.php" class="btn btn-primary float-end"></a> -->
                        </h4>       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">  
                            <table class="table table-sm">

                            <thead>
                                    <th>Identificador</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellidos</th>
                                    <th>Hora de Visita</th>
                                    <th>Fecha de Visita</th>
                                    <th>Institución</th>
                                    <!-- <th>Suspender</th> -->
                                    <th>Cancelar</th>
                                </thead>

                                <tbody>

                                <?php
                                    $server = 'localhost';
                                    $username = 'root';
                                    $password = '';
                                    $database = 'test';

                                    
                                    $new = mysqli_connect("$server", "$username", "$password", "$database");

                                    if (!$new) {
                                        
                                        header('Location: ../errors/dberror.php');
                                        die();
                                    }

                                    $query = "SELECT * FROM totales";
                                    $query_run = mysqli_query($new, $query);

                                    if(mysqli_num_rows($query_run) > 0){

                                    foreach ($query_run as $visit) {
                                        ?>
                                        
                                            <tr>
                                                <td><?= $visit['id_reserva']; ?></td>
                                                <td><?= $visit['nombre_visitante']; ?></td>
                                                <td><?= $visit['apellido_visitante']; ?></td>
                                                <td><?= $visit['hora_visita']; ?></td>
                                                <td><?= $visit['fecha_seleccionada'];?></td>
                                                <td><?= $visit['nombre_institucion'];?></td>

                                                <td>

                                                    <form action="codesuperadmin.php" method="POST">

                                                        <button type="submit" name="visit_delete" value="<?=$visit['id_reserva'];?>" onclick='return confirmacion()' class="btn btn-danger">Eliminar</button>

                                                    </form>
                                                
                                                </td>

                                            </tr>

                                        <?php
                                    }
                                        # code...
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="6">Información no encontrada</td>
                                        </tr>
                                    <?php

                                    }


                                ?>
                           


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

function confirmacion(){
    var respuesta = confirm("¿Desea realmetne borrar el registro?");
    if(respuesta==true){
        return true;
    } else {
        return false;
    }
}

</script>

<?php

include('includes/footer.php');
include('includes/scripts.php');

?>
