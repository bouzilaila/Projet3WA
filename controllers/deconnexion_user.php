<?php
session_start();

// Deconnexion utilisateur

$_SESSION = array();
session_destroy($_POST['logout']);

// Redirection vers la page d'accueil
header('Location:../index.php');
