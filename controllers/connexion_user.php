<?php
session_start();

require '../configuration/database.php';
include '../header.phtml';
//var_dump($_SESSION['id']);
include '../connexion_user.phtml';


    if(isset($_POST['connexion']))
    {
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
                    $_SESSION['id'] = $connectuser['id'];
                    $_SESSION['mail'] = $connectuser['mail'];
                    $_SESSION['password'] = $connectuser['password'];

                    header('Location:connexion_user.php');
                }
                else
                {
                    $error = 'Vos identifiants sont incorrectes !';
                }

                if($password != $_SESSION['password'])
                {
                    $error = 'Mot de passe incorrecte !';
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

    include '../footer.phtml';