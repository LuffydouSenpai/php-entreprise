<?php session_start(); ?>  
<?php
require("accesBDD.php");
    if (isset($_POST['send'])) {
        $nom =strip_tags($_POST['nom']);
        $prenom =strip_tags($_POST['prenom']);
        $email =strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $error = null;

        if (empty($nom)) {
            $error.="<p>le nom est obligatoire</p>";
        }elseif (strlen($nom)<2 || strlen($nom)>15) {
            $error.="<p>la taille du nom doit etre entre 2 et 15</p>";
        }

        if (empty($prenom)) {
            $error.="<p>le prenom est obligatoire</p>";
        }elseif (strlen($prenom)<2 || strlen($prenom)>15) {
            $error.="<p>la taille du prenom doit etre entre 2 et 15</p>";
        }

        if (empty($email)) {
            $error.="<p>le email est obligatoire</p>";
        }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error.= "<p>l'email n'est pas valide (exemple@exemple.com)</p>";
        }

        if (empty($password)) {
            $error.="<p>le password est obligatoire</p>";
        }elseif (strlen($password>8)) {
            $error.= "<p>la taille du password doit etre superieur à 8</p>";
        }

        if(empty($error)){
            $hash = password_hash($password,PASSWORD_BCRYPT);
            setEmployesPhoto($prenom,$nom,$email,$hash);
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.min.css">
</head>
<body>
    <?php include "fonction.php"?>  
    <?php include "header.php"?>


    <form action="" method="POST" enctype="multipart/form-data">
        <!-- nom-->
        <div class="form-floating">
            <input type="text" class="form-control" placeholder="nom" name="nom">
            <label for="floatingInput">Nom</label>
        </div>

        <!-- prenom-->
        <div class="form-floating">
            <input type="text" class="form-control" placeholder="prenom"  name="prenom">
            <label for="floatingInput">Prenom</label>
        </div>

        <!-- email-->
        <div class="form-floating">
            <input type="mail" class="form-control" placeholder="email"  name="email">
            <label for="floatingInput">Email</label>
        </div>

        <!-- password-->
        <div class="form-floating">
            <input type="password" class="form-control" placeholder="Password"  name="password">
            <label for="floatingInput">Password</label>
        </div>

        <!-- profil-->
        <div class="form-floating">
            <input type="file" class="form-control" placeholder="photoProfil"  name="photo" disabled>
            <label for="floatingInput">photo Profil (disabled)</label>
        </div>
        <button type="submit" name="send" class="btn btn-primary">Submit</button>
    </form>

    <?php
    if (!empty($error)) {
        echo $error;
    }

    ?>
    
</body>
</html>