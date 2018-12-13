<?php
session_start();

// Deconnexion utilisateur

$_SESSION = array();
session_destroy();
header('Location:connexion_user.php');
exit;


