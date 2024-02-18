<?php

 $servername = "localhost";
 $user = "root";
 $password = "";
 $database = "prueba";

 $conn = mysqli_connect("$server", "$username", "$password", "$database");

 if (!$conn) {
     
     header('Location: ../errors/dberror.php');
     die();
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$query = "SELECT * FROM categories LIMIT 2";
$query_run = mysqli_query($conn, $query);

if(mysqli_num_rows($query_run) > 0){

    foreach($query_run as $item){

        
    ?>

        <h4><?= $item['name']; ?></h4>

    <?php


    }

}

?>
    
</body>
</html>