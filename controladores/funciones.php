<?php 

session_start();


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
             
            foreach($verificacion as $datos){
              if($datos["username"] == $data["username"]){
                $errores["username"] = "Este usuario ya esta registrado";
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
          foreach($verificacion as $datos){
            if($datos["email"] == $data["email"]){
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

      // FUNCIÓN PARA GUARGAR IMAGEN

      function guardarAvatar() {
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $directorioTemporal = $_FILES['avatar']['tmp_name'];
        $nombreImagen = uniqid('img_') . '.' . $ext;
        $carpetaFinal = dirname(__DIR__) . '/img/avatars/' . $nombreImagen;
        move_uploaded_file($directorioTemporal, $carpetaFinal);
        return $nombreImagen;
      }
    
      // FUNCIÓN PARA CREAR UN ARRAY ASOCIATIVO CON LOS DATOS QUE ME LLEGAN POR POST

      function crearUsuario($data) {
    
        $usuario = [
          "username" => $data["username"],
          "email" => $data["email"],
          "edad"  => [$data["mes"],$data["dia"],$data["año"]],
          "password" => password_hash($data["password"], PASSWORD_DEFAULT)
          ];
        
        return $usuario;
      }

      // FUNCIÓN PARA LEER LOS USUARIOS DEL JSON - db hace referencia a Data Base. La función devuelve un array de los usuarios registrados
      function dbDeUsuarios() {

        $listaDeUsuarios = file_get_contents('usuarios.json');
        return json_decode($listaDeUsuarios, true);
      
      }

      // FUNCIÓN PARA GUARDAR USUARIO NUEVO EN EL JSON

      function guardarUsuario($usuario) {
  
        $arrayUsuarios = dbDeUsuarios();
        $arrayUsuarios[] = $usuario;
        $todosLosUsuarios = json_encode($arrayUsuarios);
        file_put_contents('usuarios.json', $todosLosUsuarios);
      
      }


      //VALIDACION LOGUIN
  
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



      function compararPasswords($pass) {

      }



      function estaLogueado() {
        return isset($_SESSION['usuarioLogueado']);

      }


      // FUCIÓN PARA GUARDAR AL USUARIO EN SESIÓN

      function loguearUsuario($usuario) {

        unset($usuario['password']);
      
        $_SESSION['usuarioLogueado'] = $usuario;

        header('Location: perfil.php');
      
        exit;
      }


      function recordarUsuario($email) {
        setcookie('emailUsuario', $email , time() + 3000);
      }

            


?>