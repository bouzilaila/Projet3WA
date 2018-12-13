<?php
session_start();

// Reservation d'une table 

    require '../configuration/database.php';
    

    if(array_key_exists('user',$_SESSION)){ 
        
        include '../templates/header.phtml';

    $error=null;

    if(array_key_exists('reservation', $_POST)){

        if(!empty($_POST)){

            $date = htmlspecialchars($_POST['date']);
            $heure = htmlspecialchars($_POST['heure']);
            $nom = htmlspecialchars($_POST['nom']);
            $telephone = htmlspecialchars($_POST['telephone']);
            $nombre_personne = htmlspecialchars($_POST['nombre_personne']);

            $req = $pdo->prepare("INSERT INTO reservation (date, heure, nom, telephone, nombre_personne) VALUES (?,?,?,?,?)");
            $req->execute(array($date, $heure, $nom, $telephone, $nombre_personne));
            
                echo  "<div class='confirm_reservation'>Votre réservation a bien été prise en compte ".$nom."!</br> Votre table vous attend le ".$date." à ".$heure." pour ".$nombre_personne." personne(s). </br> Merci pour votre visite et a bientôt !</div>";
        }
        else{

            $error = "Tous les champs doivent être complétés !";
        }

        if(isset($error))
        {
            echo "<span class='erreur'>".$error."</span>";
        }
    }


    include '../templates/reservation_table.phtml';
    include '../templates/footer.phtml';

    }
    else{
        header('Location: logout_user.php'); 
    }

        


