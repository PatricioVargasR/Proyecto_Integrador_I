<?php


$server = "localhost";
$username = "root";
$password = "";
$database = "test";
  
$conn = mysqli_connect("$server", "$username", "$password", "$database");

if(!$conn){
    echo 'Ha ocurrido un error';
}

if (isset($_POST['reservar'])) {

    $fecha = date('Y-m-d', strtotime($_POST['date'])); 
    $hora = $_POST['hora'];

    $validacion_query = "SELECT * FROM reservas WHERE fecha_seleccionada = '$fecha' AND hora_visita = '$hora'";
    $validacion_result = mysqli_query($conn, $validacion_query);
    
    if (mysqli_num_rows($validacion_result) > 0) {
        echo 'Ya existe una reserva en esa fecha y hora.';
        exit;
    }

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $cantidad_acompanantes = $_POST['cantidad_acompanantes'];
    $telefono = $_POST['telefono'];
    $acompanante = $_POST['acompanante'];

    if($acompanante == TRUE){

        $nombre_institucion = $_POST['nombre_institucion'];
        $genero_acompanante_femenino = $_POST['genero_acompanante_femenino'];
        $genero_acompanante_masculino =$_POST['genero_acompanante_masculino'];
        $genero_acompanante_otro =$_POST['genero_acompanante_otro'];
        $rango_edad =$_POST['rango_edad'];

        $visitantes_query = "INSERT INTO visitantes (nombres, apellidos, pais, ciudad, edad, genero, telefono) VALUES ('$nombres', '$apellidos', '$pais', '$ciudad', '$edad', '$genero', '$telefono')";
        $visitantes_run = mysqli_query($conn, $visitantes_query);


        $id_visitante = mysqli_insert_id($conn);

        if($visitantes_query){

           
            $reservas_query = "INSERT INTO reservas (fecha_seleccionada, hora_visita, id_visitante) VALUES ('$fecha', '$hora', '$id_visitante')";
            $reservas_run = mysqli_query($conn, $reservas_query);

            if(!$reservas_run){
                echo 'Ocurrió un error';
            } else {


            $acompanantes_query = "INSERT INTO acompanantes (id_visitante, genero_acompanante_femenino, genero_acompanante_masculino, genero_acompanante_otro, rango_edad) VALUES ('$id_visitante', '$genero_acompanante_femenino', '$genero_acompanante_masculino', '$genero_acompanante_otro', '$rango_edad')";
            $acompanantes_run = mysqli_query($conn, $acompanantes_query);

                if(!$acompanantes_run){

                    echo 'Ocurrió un error Acompañantes';

                } else {

                    $institucion_query = "INSERT INTO instituciones (nombre_institucion, id_visitante) VALUES ('$nombre_institucion','$id_visitante')";
                    $institucion_run = mysqli_query($conn, $institucion_query);
                    
                    if(!$institucion_run){
                        echo 'Ocurrió un error Instituciones';
                    } else {
                        echo 'Se ha insertado todos los datos';
                    }

                }

            }
        
        } else {
            echo 'Ocurrió un error al ingresar el visitante';
        }

    } else {

        $visitantes_query = "INSERT INTO visitantes (nombres, apellidos, pais, ciudad, edad, genero, telefono) VALUES ('$nombres', '$apellidos', '$pais', '$ciudad', '$edad', '$genero', '$telefono')";
        $visitantes_run = mysqli_query($conn, $visitantes_query);


        $id_visitante = mysqli_insert_id($conn);

        if($visitantes_query){

                        
            $reservas_query = "INSERT INTO reservas (fecha_seleccionada, hora_visita, id_visitante) VALUES ('$fecha', '$hora', '$id_visitante')";
            $reservas_run = mysqli_query($conn, $reservas_query);

            if(!$reservas_run){
                echo 'Ocurrió un error Reservas';
            } else {

                echo 'Se ingresó correctamente';
            }


            // $acompanantes_query = "INSERT INTO acompanantes (id_visitante, genero_acompanante_masculino, genero_acompanante_femenino, genero_acompanante_otro, rango_edad) VALUES ('$id', '$genero_acompanante_masculino', '$genero_acompanante_femenino', '$genero_acompanante_otro', '$rango_edad')";
            // $acompanantes_run = mysqli_query($conn, $acompanantes_query);

            //     if(!$acompanantes_run){

            //         echo 'Ocurrió un error';

            //     } else {
            //             echo 'Se ha insertado todos los datos';

            //     }

            // }

        } else {
            echo 'Ocurrió un error al ingresar el visitante';
        }

        


    }
}



?>
