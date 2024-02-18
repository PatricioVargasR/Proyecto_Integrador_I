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
                    <h4> Ver Post
                        <a href="post-add.php" class="btn btn-primary float-end">Nueva Publicación</a>
                    </h4>
                    
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>

                        </thead>
                        <tbody>
                        <!-- Extraemos los datos de la base de datos  -->
                            <?php

                                // $posts = "SELECT * FROM posts WHERE status != '2'"

                                $posts = "SELECT p.*, c.name AS cname FROM posts p, categories c WHERE c.id = p.category_id AND p.status != '2'";
                                $posts_run = mysqli_query($conn, $posts);

                                if (mysqli_num_rows($posts_run) > 0) {
                                    
                                    foreach($posts_run as $post){
                                        ?>  

                                            <tr>
                                                <td><?= $post['id']; ?></td>
                                                <td><?= $post['name']; ?></td>
                                                <td><?= $post['cname']; ?></td>
                                                <td> <img src="data:image/jpeg;base64,<?= base64_encode($post['image']); ?>" alt="<?=$postItem['name'];?>" width="60px" height="60px"></td>
                                                <!-- <td><img src="../uploads/posts/<?= $post['image']; ?>" width="60px" height="60px" alt="" /></td> -->
                                                <td>
                                                        

                                                        <?= $post['status'] == '1' ? 'Hidden':'Visible';
                                                        // if($item['status'] == '1') { echo 'Hidden'; } else { echo 'Visible'; }
                                                    ?>


                                                </td>
                                                <td><a href="post-edit.php?id=<?= $post['id']; ?>" class="btn btn-success">Editar</a></td>
                                                <td>

                                                    <form action="code.php" method="POST">
                                                        <button type="submit" name="post_delete_btn" value="<?=$post['id'];?>" class="btn btn-danger">Eliminar</button>
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
