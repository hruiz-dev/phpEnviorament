
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

// Verificar si la tabla existe
$sql = "SHOW TABLES LIKE 'Prueba'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
  // La tabla no existe, crearla
  $sql = "CREATE TABLE Prueba (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(30) NOT NULL,
  email VARCHAR(50)
  )";

  if ($conn->query($sql) === TRUE) {
    echo "Tabla Prueba creada correctamente";
  } else {
    echo "Error creando la tabla: " . $conn->error;
  }
} else {
  echo "La tabla Prueba ya existe";
}

$conn->close();
?>


<!-- Formulario HTML para insertar nuevos datos -->
<form action="tabla.php" method="post">
Nombre: <input type="text" name="nombre"><br>
Email: <input type="text" name="email"><br>
<input type="submit">
</form>
