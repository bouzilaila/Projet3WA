<?php
session_start();

//Admin Session

require_once '../configuration/database.php';
include '../header_admin.phtml';
include '../admin.phtml';

// S'il n'y a pas de session 
if(!$_SESSION['admin'])
{
    header('Location:admin.php');
}
 //Si tout les infos sont bien remplis
if(isset($_POST) && !empty($_POST))
{
    if(!empty(htmlspecialchars($_POST['username'])) && !empty(htmlspecialchars($_POST['password'])))
    {
        $req = $pdo->prepare(
            '
            SELECT * 
            FROM `admin` 
            WHERE username = :username AND password = :password

            '
        );

        $req->execute([
            
            'username' => $_POST['username'],
            'password' => $_POST['password']
            
        ]);

        $adminUser = $req->fetch();

        
        if($adminUser)
        {
            $_SESSION['admin'] = $_POST['username'];

            header('location:../interfaceAdmin.php');
        }
        else
        {
            $error = 'Identifiant incorrecte !';
        }

        if($_POST['password'] != ['password'])
        {
            $error = 'Mot de passe incorrecte !';
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

/*function efface_cookies()
    {
        global $HTTP_COOKIE_VARS;
        if (0 < sizeof($HTTP_COOKIE_VARS))
        { while (list ($k_cookie, $v_cookie) = each ($HTTP_COOKIE_VARS))
            { 
                setcookie($k_cookie);
            }
        }
    }

efface_cookies(); //  efface toute les infos contenus dans les cookies*/

include '../footer.phtml';


