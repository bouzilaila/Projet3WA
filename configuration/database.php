<?php
 
try{
    $pdo = new PDO('mysql:host=localhost;dbname=pizzeria', "root", "",[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    // Test si pdo est opérationnel
    if ($pdo === null) {
        // Connexion KO
        // On par dans le catch
        throw new Exception("La connexion a échouée", 1);
    }
}

catch (PDOException $e){
    // Connexion KO
    echo 'Connexion échouée : ' . $e->getMessage() . ' / le code erreur est : '. $e->getCode();
}