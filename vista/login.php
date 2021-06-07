<?php
include_once 'backend/user.php';
include_once 'backend/user_session.php';
$userSession = new UserSession();
$user = new User();
if (isset($_SESSION['user'])) {
 /*  echo " Hay sesión "; */
 echo '<script>window.location = "./panel"</script>'; 
 $user->setUser($userSession->getCurrentUser());
} else if (isset($_POST['username']) && isset($_POST['password'])) {
  /* echo " Validación de login: "; */
$userForm = $_POST['username'];
$passForm = $_POST['password'];
if($user->userExists($userForm,$passForm)){
 /*  echo " usuario validado "; */
 header("Location: ./panel");
  $userSession->setCurrentUser($userForm);
  $user->setUser($userForm);
  include_once 'estructuralogin.php';
}else{
$errorLogin = "Nombre de usuario y/o contraseña es incorrecto";
include_once 'estructuralogin.php';
}
} else {
  /* echo " Login "; */
  include_once 'estructuralogin.php';
}
