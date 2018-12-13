<?php
session_start();

    //Liste des reservations administrateur

    include '../configuration/database.php';

    if(array_key_exists('admin',$_SESSION)){ 
        include '../templates/header_admin.phtml';


    //Récupération des réservations
    $reservation = $pdo->prepare(
        '
            SELECT *
            FROM `reservation`
            ORDER BY `id` DESC
        '
        );
    
        $reservation->execute();
    
        $reservations = $reservation->fetchAll();


    include '../templates/list_reservation.phtml';
    include '../templates/footer.phtml';

    }
    else{
        header('Location: logout_admin.php'); 
    }