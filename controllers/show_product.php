<?php
session_start();

// Liste des produits administrateur

    require '../configuration/database.php';
    

    if(array_key_exists('admin',$_SESSION)){ 
        include '../templates/header_admin.phtml';

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
        
        include '../templates/product.phtml';

        include '../templates/footer.phtml';

    }
    else{
        header('Location: logout_admin.php'); 
    }
                    
    
    


    
        
        
                    