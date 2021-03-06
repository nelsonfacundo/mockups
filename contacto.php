<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleContact.css">
    <script src="https://kit.fontawesome.com/86f3787a46.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div id="header">
            <div class="main-header">
                <img src="img/logo.jpg" alt="logo">
                <input type="checkbox" id="menu-bar">
                <label class="fas fa-bars" for="menu-bar"></label>
                <nav class="menu">
                    <ul>
                        <li><a href="index.php">inicio</a></li>
                        <li><a href="ranking.php">ranking</a></li>
                        <li><a href="perfil.php">perfil</a></li>
                        <li><a href="faq">Faq</a></li>
                        <li><a href="ABM.php">ABM</a></li>
                        <li><a href="contacto.php">contactanos</a></li>
                        <li><a href="register.php">registrate</a></li>
                        <li><a href="login.php">iniciar sesion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
        <div id="main">
            <img src="img/fondo.jpg" alt="" width="100%" height="400px">
            <div class="titulo">
                <h1>Contact us</h1>
            </div>
        </div>
        <div class="login-nombre">
            <label for="nombre">Nombre de usuario:</label><br> <br>
            <input id="nombre" type="text" name="nombre" placeholder="Ingrese su nombre de usuario">
        </div>
        <br>
        <div class="login-email">
            <label for="email">Email:</label><br> <br>
            <input id="pass" type="email" name="email" placeholder="Ingrese su correo electrónico">
        </div>
        <br>
        <div class="login-message">
            <label for="message">Mensaje:</label> <br> <br>
            <input id="message" type="text" name="message" placeholder="Escriba aquí su mensaje...">
        </div>
        <br>
        <div class="formulario-button">
            <button type="submit" name="button">Enviar</button>
        </div>



</body>

</html>