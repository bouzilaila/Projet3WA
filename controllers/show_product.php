<?php

// Product

   //Fichier qui contient la connexion à la BD
    require '../configuration/database.php';
    include '../header_admin.phtml';
    
    
                    
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
    
    include '../product.phtml';

    include '../footer.phtml';
