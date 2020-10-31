<?php
session_start();
$_SESSION['auth'] = null;
$_SESSION['user_id'] = null;
$_SESSION['name'] = null;
header("Location: index.php");
?>