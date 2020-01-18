<?php
  
  require('controladores/funciones.php');

  if($_POST) {

    $errores = validarRegistro($_POST);

    if(!$errores) {
    
        $usuarioNuevo = crearUsuario($_POST);
        $nombreImagen = guardarAvatar();
        $usuarioNuevo['avatar'] = $nombreImagen;
        guardarUsuario($usuarioNuevo);
        header('Location: login.php');
       
    }
}
  
  
  
  ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styleRegister.css">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Work+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/86f3787a46.js" crossorigin="anonymous"></script>
    <title></title>
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
        <div class="contenido">
                    <div class="title">
                      <h1>Shovel knight</h1>
                    </div>
                    <div class="formulario">
                      <div class="formulario-container">
                          <div class="subtitulo">
                              <h2>Registro</h2>
                          </div>
                        <form action="register.php" method="post" enctype="multipart/form-data" >
                          <div class="formulario-nombre">
                            <label for="username">Usuario:</label><br>
                                <input id="username" type="text" name="username" placeholder="ingrese su usuario"><br/>
                               <?php if(isset($errores['username'])): ?>
                               <span style="color:red;"><?= $errores['username']?></span>
                              <?php endif; ?>
                          </div>
                          <div class="formulario-email">
                            <label for="email">Email:</label><br>
                              <input id="email" type="email" name="email" placeholder="ingrese su email"><br/>
                              <?php if(isset($errores['email'])): ?>
                              <span style="color:red;"><?= $errores['email']?></span>
                              <?php endif;?>
                          </div>
                          <div class="formulario-pass">
                            <label for="pass">Contraseña:</label><br>
                                <input id="password" type="password" name="password" placeholder="ingrese su contraseña"><br>
                               <?php if(isset($errores["password"])): ?>
                               <span style="color:red;"><?= $errores["password"]?></span>
                              <?php endif; ?>
                          </div>
                          <div class="formulario-repass">
                            <label for="repassword">Confirmacion:</label><br>
                              <input id="repassword" type="password" name="repassword" placeholder="Ingresá confirmacion"><br>
                               <?php if(isset($errores["repassword"])): ?>
                               <span style="color:red;"><?= $errores["repassword"]?></span>
                              <?php endif; ?>
                          </div>
                          <div class="formulario-imagen">
                          <label>Avatar:<label>
                          <input type='file' name='avatar'><br>
                           <?php if(isset($errores['avatar'])): ?>
                           <span style="color:red;"><?= $errores['avatar']?></span>
                           <?php endif; ?>
                         </div>
                          <div class="formulario-edad">
                              <p>Fecha de nacimiento:</p>
                            <div class="block-display-edad">
                              <div class="formulario-mes">
                                  <label for="mes">Mes:</label><br>
                                    <select name="mes" id="mes">
                                      <option value="en">Enero </option>
                                      <option value="fe">Febrero </option>
                                      <option value="ma">Marzo </option>
                                      <option value="ab">Abril</option>
                                      <option value="may">Mayo </option>
                                      <option value="jun">Junio </option>
                                      <option value="jul">Julio </option>
                                      <option value="ag">Agosto </option>
                                      <option value="sep">Septiembre </option>
                                      <option value="oct">Octumbre </option>
                                      <option value="nov">Noviembre </option>
                                      <option value="dic">Diciembre </option>
                                    </select>
                              </div>
                              <div class="formulario-dia">
                                <label for="dia">Dia:</label><br>
                                  <select name="dia" id="dia">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                  </select>
                                </div>
                                <div class="formulario-año">
                                  <label for="año">Año:</label><br>
                                    <select name="año" id="año">
                                      <option value="1990">1990</option>
                                      <option value="1991">1991</option>
                                      <option value="1992">1992</option>
                                      <option value="1993">1993</option>
                                      <option value="1994">1994</option>
                                      <option value="1995">1995</option>
                                      <option value="1996">1996</option>
                                      <option value="1997">1997</option>
                                      <option value="1998">1998</option>
                                      <option value="1999">1999</option>
                                      <option value="2000">2000</option>
                                      <option value="2001">2001</option>
                                      <option value="2002">2002</option>
                                      <option value="2003">2003</option>
                                      <option value="2004">2004</option>
                                      <option value="2005">2005</option>
                                      <option value="2006">2006</option>
                                      <option value="2007">2007</option>
                                      <option value="2008">2008</option>
                                      <option value="2009">2009</option>
                                      <option value="2010">2010</option>
                                      <option value="2011">2011</option>
                                      <option value="2012">2012</option>
                                      <option value="2013">2013</option>
                                      <option value="2014">2014</option>
                                      <option value="2015">2015</option>
                                      <option value="2016">2016</option>
                                      <option value="2017">2017</option>
                                      <option value="2018">2018</option>
                                      <option value="2019">2019</option>
                                      <option value="2020">2020</option>
                                    </select>
                                </div>
                              </div>
                          </div>
                          <div class="formulario-button">
                              <button type="submit" name="button">¡Registrate!</button>
                          </div>
                          </form>  
                              <div class="terminos">
                                <p>Al registrarte,Aceptas nuestras condiciones de uso  y policita de privacidad</p>
                                <p>Ya tienes cuenta ? <a href="login.php">iniciar sesion</a> </p>
                              </div>
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
