<?php 



function validar($data) {

    $errores = [];
    

      //   VALIDACION NOMBRE 
      if(isset($data["username"])){
        if(empty($data["username"])){
          $errores["username"] = "Usuario esta vacio";
        } elseif (strlen (trim ($data["username"])) < 5){
          $errores["username"]  = "Usuario tiene que tener al menos 5 caracteres";
           }else {
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

        // VALIDACION EDAD 
          $fechas = getdate();
          if( ($fechas["year"] - $data["año"]) < 18) {
              $errores["año"]   = "Tienes que ser mayor de 18";
          } 

          

        return $errores;
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