<?php
session_start();

unset($_SESSION['uID']);
unset($_SESSION['unm']);
session_destroy();

header('location: ../index.php');
exit;
?>