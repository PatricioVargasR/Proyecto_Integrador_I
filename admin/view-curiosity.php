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
                    <h4> Ver Dato Curioso
                    </h4>
                    
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Editar</th>

                        </thead>
                        <tbody>
                        <!-- Extraemos los datos de la base de datos  -->
                            <?php

                                // $posts = "SELECT * FROM posts WHERE status != '2'"

                                $curiosity = "SELECT * FROM curiosity WHERE status != '2'";
                                $curiosity_run = mysqli_query($conn, $curiosity);

                                if (mysqli_num_rows($curiosity_run) > 0) {
                                    
                                    foreach($curiosity_run as $curiosity){
                                        ?>  

                                            <tr>
                                                <td><?= $curiosity['id']; ?></td>
                                                <td><?= $curiosity['description']; ?></td>
                                               
                                                <td>
                                                        

                                                        <?= $curiosity['status'] == '1' ? 'Hidden':'Visible';
                                                        // if($item['status'] == '1') { echo 'Hidden'; } else { echo 'Visible'; }
                                                    ?>


                                                </td>
                                                <td><a href="curiosity-edit.php?id=<?= $curiosity['id']; ?>" class="btn btn-success">Editar</a></td>
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
