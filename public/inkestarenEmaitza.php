<!DOCTYPE html>
<html lang="eu">

<head>
   <title>resultaduak</title>
   <link rel="stylesheet" type="text/css" href="estiloa.css"/>
</head>

<body>
<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db = "inkesta";

$con = mysqli_connect($host, $user, $pass, $db);

$botua = $_POST['botua'];  

//to prevent from mysqli injection  
$botua = stripcslashes($botua);  
$botua = mysqli_real_escape_string($con, $botua);  

$botua = $botua 

$sql = "INSERT INTO inkestak (botua) VALUES ('$botua')"; 
mysqli_query($con, $sql); 
$sql = "SELECT COUNT(botua) FROM inkestak GROUP BY botua";
$result = mysqli_query($con, $sql);
?>
</body>
</html>
