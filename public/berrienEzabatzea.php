<!DOCTYPE html>
<html>

<head>
    <title>Berrien Ezabatzea</title>
    <link rel="stylesheet" type="text/css" href="estiloa.css">
</head>

<body>
    <h1>Berrien ezabatzea</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table border="1">
            <tr>
                <th>Izenburua</th>
                <th>Textua</th>
                <th>Kategoria</th>
                <th>Data</th>
                <th>Irudia</th>
                <th>Ezabatu</th>
            </tr>
            <?php

            $host = "mysql";
            $user = "root";
            $pass = "root";
            $db = "probak";

            $karpeta = "./img/";
            $mysqli = new mysqli($host, $user, $pass, $db);

            $sql = "SELECT * FROM `albisteak`";

            $mysqli->query($sql);

            $result = $mysqli->query($sql);

            while ($row = $result->fetch_row()) {
                echo "<tr>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                if ($row[5] != null) {
                    echo "<td>" . "<img src='" . $karpeta . $row[5] . "' alt='irudia'/>" . "</td>";
                } else {
                    echo "<td></td>";
                }
                echo "<td><input type='checkbox' name='albistea[]' value=" . $row[0] . "></td>";
                echo "</tr>";
            }

            ?>
        </table>
        <input type="submit" name="Ezabatu" value="Ezabatu">
    </form>

</body>

</html>
<?php



if (isset($_POST['albistea'])) {
    $datua = $_POST['albistea'];
    ezabatuAlbisteak($datua);
}

function ezabatuAlbisteak($albistea)
{
    $host = "mysql";
    $user = "root";
    $pass = "root";
    $db = "probak";

    $mysqli = new mysqli($host, $user, $pass, $db);
    foreach ($albistea as $value) {

        $sql = "DELETE FROM `albisteak` WHERE `albisteak`.`id` = $value";

        $mysqli->query($sql);

    }
}
?>