<?php session_start(); ?>  
<?php
require "accesBDD.php";
$error = null;

if(!empty($_GET['deconnexion'])){
    session_unset();
    unset($_SESSION);
}

if(isset($_POST['connexion'])){
    $email = $_POST['email'];
    
    if(empty($email)){
        $error .= "le champ ne doit pas etre vide";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= "l'email n'est pas valide";
    }

    if(empty($_POST["password"])){
        $error .= "le champ mot de passe ne doit pas etre vide";
    }

    if(empty($error)){
        // recupere les info de la base de donnée (select ......  email)
        $personne = getForConnexion($email);
        $passwordBaseDonnee = $personne['password'];


        if(password_verify($_POST["password"],$passwordBaseDonnee)){
            $_SESSION['email'] = $personne['email'];
            header("location:index.php");
        }else{
            echo "mot de passe invalide";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    
    <?php include "fonction.php"?>
    <?php include "header.php"?>

    <form action="" method="POST">

        <div class="form-floating">
            <input type="text" class="form-control" placeholder="email" name="email">
            <label for="floatingInput">Email</label>
        </div>

        <div class="form-floating">
            <input type="text" class="form-control" placeholder="password" name="password">
            <label for="floatingInput">Password</label>
        </div>

        <button type="submit" name='connexion' class="btn btn-primary">Connexion</button>

    </form>



    <?php
    if (!empty($error)) {
        echo $error;
    }

    ?>




    <a href="./inscription.php">Pas encore inscrit?</a>
</body>
</html>