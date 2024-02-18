<?php

    include('includes/config.php');

    if(isset($_POST['enviar'])){

        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $query = "INSERT INTO email (email) VALUES ('$email')";
        $query_run = mysqli_query($conn, $query);

        if($query_run){

            // $_SESSION['message'] = "Ha ocurrido algo";
            header('Location: index.php');
            exit(0);

        } else {

            // $_SESSION['message'] = "Ha ocurrido algo";
            header('Location: index.php');
            exit(0);
        }
    }
?>