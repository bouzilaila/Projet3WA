<?php
session_start();

//Admin Session

require_once '../configuration/database.php';
include '../templates/header_admin.phtml';


//Si tout les infos sont bien remplis
if(isset($_POST) && !empty($_POST))
{
    //Si username et password existe
    if(array_key_exists('username',$_POST) && array_key_exists('password',$_POST))
    {   
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $password = sha1($password);

        if(!empty(strip_tags($_POST['username'])) && !empty(sha1($_POST['password'])))
        {
            $req = $pdo->prepare(
                '
                SELECT * 
                FROM `admin` 
                WHERE username = :username AND password = :password

                '
            );

            $req->execute([
                
                'username' => $username,
                'password' => $password
                
            ]);

            $adminUser = $req->fetch();

            
            if($adminUser)
            {
                $_SESSION['admin'] = $username;
                

                header('location:interface_admin.php');
            }
            else
            {
                $error = 'Identifiant incorrecte !';
            }

            if(!$password)
            {
                $error = 'Mot de passe incorrecte !';
            }
        }
    }

    else
    {
        $error = 'Veuillez remplir tout les champs !';
    }
}

if (isset($error))
{
    echo '<span class="erreur">'. $error .'</span>';
}

include '../templates/admin.phtml';
include '../templates/footer.phtml';


