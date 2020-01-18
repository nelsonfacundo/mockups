<?=
session_start();
session_destroy();
setcookie('emailUsuario', '', -1);
header('Location: login.php');
exit;
?>