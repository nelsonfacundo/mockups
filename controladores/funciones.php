<?php 


//VALIDACION REGISTRO
  
function validarRegistro($data) {

    $errores = [];
    $verificacion = json_decode(file_get_contents('usuarios.json'), true);

      //   VALIDACION NOMBRE 
      if(isset($data["username"])){
        if(empty($data["username"])){
          $errores["username"] = "Usuario esta vacio";
        } else if (strlen (trim ($data["username"])) < 5){
          $errores["username"]  = "Usuario tiene que tener al menos 5 caracteres";
           } else {
             
            foreach($verificacion as $usuario){
              if($usuario["username"] == $data["username"]){
                $errores["username"] = "Este usuario ya esta registrada";
              }
            }
           }
       } 


        //   VALIDACION EMAIL 
      if(isset($data["email"])){
        if(empty($data["email"])){
          $errores["email"] = "Email esta vacio";
        }elseif (!filter_var($data["email"],FILTER_VALIDATE_EMAIL)) {
            $errores["email"]  = "Debes ingresar un email valido";
        }else {
          foreach($verificacion as $usuario){
            if($usuario["email"] == $data["email"]){
              $errores["email"] = "Este email ya esta registrado";
            }
          }
         }
      }
        
        // VALIDACION CONTRASEÑA 
        if(isset($data["password"])){
          if (empty($data["password"])){
            $errores["password"]  = "Contraseña esta vacio";
          }elseif (strlen($data["password"]) < 6) {
            $errores["password"]  = "La contraseña debe tener al menos 6 caracteres";
          }
        }
        
      
        //VALIDACION RECONTRASEÑA 
        if(isset($data["repassword"])){
          if (empty($data["repassword"])){
            $errores["repassword"]  = "La reconfirmacion esta vacio";
          } elseif($data["password"] != $data["repassword"]) {
            $errores['repassword'] = "Las contraseñas no coinciden";
          }
        }

        // CAMPO AVATAR
        $avatar = $_FILES['avatar'];
        if($avatar['error']) {
        $errores['avatar'] = "Debe subir una foto de perfil";
        } else {
        $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png') {
          $errores['avatar'] = "La extensión del archivo debe ser jpg, png ó jpeg";
        }
        }

        // VALIDACION EDAD 
          $fechas = getdate();
          if( ($fechas["year"] - $data["año"]) < 18) {
              $errores["año"]   = "Tienes que ser mayor de 18";
          } 


        return $errores;
      }

      function guardarAvatar() {
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $directorioTemporal = $_FILES['avatar']['tmp_name'];
        $nombreImagen = uniqid('img_') . '.' . $ext;
        $carpetaFinal = dirname(__FILE__) . '/avatars/' . $nombreImagen;
        move_uploaded_file($directorioTemporal, $carpetaFinal);
        return $nombreImagen;
      }
    

      function crearUsuario($data) {
    
        $usuario = [
          "username" => $data["username"],
          "email" => $data["email"],
          "password" => password_hash($data["password"], PASSWORD_DEFAULT),
          "edad"  => [$data["mes"],$data["dia"],$data["año"]]
        ];
        
        return $usuario;
      }

      function dbDeUsuarios() {

        $listaDeUsuarios = file_get_contents('usuarios.json');
        return json_decode($listaDeUsuarios, true);
      
      }


      function guardarUsuario($usuario) {
  
        $arrayUsuarios = dbDeUsuarios();
        $arrayUsuarios[] = $usuario;
        $todosLosUsuarios = json_encode($arrayUsuarios);
        file_put_contents('usuarios.json', $todosLosUsuarios);
      
      }


      //VALIDACION LOGUIN
     // LOGUIN

function validarLoguin() {
  $errores = [];

  $email = trim($_POST['email']);
  $pass = trim($_POST['password']);

  if(empty($email)) {
    $errores['email'] = 'El campo email es obligatorio';
  } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'El formato introducido no es válido';
  } elseif(!buscarUsuarioPorEmail($email)) {
    $errores['email'] = 'Las credenciales no coinciden';
  } else {
    $usuario = buscarUsuarioPorEmail($email);
    if( !password_verify($pass, $usuario['password']) ) {
      $errores['email'] = 'Las credenciales no coinciden';
    }
  }

  if(empty($pass)) {
    $errores['password'] = 'El campo password es obligatorio';
  }

  return $errores;

}

// FUNCIÓN PARA BUSCAR USUARIO POR MAIL

function buscarUsuarioPorEmail($email) {
  $arrayUsuarios = dbDeUsuarios();
  foreach($arrayUsuarios as $usuario) {
    if($usuario['email'] == $email) {
      return $usuario;
    }
  }
}

// FUNCIÓN PARA COMPARAR CONTRASEÑAS

function compararPasswords($pass) {

}

// FUNCIÓN PARA SABER SI ESTÁ LOGUEADO

function estaLogueado() {
  return isset($_SESSION['usuarioLogueado']);
  // Pregunta si está seteado el índice usuario en sesión. Devuelve un booleano
}


// FUCIÓN PARA GUARDAR AL USUARIO EN SESIÓN

function loguearUsuario($usuario) {
  // con esta función borro la posición password del array de usuario que recibo, para no guardar ese dato en sesión
  unset($usuario['password']);
  // creo una posición de usuarioLogueado en la variale sessión
  $_SESSION['usuarioLogueado'] = $usuario;
  // lo redirecciono a la vista de perfil
  header('Location: perfil.php');
  // se recomienda hacer un exit después de una redirección
  exit;
}

// FUNCIÓN PARA CREAR LA COOKIE DEL USUARIO Y MANTENERLO LOGUEADO

function recordarUsuario($email) {
  setcookie('emailUsuario', $email , time() + 3000);
}

      


?>