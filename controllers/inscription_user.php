<?php

//User Inscription

require '../configuration/database.php';
include '../header.phtml';
include '../inscription_user.phtml';

    if(isset($_POST['inscription']))
    {
        //Si les champs ne sont pas vides
        if(!empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['mail2']) && !empty($_POST['password']) && !empty($_POST['password2']))
        {
            $nom = htmlspecialchars($_POST['nom']);
            $mail = htmlspecialchars($_POST['mail']);
            $mail2 = htmlspecialchars($_POST['mail2']);
            $password = sha1($_POST['password']);
            $password2 = sha1($_POST['password2']);


            if($mail == $mail2)
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    // on verifie si le mail existe
                    $verifmail = $pdo->prepare(
                        '
                        SELECT *
                        FROM user
                        WHERE mail = ?
                        '
                    );

                    $verifmail -> execute(array($mail));

                        if($password == $password2)
                        {
                            $userinscription= $connexion->prepare(
                                '
                                INSERT INTO user (nom, mail, date, password) 
                                VALUES (:nom, :mail, NOW(), :password);
                                '
                            );
                            
                            $userinscription->execute([':nom' => $nom, ':mail' =>  $mail, ':password' => $password]);

                            $error = "Votre compte a bien été cree !";
                            header("Location:connexion_user.php");
                        }
                        else
                        {
                            $error = "Vos mots de passes ne corresponsent pas !";
                        }
                }
                else
                {
                    $error = "Votre mot de passe n'est pas valide !";
                }
            }
            else
            {
                $error = "Vos adresses mail ne correspondent pas !";
            }
        }

        else
        {
            $error = "Tous les champs doivent être complétés !";
        }

        if(isset($error))
        {
            echo "<span class='erreur'>".$error."</span>";
        }
    }

    include '../footer.phtml';
    
