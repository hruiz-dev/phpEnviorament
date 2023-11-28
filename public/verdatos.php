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

// Seleccionar todos los datos de la tabla
$sql = "SELECT id, nombre, email FROM Prueba";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Crear una tabla HTML para mostrar los datos
  echo "<table><tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";
  // Recorrer los resultados y añadirlos a la tabla
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nombre"]. "</td><td>" . $row["email"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No se encontraron resultados";
}

$conn->close();
?>
