<?php

    if($_SESSION['auth_role'] != "2"){ 
        $_SESSION['message'] = "No estás autorizado para esto'";
        header('Location: index.php');
        exit(0);
    }

?>