<?php 



function validar($data) {

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
        // me guardo la extensión del archivo
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    
        // me guardo la carpeta temporal en la que se encuentra
        $directorioTemporal = $_FILES['avatar']['tmp_name'];
    
        // armo el nombre con el que voy a guardar la imagen. La función uniqid() puede recibir un string, que será el prefijo del id aleatorio generado
        $nombreImagen = uniqid('img_') . '.' . $ext;
        
        // armo la ruta final de la imagen, concatenando al final el nombre que creé
        $carpetaFinal = dirname(__FILE__) . '/avatars/' . $nombreImagen;
        
        // muevo el archivo a la carpeta avatars
        move_uploaded_file($directorioTemporal, $carpetaFinal);
        
        // devuelvo el nombre de la imagen que armé, para guardarlo en el array del usuario
        return $nombreImagen;
    }
    


function guardarUsuario($data) {
    
    $usuario = [
        "username" => $data["username"],
        "email" => $data["email"],
        "password" => password_hash($data["password"], PASSWORD_DEFAULT),
        "edad"  => [$data["mes"],$data["dia"],$data["año"]]
    ];
    
    return $usuario;
}



?>