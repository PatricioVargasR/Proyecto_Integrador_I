    <?php

        include('authentication.php');  
        include('middleware/superadminAuth.php');

                
        if(isset($_POST['visit_delete'])){

            $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'test';

            
            $new = mysqli_connect("$server", "$username", "$password", "$database");

            if (!$new) {
                
                header('Location: ../errors/dberror.php');
                die();
            }

            $id_visitante = $_POST['visit_delete'];

            $query4 = "DELETE FROM reservas WHERE id_reserva='$id_visitante'";
            $query_run4 = mysqli_query($new, $query4);

            if( $query_run4){
            
                $_SESSION['message'] = "Se ha borrado con exito";
                header('Location: view-visitas.php');
                exit(0);

            } else {

                $_SESSION['message'] = "Algo a salido mal";
                header('Location: view-visitas.php');
                exit(0);

            }
        }

        
    if(isset($_POST['send_email'])){

        $asunto = filter_var($_POST['asunto'], FILTER_SANITIZE_STRING);
        $descripcion = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    
        if (!empty($asunto) && !empty($descripcion)) {
            
            $destinos = array();
    
            $query = "SELECT email FROM email"; // Solo seleccionamos la columna 'email'
            $query_run = mysqli_query($conn, $query);
    
            if(mysqli_num_rows($query_run) > 0){
    
                while ($row = mysqli_fetch_assoc($query_run)) {
                    $destinos[] = $row["email"];
                }
    
                $nombre = 'Administración de Museos';
                
                $cuerpo = '
                <html>
                    <head>
                        <title>Prueba de correo</title>
                    </head>
                    <body>
                        <p>'.$descripcion.'</p>
                        <h4>Email de '.$nombre.'</h4>
                    </body>
                </html>
                ';
        
                //Envío en formato HTML
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n"; // Corregido charset
                $headers .= "From: $nombre <noreply@example.com>\r\n"; // Cambia la dirección de remitente
                $destino = implode(', ', $destinos); // Convierte el array de destinos en una cadena
                
                mail($destino, $asunto, $cuerpo, $headers);
    
                $_SESSION['message'] = "Se ha enviado con éxito";
                header('Location: index.php');
                exit();
    
            } else {
                $_SESSION['message'] = "No se encontraron datos";
                header('Location: index.php');
                exit();
            }
    
        } else {
            $_SESSION['message'] = "Faltan datos";
            header('Location: view-email.php');
            exit();
        }
    

    }

    if(isset($_POST['update_user_block'])){

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname =  mysqli_real_escape_string($conn, $_POST['lname']);

        $email =  mysqli_real_escape_string($conn, $_POST['email']);

        $password =  mysqli_real_escape_string($conn, $_POST['password']);

        // $password = md5($password);

        $role =  mysqli_real_escape_string($conn, $_POST['role']);
        $status =  mysqli_real_escape_string($conn, $_POST['status'] == true ? '1':'0');

        $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', role='$role', status='$status'
                    WHERE id='$user_id'";
        
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            
            $_SESSION['message'] = "Actualizado con exito";
            header('Location: view-block.php');
            exit(0);


        } else {

            $_SESSION['message'] = "Algo a salido mal";
            header('Location: view-block.php');
            exit(0);

        }

    }

    if(isset($_POST['user_delete_block'])){


        $user_id = $_POST['user_delete_block'];

        $query = "DELETE FROM users WHERE id='$user_id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
        
            $_SESSION['message'] = "Se ha borrado con exito";
            header('Location: view-block.php');
            exit(0);

        } else {

            $_SESSION['message'] = "Algo a salido mal";
            header('Location: view-block.php');
            exit(0);

        }
    }

        
        if(isset($_POST['user_delete'])){


            $user_id = $_POST['user_delete'];

            $query = "DELETE FROM users WHERE id='$user_id'";
            $query_run = mysqli_query($conn, $query);

            if($query_run){
            
                $_SESSION['message'] = "Se ha borrado con exito";
                header('Location: view-register.php');
                exit(0);

            } else {

                $_SESSION['message'] = "Algo a salido mal";
                header('Location: view-register.php');
                exit(0);

            }
        }


        if(isset($_POST['add_user'])){

            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);

            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = md5($password);

            $role = mysqli_real_escape_string($conn, $_POST['role']);
            $status = mysqli_real_escape_string($conn, $_POST['status'] == true ? '1':'0');

            $query = "INSERT INTO users(fname,lname,email,password,role,status) VALUES 
                    ('$fname', '$lname', '$email', '$password', '$role', '$status')";

            $query_run = mysqli_query($conn, $query);

            if($query_run){
            
                $_SESSION['message'] = "Nuevo usuario agregado con exito";
                header('Location: view-register.php');
                exit(0);

            } else {

                $_SESSION['message'] = "Algo a salido mal";
                header('Location: view-register.php');
                exit(0);

            }

        }

        if(isset($_POST['update_user'])){

            $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            $lname =  mysqli_real_escape_string($conn, $_POST['lname']);

            $email =  mysqli_real_escape_string($conn, $_POST['email']);

            $old_password = mysqli_real_escape_string($conn, $_POST['password']);

            $password =  mysqli_real_escape_string($conn, $_POST['password']);

            // $password = md5($password);

            $role =  mysqli_real_escape_string($conn, $_POST['role']);
            $status =  mysqli_real_escape_string($conn, $_POST['status'] == true ? '1':'0');


            $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', role='$role', status='$status'
                        WHERE id='$user_id'";
            
            $query_run = mysqli_query($conn, $query);

            if($query_run){
                
                $_SESSION['message'] = "Actualizado con exito";
                header('Location: view-register.php');
                exit(0);


            }

        }




    ?>