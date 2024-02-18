<?php

    session_start();
    include('config/dbconn.php');

    
/*     $user_id_to_exclude = $_SESSION['auth_user']['user_id'];

    echo $user_id_to_exclude; */

    if(!isset($_SESSION['auth'])){

        $_SESSION['message'] = 'Necesitas una autenticación';
        header('Location: ../login.php');
        exit(0);

    } else {

        // if($_SESSION['auth_role'] != "1"){ 
            if($_SESSION['auth_role'] != '1' && $_SESSION['auth_role'] != '2'){
            $_SESSION['message'] = "No estás autorizado para esto'";
            header('Location: ../login.php');
            exit(0);
    
        }

    }

?>