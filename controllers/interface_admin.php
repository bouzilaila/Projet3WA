<?php 
session_start();

// Interface Administrateur

include '../configuration/database.php';
include '../templates/header_admin.phtml';


if(array_key_exists('admin',$_SESSION)){ 
    include '../templates/interface_admin.phtml';
}
else{
    header('Location: logout_admin.php'); 
}

include '../templates/footer.phtml';