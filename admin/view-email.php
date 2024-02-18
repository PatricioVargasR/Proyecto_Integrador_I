<?php

    include('authentication.php');
    include('middleware/superadminAuth.php'); # SuperAdministrador
    include('includes/header.php');


?>

<div class="container-fluid px-4">
    <h4 class="mt-4">Correo de Anuncios</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Menú de Administración</li>
        <li class="breadcrumb-item">Correo</li>      
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5>Correo</h5>
                </div>
                <div class="card-body">
                    <label class="text-dark me-2">Edita el contenido para enviar un mensaje</label>
                    <hr/>
                    <form action="codesuperadmin.php" method="POST">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="">Asunto</label>
                                <input type="text" name="asunto" id="asunto" class="form-control" required>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="">Descripción</label>
                                <textarea name="description" id="summernote" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="send_email"class="btn btn-primary">Enviar a todos los correos</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php

    include('includes/footer.php');
    include('includes/scripts.php');

?>