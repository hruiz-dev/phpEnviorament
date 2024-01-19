<!DOCTYPE html>
<html>

<head>
    <title>Berrien Kontsultak</title>
    <link rel="stylesheet" type="text/css" href="estiloa.css">
</head>

<body>
    <h1>Berrien kontsulta</h1>
    <table border="1">
        <tr>
            <th>Izenburua</th>
            <th>Textua</th>
            <th>Kategoria</th>
            <th>Data</th>
            <th>Irudia</th>
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
            echo "</tr>";
        }

        ?>
    </table>
</body>

</html>