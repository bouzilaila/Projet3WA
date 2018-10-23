<?php
session_start();

//Update

    //Fichier qui contient la connexion à la BD
    include '../configuration/database.php';
    include '../header.phtml';
    
    if(!empty($_GET['id'])){
        
        $id = htmlspecialchars($_GET['id']);
    }

    if(!empty($_POST)){
        
        $nom            = htmlspecialchars($_POST['nom']);
        $description    = htmlspecialchars($_POST['description']);
        $prix           = htmlspecialchars($_POST['prix']);
        $image          = htmlspecialchars($_FILES['image']['nom']);
        
        // basename prend en parametre le chemin du fichier et fournit le nom de la dernière composante
        $imagePath      ='../images/' .basename($image);
        
        // Retourne les infos sur le chemin
        $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
        $success   = true; // Si le formulaire a été rempli avec success
        
        
        // Vérification du nom
            if(empty($nom)){
                $success = false;
                $erreurMessageNom = "Attention ce champs est vide";
            }
            
            // Vérification de la description
            if(empty($description)){
                $success = false;
                $erreurMessageDescription = "Attention ce champs est vide";
            }
            
            // Vérification du prix
            if(empty($prix)){
                $success = false;
                $erreurMessagePrix = "Attention ce champs est vide";
            }
            
            // Vérification de l'image
            if(empty($image)){
                
                $imageUpdated = false; // Si l'image n'a pas été téléchargé on garde l'image par defaut
            }
            
            else{
                
                $imageUpdated = true;
                $uploadImage = true;
                
                if($imageExtension !='jpg' && $imageExtension !='png' && $imageExtension !='jpeg' && $imageExtension !='gif'){
                    
                    $uploadImage = false;
                    $erreurMessageImg = 'Le format de l\'image autorisées: .jpg, .jpeg, .png, .gif'
                }
                
                // Verification du chemin de l'image s'il existe
                if(file_exists($imagePath)){
                    
                    $uploadImage = false;
                    $erreurMessageImg = 'Le fichier existe déjà'
                }
                
                
                // Verification de la taille de l'image
                if($_FILES['photo']['size'] > 500000){
                    
                    $uploadImage = false;
                    $erreurMessageImg = 'Le fichier ne doit pas dépasser 500KB';
                }
                
                if($uploadImage){
                    
                    // Déplacer le fichier téléchargé
                    if(!move_uploaded_file($_FILES['image'], $imagePath)){
                        
                        $uploadImage = false;
                        $erreurMessageImg = 'Le fichier n\'a pas du se télécharger';
                    }
                }
            }
            
            // En cas de succes, verifier si le formulaire a été rempli, l'image telechargée et modififée ou l'image na pas été modifiée alors on garde celle par defaut
            if(($success && $uploadImage && $imageUpdated) || ($success && !$imageUpdated)){
                
                // Si l'image est modifiée
                if($imageUpdated){
                    
                    $updateProduct = $pdo->prepare(
                    '
                    UPDATE product 
                    SET nom = :nom, 
                        prix = :prix,
                        image = :image
                    WHERE id = :id
        
                    ');
                
                    $updateProduct->execute(
                    
                    array(
                    
                    ':nom' => $nom,
                    ':prix' => $prix,
                    ':image' => $image,
                    ':id' => $id
                    
                    ));
                    
                }
                
                // Si l'image n'est pas modifiée
                else{
                    
                    $updateProduct = $pdo->prepare(
                    '
                    UPDATE product set 
                        nom = :nom, 
                        prix = :prix
                    WHERE id = :id
        
                    ');
                
                    $updateProduct->execute(
                    
                    array(
                    
                    ':nom' => $nom,
                    ':prix' => $prix,
                    ':id' => $id
                    
                    ));
                }
                
               
                header ('Location:product.php');
            }
            
            // Si l'image a été modifié et que le telechargement s'est mal passé
            else if($imageUpdated && !$uploadImage){
                
                $updateImage = $pdo-> prepare(
                    
                    '
                    SELECT image 
                    FROM product 
                    WHERE id = :id 
                    
                    ');
                $updateImage->execute(array($id));
                $products = $updateImage->fetch();
                $image = $products['image'];
                
            }
        
    }
    
    // recuperer toutes les infos sur product
    else{
        
        $updateProduct = $pdo-> prepare(
            '
            SELECT * 
            FROM product
            WHERE id = :id
            '
            );
        $updateProduct-> execute(array($id)); // recupere id apartir de GET
        
        $products = $updateProduct->fetch();
        
        $nom = $products['nom'];
        $prix = $products['prix'];
        $image = $products['image'];
    }

    include '../footer.phtml';
    