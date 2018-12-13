<?php

// La carte visiteur

    require '../configuration/database.php';
    include '../templates/header.phtml';
    
    
                    
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
    
    include '../templates/lacarte.phtml';
    include '../templates/footer.phtml';
