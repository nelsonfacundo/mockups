<?php

session_start();
$usuario = $_SESSION['usuarioLogueado'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/perfil.css">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Work+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/86f3787a46.js" crossorigin="anonymous"></script>
    <title>Document</title>
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
                        <li><a href="contacto.php">contactanos</a></li>
                        <li><a href="sesion-controller.php" style="text-decoration:none;color:inherit;">Cerrar sesión</a></li>
                    </ul>
                 </nav>
            </div>
        </div>
        <div id="main">
            <div class="main-container">   
                <div class="intro">
                    <h1>Usuario</h1>
                    <div class="edit">
                        <a href="#">Edit Profile</a>
                    </div>
                </div>  
                <div class="profile">
                <img src="img/avatars/<?=$usuario['avatar']?>" >
                    <div class="block-profile">
                        <h2>Informacion:</h2>
                        <ul>
                            <li>Name :<p><?= $usuario['username'] ?></p></li>
                            <li>Email :<p><?= $usuario['email'] ?> </p></li>
                            <li>Fecha de nacimiento : <p>----</p></li>
                            <li>View :<p>----</p></li>
                        </ul>
                    </div>
                </div>
                <div class="logros">
                    <h2>Logros</h2>
                    <div class="block-logros">
                        <ul>
                            <li><img src="img/logros/logro-1.jpg" alt=""></li>
                            <li><img src="img/logros/logro-2.jpg" alt=""></li>
                            <li><img src="img/logros/logro-3.jpg" alt=""></li>
                            <li><img src="img/logros/logro-4.jpg" alt=""></li>
                            <li><img src="img/logros/logro-5.jpg" alt=""></li>
                            <li><img src="img/logros/logro-6.jpg" alt=""></li>
                            <li><img src="img/logros/logro-7.jpg" alt=""></li>
                            <li><img src="img/logros/logro-8.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="friend-list">
                <h2>Lista de amigos</h2>
                <div class="list">
                     
                </div>
            </div>
        </div>
        <div id="footer">
                <img src="img/logo.jpg">
                  <div class="block-footer">
                    <ul>
                       <li><a href="#">Home</a></li>
                       <li><a href="#">Quienes</a></li>
                       <li><a href="#">Servicios</a></li>
                       <li><a href="#">Sucursales</a></li>
                       <li><a href="contacto.html">Contacto</a></li>
                       <li><a href="#">Terminos</a></li>
                       <li><a href="#">Privacidad</a></li>
                       <li><a href="#">Cookies</a></li>
                        </ul>
                  </div>
            </div>









    </div>
</body>
</html>