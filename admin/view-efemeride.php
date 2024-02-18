<?php

    include('authentication.php');
    include('includes/header.php');

?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('message.php') ?>

            <div class="card">
                <div class="card-header">
                    <h4> Ver efemeride
                        <a href="efemeride-add.php" class="btn btn-primary float-end">Agregar </a>
                    </h4>
                    
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>

                        </thead>
                        <tbody>
                        <!-- Extraemos los datos de la base de datos  -->
                            <?php

                                // $posts = "SELECT * FROM posts WHERE status != '2'"

                                $efemeride = "SELECT * FROM efemeride WHERE status != '2'";
                                $efemeride_run = mysqli_query($conn, $efemeride);

                                if (mysqli_num_rows($efemeride_run) > 0) {
                                    
                                    foreach($efemeride_run as $efemerides){
                                        ?>  

                                            <tr>
                                                <td><?= $efemerides['id']; ?></td>
                                                <td><?= $efemerides['name']; ?></td>
                                                <td><?= $efemerides['date']; ?></td>
                                                <td>
                                                        

                                                        <?= $efemerides['status'] == '1' ? 'Hidden':'Visible';
                                                        // if($item['status'] == '1') { echo 'Hidden'; } else { echo 'Visible'; }
                                                    ?>


                                                </td>
                                                <td><a href="efemeride-edit.php?id=<?= $efemerides['id']; ?>" class="btn btn-success">Editar</a></td>
                                                <td>

                                                    <form action="code.php" method="POST">
                                                        <button type="submit" name="efemeride_delete_btn" value="<?=$efemerides['id'];?>" class="btn btn-danger">Eliminar</button>
                                                    </form>
                                                    
                                                </td>
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


<?php

    include('includes/footer.php');
    include('includes/scripts.php');

?>
