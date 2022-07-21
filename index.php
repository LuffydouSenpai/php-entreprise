<?php session_start(); ?>  
<?php
if(!empty($_GET)){
    require ('accesBDD.php');
    $id=$_GET['id_employes'];
    $employes = deleteEmployes($id);
    header("location:index.php");   
}?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <?php include "header.php"?>
    <?php require ("accesBDD.php")?>
    <?php include "fonction.php"?>
    <?php
    $nosEmployes = getEmployes();
    $nosAbonne = getAbonne();
        /* var_dump(getEmployes()); */
    
?>
<main>
    <section class="tableauSection">
        <div class="tableauSide">
            <div class="tableau">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Service</th>
                    <th scope="col">Date Embauche</th>
                    <th scope="col">Salaire</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        foreach ($nosEmployes as $key => $value) {?>
                            <tr class="table-primary">
                                <td><?php echo $value['id_employes']?></td>
                                <td><?php echo $value['prenom']?></td>
                                <td><?php echo $value['nom']?></td>
                                <td><?php echo $value['sexe']?></td>
                                <td><?php echo $value['service']?></td>
                                <td><?php echo $value['date_embauche']?></td>
                                <td><?php echo $value['salaire']?></td>
                                <td><a href="./modifier.php?id_employes=<?= $value['id_employes'] ?>&table=entreprice">Modifier</a></td>
                                <td><a href="index.php?id_employes=<?= $value['id_employes'] ?>&table=entreprice">Delete</a>
                            </tr>    
                            <?php
                        }
                        ?>
                </tbody>
                </table>
            </div>
            <?php doubleBr();?>
            <div>
                <a href="./insertion.php?table=entreprice"><button class="btn btn-primary">Nouvelle insertion</button></a>
            </div>
            <?php doubleBr();?>
            <div class="tableau">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">nom</th>
                    <th scope="col">email</th>
                    <th scope="col">Modifier</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        foreach ($nosAbonne as $key => $value) {?>
                            <tr class="table-primary">
                                <td><?php echo $value['id_abonne']?></td>
                                <td><?php echo $value['prenom']?></td>
                                <td><?php echo $value['nom']?></td>
                                <td><?php echo $value['email']?></td>
                                <td><a href="./modifier.php?id_employes=<?= $value['id_abonne'] ?>&table=bibliotheque">Modifier</a></td>
                                <td><a href="index.php?id_employes=<?= $value['id_abonne'] ?>&table=bibliotheque">Delete</a>
                            </tr>    
                            <?php
                        }
                        ?>
                </tbody>
                </table>
            </div>
            <?php doubleBr();?>
            <div>
                <a href="./insertion.php?table=bibliotheque"><button class="btn btn-primary">Nouvelle insertion</button></a>
            </div>
        </div>    
    </section>
</main>
    <?php include "footer.php"?>
</body>
</html>