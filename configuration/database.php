<?php

// Connexion à la base de donnée

try{
    $pdo = new PDO('mysql:host=localhost;dbname=restaurant', "root", "",[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    
    // Tester pdo
    if ($pdo === null) {
        throw new Exception("La connexion a échouée", 1);
    }
}

catch (PDOException $e){
    echo 'Connexion échouée : ' . $e->getMessage() . ' / le code erreur est : '. $e->getCode();
}

