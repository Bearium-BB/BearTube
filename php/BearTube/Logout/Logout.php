<?php
session_start();
session_unset();
session_destroy();
setcookie(session_name(), '', time()-3600);

header("Location: /php/BearTube/Index.php",true,301);
exit();

?>