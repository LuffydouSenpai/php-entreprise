<?php session_start(); ?>  
<?php
$table=$_GET['table'];
if($table == "entreprice"){
   require ('accesBDD.php');

if(isset($_POST['send'])){
    setEmployes($_POST['prenom'],$_POST['nom'],$_POST['sexe'],$_POST['service'],$_POST['salaire'],);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>
<body>
    <?php include "fonction.php"?>
    <?php include "header.php"?>
    <?php
    doubleBr();

    ?>

<main>
<!-- formulaire d'insertion nom prenom service .... -->
    <form action="" method="post">

        <div class="form-floating">
        <input type="text" class="form-control" placeholder="prenom" name="prenom" required="required">
        <label for="floatingInput">Prenom</label>
        </div>

        <div class="form-floating">
        <input type="text" class="form-control" placeholder="nom" name="nom" required="required">
        <label for="floatingInput">Nom</label>
        </div>

        <div class="form-floating">
        <select class="form-select" name="sexe">
            <option value="M">Masculin</option>
            <option value="F">Feminin</option>
        </select>
        <label for="floatingInput">Sexe</label>
        </div>

        <div class="form-floating">
        <input type="text" class="form-control" placeholder="service" name="service" required="required">
        <label for="floatingInput">Service</label>
        </div>

        <div class="form-floating">
        <input type="number" class="form-control" placeholder="salaire" name="salaire" required="required">
        <label for="floatingInput">Salaire</label>
        </div>
        <button type="submit" class="btn btn-primary" name='send'>Submit</button>
        <button type="reset" class="btn btn-primary" name='reset'>Reset</button>
    </form>
    <?php doubleBr()?>
    <a href="./index.php">aller a index.php</a>
</main>

<?php doubleBr() ?>

<?php include "footer.php"?>    
</body>
</html> 
<?php
}elseif($table == "bibliotheque"){
    require ('accesBDD.php');

    if(isset($_POST['send'])){
        setAbonne($_POST['prenom'],$_POST['nom'],$_POST['email']);
    }
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.min.css">
        <link rel="stylesheet" href="/style.css">
        <title>Document</title>
    </head>
    <body>
        <?php include "fonction.php"?>
        <?php include "header.php"?>
        <?php
        doubleBr();
    
        ?>
    
    <main>
    <!-- formulaire d'insertion nom prenom service .... -->
        <form action="" method="post">
    
            <div class="form-floating">
            <input type="text" class="form-control" placeholder="prenom" name="prenom" required="required">
            <label for="floatingInput">Prenom</label>
            </div>
    
            <div class="form-floating">
            <input type="text" class="form-control" placeholder="nom" name="nom" required="required">
            <label for="floatingInput">Nom</label>
            </div>
        
            <div class="form-floating">
            <input type="text" class="form-control" placeholder="email" name="email" required="required">
            <label for="floatingInput">Email</label>
            </div>
            </div>
            <button type="submit" class="btn btn-primary" name='send'>Submit</button>
            <button type="reset" class="btn btn-primary" name='reset'>Reset</button>
        </form>
        <?php doubleBr()?>
        <a href="./index.php">aller a index.php</a>
    </main>
    
    <?php
        doubleBr();
    
    ?>
    
    <?php include "footer.php"?>    
    </body>
    </html>
<?php  
}
?>

