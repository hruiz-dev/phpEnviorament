<?php
session_start();
?>

<?php require_once("connection.php"); ?>
<?php include("header.php"); ?>

<?php

if (isset($_SESSION["session_username"])) {
    // echo "Session is set"; // for testing purposes
    header("Location: intropage.php");
}

if (isset($_POST["login"])) {

    if (!empty($_POST[‘username’]) && !empty($_POST[‘password’])) {
        $username = $_POST[‘username’];
        $password = $_POST[‘password’];

        $query = mysqli_query("SELECT * FROM usertbl WHERE username=’" . $username . "’ AND password=’" . $password . "’");

        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $dbusername = $row[‘username’];
                $dbpassword = $row[‘password’];
            }

            if ($username == $dbusername && $password == $dbpassword) {

                $_SESSION[‘session_username’] = $username;

                /* Redirect browser */
                header("Location: intropage.php");
            }
        } else {

            $message = "Nombre de usuario ó contraseña invalida!";
        }

    } else {
        $message = "Todos los campos son requeridos!";
    }
}
?>

<div class="container mlogin">
    <div id="login">
        <h1>Logueo</h1>
        <form name="loginform" id="loginform" action="" method="POST">
            <p>
                <label for="user_login">Nombre De Usuario<br />
                    <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
            </p>
            <p>
                <label for="user_pass">Contraseña<br />
                    <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
            </p>
            <p class="submit">
                <input type="submit" name="login" class="button" value="Entrar" />
            </p>
            <p class="regtext">No estas registrado? <a href="register.php">Registrate Aquí</a>!</p>
        </form>

    </div>

</div>

<?php include("includes/footer.php"); ?>

<?php if (!empty($message)) {
    echo "<p class=\"error\">" . "MESSAGE: " . $message . "</p>";
} ?>

[/php]

A continuación, creamos el archivo register.php. Copie y pegue el siguiente código:

[php]

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<?php

if (isset($_POST["register"])) {

    if (!empty($_POST[‘full_name’]) && !empty($_POST[‘email’]) && !empty($_POST[‘username’]) && !empty($_POST[‘password’])) {
        $full_name = $_POST[‘full_name’];
        $email = $_POST[‘email’];
        $username = $_POST[‘username’];
        $password = $_POST[‘password’];

        $query = mysqli_query("SELECT * FROM usertbl WHERE username=’" . $username . "’");
        $numrows = mysqli_num_rows($query);

        if ($numrows == 0) {
            $sql = "INSERT INTO usertbl
(full_name, email, username,password)
VALUES(‘$full_name’,’$email’, ‘$username’, ‘$password’)";

            $result = mysqli_query($sql);

            if ($result) {
                $message = "Cuenta Correctamente Creada";
            } else {
                $message = "Error al ingresar datos de la informacion!";
            }

        } else {
            $message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
        }

    } else {
        $message = "Todos los campos no deben de estar vacios!";
    }
}
?>

<?php if (!empty($message)) {
    echo "<p class=\"error\">" . "Mensaje: " . $message . "</p>";
} ?>

<div class="container mregister">
    <div id="login">
        <h1>Registrar</h1>
        <form name="registerform" id="registerform" action="register.php" method="post">
            <p>
                <label for="user_login">Nombre Completo<br />
                    <input type="text" name="full_name" id="full_name" class="input" size="32" value="" /></label>
            </p>

            <p>
                <label for="user_pass">E-mail<br />
                    <input type="email" name="email" id="email" class="input" value="" size="32" /></label>
            </p>

            <p>
                <label for="user_pass">Nombre De Usuario<br />
                    <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
            </p>

            <p>
                <label for="user_pass">Contraseña<br />
                    <input type="password" name="password" id="password" class="input" value="" size="32" /></label>
            </p>

            <p class="submit">
                <input type="submit" name="register" id="register" class="button" value="Registrar" />
            </p>

            <p class="regtext">Ya tienes una cuenta? <a href="login.php">Entra Aquí!</a>!</p>
        </form>

    </div>
</div>

<?php include("includes/footer.php"); ?>

[/php]

A continuación, se crea la pagina de bienvenida en el archivo intropage.php. Esto servirá como la página principal una
vez que un usuario inicia sesión exitosamente.

[php]

<?php
session_start();
if (!isset($_SESSION["session_username"])) {
    header("location:login.php");
} else {
    ?>

    <?php include("includes/header.php"); ?>
    <div id="welcome">
        <h2>Bienvenido, <span>
                <?php echo $_SESSION[‘session_username’]; ?>!
            </span></h2>
        <p><a href="logout.php">Finalice</a> sesión aquí!</p>
    </div>

    <?php include("includes/footer.php"); ?>

    <?php
}
?>