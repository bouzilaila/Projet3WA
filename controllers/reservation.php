<?php

//Reservation

require '../configuration/database.php';
include '../home.phtml';

if(isset($_POST['reservation']))
{
        //Si les champs ne sont pas vides
        if(!empty($_POST['date']) && !empty($_POST['heure']) && !empty($_POST['nom']) && !empty($_POST['telephone']) && !empty($_POST['nombre_personne']))
        {
            $date = $_POST['date'];
            $heure = $_POST['heure'];
            $nom = htmlspecialchars($_POST['nom']);
            $telephone = htmlspecialchars($_POST['telephone']);
            $nombre_personne = ($_POST['nombre_personne']);

            if(!preg_match("/^[0-9\-]|[\+0-9]|[0-9\s]|[0-9()]*$/", $_POST['telephone']))
            {
                $erreur = "Votre numero est invalide !";
            }

            if(empty($_POST))
            {
                $reservation = $pdo ->prepare(
                    '
                    INSERT INTO reservation (date, heure, nom, telephone, nombre_personne)
                    VALUES (:date, :heure, :nom, :telephone, :nombre_personne)
                    '
                );

                $reservation ->execute([':date' => $date, ':heure' => $heure, ':nom' => $nom, ':telephone' => $telephone, ':nombre_personne' =>  $nombre_personne]);

                $erreur='Votre reservation a bien été enregistré';
            }
        }
        else
        {
            $erreur = "Tous les champs doivent être complétés !";
        }

        if(isset($erreur))
        {
            echo "<span class='erreur'>".$erreur."</span>";
        }
}
