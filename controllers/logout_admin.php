<?php
session_start();

// Deconnexion administrateur

$_SESSION = array();
session_destroy();
header('Location:admin.php');
exit;