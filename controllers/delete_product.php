<?php
session_start();

//Supprimer un produit dans l'interface administrateur

    include 'header_admin.phtml';

    // Validation de la query string dans l'URL.
    if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']))
    {
        header('Location: show_product.php');
        exit();
    }

    include '../configuration/database.php';

    // Suppression d'un produit.
    $query =
    '
        DELETE FROM
            product
        WHERE
            Id = ?
    ';
    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_GET['id']]);

    // Redirection vers le show_product.
    header('Location: show_product.php');
    exit();

    include '../footer.phtml';

    