<?php

session_start();
include('admin/config/dbconn.php');


 if (isset($_POST['login_btn'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $hashedPassword = md5($password); // Aplicar el hash MD5 a la contraseña ingresada

    // echo $hashedPassword;

    // $login_query = "SELECT * FROM users WHERE email='$email' AND password = MD5('$password') LIMIT 1";
    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$hashedPassword' AND status ='0' LIMIT 1";

    $login_query_run = mysqli_query($conn, $login_query);
    
    if(mysqli_num_rows($login_query_run) > 0 ){

        foreach ($login_query_run as $data) {
            
            $user_id = $data['id'];
            $user_name = $data['fname'] . ' ' . $data['lname'];
            $user_email = $data['email'];
            $role = $data['role'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role"; // 1=admin, 0=user, 2=SuperAdmin
        
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
        ];

        if($_SESSION['auth_role'] == "1"){ // 1 = Admin

            $_SESSION['message'] = "Bienvenido a tu dashboard";
            header('Location: admin/index.php');
            exit(0);

        } elseif($_SESSION['auth_role'] == "2"){ // 2 = SuperAdmin
            $_SESSION['message'] = "Bienvenido a tu dashboard";
            header('Location: admin/index.php');
            exit(0);

        } elseif($_SESSION['auth_role'] == "0"){ // 0 = user
            $_SESSION['message'] = "Iniciaste sesión";
            header('Location: index.php');
            exit(0);
        } else {

            $_SESSION['message'] = "Ya has iniciado sesión";
            header('Location: index.php');
            exit(0);

        }

    } else {
        $_SESSION['message'] = "No tienes acceso";
        header('Location: login.php');
        exit(0);
    }

} else {
    $_SESSION['message'] = "No tienes acceso";
    header('Location: login.php');
    exit(0);
}

?>