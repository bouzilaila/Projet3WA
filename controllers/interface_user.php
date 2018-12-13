<?php 
session_start();

// Interface utilisateur

include '../configuration/database.php';
include '../templates/header.phtml';

if(array_key_exists('user',$_SESSION)){ 
    
    include '../templates/interface_user.phtml';
}
else{
    header('Location:logout_user.php'); 
}


include '../templates/footer.phtml';

