<?php

$host = "mysql";
$user = "root";
$pass = "root";
$db = "probak";

$mysqli = new mysqli($host, $user, $pass, $db);

$izenburua = $_POST['izenburua'];
$textua = $_POST['textua'];
$kategoria = $_POST['kategoria'];
$data = getdate();
$data = array($data['year'], $data['mon'], $data['mday']);
$data = date("Y-m-d");
// irudia gordetzeko direktoria sortzen
$karpeta = "./img/";
$irudiIzena = basename($_FILES['irudia']['name']);
$destino = $karpeta . $irudiIzena;

// Mover el archivo a la ruta de destino
move_uploaded_file($_FILES['irudia']['tmp_name'], $destino);

$sql = "INSERT INTO `albisteak` (`id`, `izenburua`, `textua`, `kategoria`, `data`, `irudia`) VALUES (NULL, '$izenburua', '$textua', '$kategoria','$data', '$irudiIzena')";

$mysqli->query($sql);
