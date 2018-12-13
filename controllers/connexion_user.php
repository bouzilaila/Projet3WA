<?php
session_start();

// Connexion utilisateur

require '../configuration/database.php';
include '../templates/header.phtml';


    if(isset($_POST['connexion']))
    {

        if(array_key_exists('mail',$_POST) && array_key_exists('password',$_POST)){

            $mail = htmlspecialchars($_POST['mail']);
            $password = sha1($_POST['password']);


            if(!empty($mail) && !empty($password))
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    $requser = $pdo->prepare(
                        '
                        SELECT `id`,`mail`,`password`
                        FROM `user` 
                        WHERE mail = :mail AND password = :password
                        '
                    );

                    $requser->execute(array(':mail' => $mail, ':password' => $password));
                    $connectuser = $requser->fetch();

                    

                    if($connectuser)
                    {
                        $_SESSION['user'] = $mail;
                        $_SESSION['id'] = $connectuser['id'];
                        $_SESSION['mail'] = $connectuser['mail'];
                        $_SESSION['password'] = $connectuser['password'];

                        // Redirection vers l'interface d'utilisateur
                        header('Location:interface_user.php');
                    }
                    else
                    {
                        $error = 'Vos identifiants sont incorrectes !';
                    }

                    if($password != ['password'])
                    {
                        $error = 'Vos identifiants sont incorrectes !';
                    }
                    
                }
                else
                {
                    $error = "Votre adresse mail n'est pas valide !";
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
    }

    include '../templates/connexion_user.phtml';
    include '../templates/footer.phtml';
    
   