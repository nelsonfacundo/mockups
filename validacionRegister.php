<?php

if($_POST){
  $errores=[];
  //Validacion USUARIO//
  if (strlen(trim($_POST["username"])) == "") {
    $errores["username"] = "El usuario esta vacio";
 }elseif (strlen(trim($_POST["username"])) < 5 ) {
    $errores["username"] = "El usuario tiene que tener mas de 5 caracteres";
  }
    //Validacion Contraseña//
    if (strlen(trim($_POST["pass"])) == 0 && (strlen(trim($_POST["repass"])) == 0))
  {
    $errores[] =  "Los dos campos de contraseña estan vacios";
  }
  
  if (strlen(trim($_POST["pass"])) < 0)
  {
    $errores["pass"] = "La contraseña esta vacia";
  }elseif (strlen(trim($_POST["pass"])) < 6)
  {
    $errores["pass"] = "La contraseña tiene que tener mas de 6 caracteres";
  }
  
  if (strlen(trim($_POST["repass"])) < 0)
  {
    $errores["repass"] = "La contraseña esta vacia";
  }elseif (strlen(trim($_POST["repass"])) < 6)
  {
    $errores["repass"] = "La confirmacion tiene que tener mas de 6 caracteres";
  }
  if(($_POST["pass"]) != ($_POST["repass"]))
  {
    $errores["pass"]= "Las contraseñas no verifican";
  }


  //Validacion Email//
  if (strlen(trim($_POST["email"])) == "") {
    $errores["email"] = "El email esta vacio";
 }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errores['email'] = "El email ingresado no es válido";
}

//VALIDACION EDAD //

$fechas = getdate();
     if( ($fechas["year"] - $_POST["año"]) < 18) {
         $errores["año"] = "tenes que ser mayor de 18 años "; 
       }

    
}


?>