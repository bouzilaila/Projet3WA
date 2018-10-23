<?php

// Product

   //Fichier qui contient la connexion à la BD
    require '../configuration/database.php';
    include '../header_admin.phtml';
    include '../product.phtml';
    
                    
    //Récupération des produits

    $product = $pdo->prepare(
    '
    SELECT *
    FROM `product`
    ORDER BY `id` DESC
    '
    );

    $product->execute();

    $products = $product->fetchAll();

    /*$query =
    '
    SELECT * FROM `product` ORDER BY `Id` DESC 
    
    ';

    $product = $connexion->prepare($query);
    $product->execute();
    $products = $product->fetchAll();
              
        /*$product = $connexion->query(

        '
        SELECT * FROM `product` ORDER BY `Id` DESC               
        '  
        );
        
        $products = $product->fetchAll();*/


        include '../footer.phtml';
        
        
                    