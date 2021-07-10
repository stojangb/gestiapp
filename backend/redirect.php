<?php
include_once 'backend/user.php';
include_once 'backend/user_session.php';
$userSession = new UserSession();
$user = new User();
if (isset($_SESSION['user'])) {
 $user->setUser($userSession->getCurrentUser());
} else if (isset($_POST['username']) && isset($_POST['password'])) {
  $userForm = $_POST['username'];
  $passForm = $_POST['password'];
if($user->userExists($userForm,$passForm)){
  $userSession->setCurrentUser($userForm);
  $user->setUser($userForm);
}else{
header("Location: ../../gestiapp/login");
}
} else {
  header("Location: ../../gestiapp/login");
}
