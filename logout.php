<?php
session_start();
session_destroy();
echo "alert('You have been logged out successfully')";
header('Location: http://localhost/craiglist/homepage.php');
exit();
?>