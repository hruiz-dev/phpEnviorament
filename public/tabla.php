<?php
$servername = "mysql";
$username = "webapp";
$password = "root";
$dbname = "webapp";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("La conexión ha fallado: " . $conn->connect_error);
}

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];

// Insertar los datos en la tabla
$sql = "INSERT INTO Prueba (nombre, email) VALUES ('$nombre', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "Nuevo registro creado con éxito";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
