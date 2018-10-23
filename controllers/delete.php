<?php

//Delete

    //Fichier qui contient la connexion à la BD
    include '../configuration/database.php';

    if(!empty($_GET['id'])){
        
        $id = htmlspecialchars($_GET['id']);
    }
    
    if(!empty($_POST['id'])){
        
        $id = htmlspecialchars($_POST['id']);
        
        $deleteProduct = $pdo->prepare(
            '
            DELETE
            FROM product
            WHERE id = :id
            '
            );
            
        $deleteProduct->execute(array($id));
        
        header ('Location:product.php');
    }
    