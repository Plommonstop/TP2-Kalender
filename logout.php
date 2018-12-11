<?php
session_start();
unset($_SESSION['account']);
session_destroy();

header("Location: Loggain.php");
exit;
?>