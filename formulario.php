<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <title>Práctica 5. Formulario PHP</title>
</head>

<body>
<?php
if ($_POST) {
  $nombre= $_POST['nombre'];
  $apellido= $_POST['apellido'];
  $email= $_POST['email'];

  //Conexion con PDO

  $servername= "localhost";
  $username= "root";
  $password="";
  $dbname="lab_sql";

  //Create connection

  $conn = new mysqli($servername, $username, $password, $dbname);

  //Check connection

  if ($conn->connect_error) {
    die("Conexión fallida:" . $conn->connect_error);
  }

  $sql = "INSERT INTO usuario (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email' )";

  if ($conn->query($sql) === true) {
    echo '<h1> Nuevo registro creado correctamente</h1> <br/>';
  } else {
    echo '<h1>No se ha podido realizar el registro</h1> <br/>';
  }
  echo '<div>
          <a class="button" href="/Lab_PHP/index.html">Volver a Inicio</a>
        </div>';

  $conn->close();

}

?>
</body>

</html>