<?php
 //session_start();

//Insert
    
    //Fichier qui contient la connexion à la BD
    include '../configuration/database.php';
    include '../insert_product.phtml';

    if(!empty($_POST)){
        
        $image          = htmlspecialchars($_FILES['image']['nom']);
        $nom            = htmlspecialchars($_POST['nom']);
        $prix           = htmlspecialchars($_POST['prix']);
        
        // basename prend en parametre le chemin du fichier et fournit le nom de la dernière composante
        $imagePath      ='../images/' .basename($image);
        
        // Retourne les infos sur le chemin
        $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
        $success   = true; // Si le formulaire a été rempli avec success
        $uploadImage = false;
        
        
        // Vérification du nom
            if(empty($nom)){
                $success = false;
                $error = "Attention ce champs est vide";
            }
            
            // Vérification du prix
            if(empty($prix)){
                $success = false;
                $error = "Attention ce champs est vide";
            }
            
            // Vérification de l'image
            if(empty($image)){
                $success = false;
                $error = "Veuillez télécharger votre image";
            }
            
            else{
                
                $uploadImage = true;
                
                if($imageExtension !='jpg' && $imageExtension !='png' && $imageExtension !='jpeg' && $imageExtension !='gif'){
                    
                    $uploadImage = false;
                    $error = 'Le format de l\'image autorisées: .jpg, .jpeg, .png, .gif';
                }
                
                // Verification du chemin de l'image s'il existe
                if(file_exists($imagePath)){
                    
                    $uploadImage = false;
                    $error = 'Le fichier existe déjà';
                }
                
                
                // Verification de la taille de l'image
                if($_FILES['photo']['size'] > 500000){
                    
                    $uploadImage = false;
                    $error = 'Le fichier ne doit pas dépasser 500KB';
                }
                
                if($uploadImage){
                    
                    // Déplacer le fichier téléchargé
                    if(!move_uploaded_file($_FILES['image'], $imagePath)){
                        
                        $uploadImage = false;
                        $error = 'Le fichier n\'a pas pu se télécharger';
                    }
                }
            }

            /* /*if(empty($_POST)){

                // Récupération de toutes les photos
                $query =
                '
                    SELECT *
                    FROM product        
                ';
                $image = $pdo->query($query);
                $images = $image->fetchAll();
            }
            else{
                // Ajout d'un produit.
                $query =
                '
                    INSERT INTO
                        product
                        (image, nom, prix)
                    VALUES
                        (:image, :nom, :prix)
                ';
                $insertProduct = $pdo->prepare($query);
                $insertProduct->execute([$_POST['image'], $_POST['nom'], $_POST['prix']]);

            }*/
            
           if($success && $uploadImage){
                
                $insertProduct = $pdo->prepare(
                    '
                    INSERT INTO product (image, nom, prix)
                    VALUES (:image, :nom, :prix, )
                    ');
                
                    var_dump($insertProduct); die;
                $insertProduct->execute(
                
                

                array(
                    ':image' => $image,
                    ':nom' => $nom,
                    ':prix' => $prix,
                    
                ));
                
                header ('Location:show_product.php');
            }

            if(isset($error))
            {
                echo "<span class='erreur'>".$error."</span>";
            }
        
    }
    

    