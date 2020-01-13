<?php 



function validar($data) {

    $errores = [];
<<<<<<< HEAD
    $verificacion = json_decode(file_get_contents('usuarios.json'), true);
=======
    
>>>>>>> 38dafc7f674c2a8deff36ccd25b1e1e99cb0ea84

      //   VALIDACION NOMBRE 
      if(isset($data["username"])){
        if(empty($data["username"])){
          $errores["username"] = "Usuario esta vacio";
<<<<<<< HEAD
        } else if (strlen (trim ($data["username"])) < 5){
          $errores["username"]  = "Usuario tiene que tener al menos 5 caracteres";
           } else {
=======
        } elseif (strlen (trim ($data["username"])) < 5){
          $errores["username"]  = "Usuario tiene que tener al menos 5 caracteres";
           }else {
>>>>>>> 38dafc7f674c2a8deff36ccd25b1e1e99cb0ea84
            foreach($verificacion as $usuario){
              if($usuario["username"] == $data["username"]){
                $errores["username"] = "Este usuario ya esta registrada";
              }
            }
           }
<<<<<<< HEAD
       } 


=======
           
       } 

>>>>>>> 38dafc7f674c2a8deff36ccd25b1e1e99cb0ea84
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
<<<<<<< HEAD
        
=======
>>>>>>> 38dafc7f674c2a8deff36ccd25b1e1e99cb0ea84
      
        //VALIDACION RECONTRASEÑA 
        if(isset($data["repassword"])){
          if (empty($data["repassword"])){
            $errores["repassword"]  = "La reconfirmacion esta vacio";
          } elseif($data["password"] != $data["repassword"]) {
            $errores['repassword'] = "Las contraseñas no coinciden";
          }
        }

<<<<<<< HEAD
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

=======
>>>>>>> 38dafc7f674c2a8deff36ccd25b1e1e99cb0ea84
        // VALIDACION EDAD 
          $fechas = getdate();
          if( ($fechas["year"] - $data["año"]) < 18) {
              $errores["año"]   = "Tienes que ser mayor de 18";
          } 

<<<<<<< HEAD
=======
          
>>>>>>> 38dafc7f674c2a8deff36ccd25b1e1e99cb0ea84

        return $errores;
      }

<<<<<<< HEAD
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
    

=======
>>>>>>> 38dafc7f674c2a8deff36ccd25b1e1e99cb0ea84

function guardarUsuario($data) {
    
    $usuario = [
        "username" => $data["username"],
        "email" => $data["email"],
        "password" => password_hash($data["password"], PASSWORD_DEFAULT),
        "edad"  => [$data["mes"],$data["dia"],$data["año"]]
    ];
    
    return $usuario;
}


<<<<<<< HEAD

=======
>>>>>>> 38dafc7f674c2a8deff36ccd25b1e1e99cb0ea84
?>