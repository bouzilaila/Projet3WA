<?php
session_start();

    //Ajouter un produit depuis l'interface administrateur

    include '../configuration/database.php';

    if(array_key_exists('admin',$_SESSION)){ 
        include '../templates/header_admin.phtml';
    
    $message = null;
    $isEmpty = null;


if(!empty($_POST['nom']) AND !empty($_POST['prix']) AND isset($_POST['nom'], $_POST['prix'])){
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];     

    $file_name = $_FILES['image']['name'];      
    $file_type = $_FILES['image']['type'];
    $file_tmp_name = $_FILES['image']['tmp_name'];
    $file_extension = strrchr($file_name, "."); /* prend en compte l'extension ce qui'il ya apres le point */
    $file_destination = '../Images/'.$file_name; /* chemin.nom du fichier*/

        //Vérifier le format de l'image
    $valid_extensions = array('.jpg', '.JPG', '.png', '.PNG', '.jpeg', '.JPEG');    
    
    $imageProduit = $pdo->prepare('SELECT * FROM product WHERE image = ?');   
    $imageProduit->execute(array($file_destination));
    $verifImage = $imageProduit->rowCount();  
                                                
        if($verifImage == 0){	
            if(in_array($file_extension, $valid_extensions)){
        
                if(move_uploaded_file($file_tmp_name, $file_destination)){  /* déplace fichier de son emplacement temporaire vers la bdd */
                    
                    $req = $pdo->prepare("INSERT INTO product (nom, image, prix) VALUES(?, ?, ?)");		
                    $req->execute(array($nom, $file_destination, $prix));
                        $message = "Téléchargement terminé";

                        header('location:show_product.php');
        
                }else{
                    $message = 'L\'image n\'a pas pu se télécharger';
                }
        
            }else{
        
                $message =  'Le format ne l\'image n\'est pas autorisé'; 
            }

        }else{ 
            $message = 'Image déjà existante';
        }


    }else{
    $isEmpty = 'Tous les champs doivent être complétés';
}

    include '../templates/insert_product.phtml';
    include '../templates/footer.phtml';
    }

    else{
        header('Location: logout_admin.php'); 
    }




    
    
    

    