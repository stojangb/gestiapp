<?php
    include_once 'user_session.php';
    $userSession = new UserSession();
    $userSession->closeSession();
?>
<script> 
window.location.replace('/scanservice/login'); 
</script>