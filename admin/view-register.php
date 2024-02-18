    <?php

        include('authentication.php');
        include('middleware/superadminAuth.php'); # SuperAdministrador
        include('includes/header.php');

        $user_id_to_exclude = $_SESSION['auth_user']['user_id'];

        // echo $user_id_to_exclude;
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
                        <h4> Usuarios Registrados                               
                            <a href="register-add.php" class="btn btn-primary float-end">Nuevo Usuario</a>
                        </h4>       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">  
                            <table class="table table-sm">

                                <thead>
                                    <th>Identificador</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellidos</th>
                                    <th>Correo Electronico</th>
                                    <th>Función</th>
                                    <th>Editar</th>
                                    <!-- <th>Suspender</th> -->
                                    <th>Eliminar</th>
                                </thead>

                                <tbody>
                                    <?php   


                                        # $query = "SELECT * FROM users WHERE status != '1' AND id != '$user_id'";
                                        $query = "SELECT * FROM users WHERE status != '1'";
                                        $query_run = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            
                                            foreach($query_run as $row){
                                                ?>  

                                                    <tr>
                                                        <td><?= $row['id']; ?></td>
                                                        <td><?= $row['fname']; ?></td>
                                                        <td><?= $row['lname']; ?></td>
                                                        <td><?= $row['email']; ?></td>
                                                        <td>
                                                            <?php
                                                                
                                                                if($row['role'] == "1"){
                                                                    echo 'Administrador';
                                                                } elseif($row['role'] == "0"){
                                                                    echo 'Usuario';
                                                                } else{
                                                                    echo 'Super Administrador';
                                                                }

                                                            ?>
                                                        </td>
                                                        <?php if($row['id'] != $user_id_to_exclude): ?>
                                                        <td><a href="register-edit.php?id=<?= $row['id']; ?>" class="btn btn-success">Editar</a></td>
                                                        <!-- <td>
                                                            <form action="code.php" method="POST">

                                                                <button type="submit" name="user_suspend" value="<?=$row['id'];?>" class="btn btn-danger">Suspender</button>

                                                            </form>
                                                        </td> -->
                                                        <td>

                                                            <form action="codesuperadmin.php" method="POST">

                                                                <button type="submit" name="user_delete" value="<?=$row['id'];?>" onclick='return confirmacion()' class="btn btn-danger">Eliminar</button>

                                                            </form>
                                                            
                                                        </td>
                                                        <?php endif; ?>
                                                    </tr>

                                                <?php
                                            }

                                        
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

    <!--
        Script de confirmación para eliminar registro
    -->

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
