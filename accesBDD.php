<?php

function connexionBDD()
{
	try
	{		
	$bdd = new PDO('mysql:host=localhost;port=3306;dbname=entreprise2;', 'root', '',[
		PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
	]);
	}
	
	catch(Exception $e)
	{
		echo 'Erreur:'.$e->getMessage();
    }
	return $bdd;
	
}

function getEmployes(){

	$bdd = connexionBDD();

	$sql = 'SELECT * FROM employes';

	$reponse = $bdd->query($sql);

	$result = $reponse->fetchAll();

	return $result;
}

function setEmployes($prenom,$nom,$sexe,$service,$salaire){
	
	$bdd = connexionBDD();

	$sql = "INSERT INTO employes(prenom,nom,sexe,service,salaire) VALUE ('".$prenom."'".",". "'".$nom."'".",". "'".$sexe."'".",". "'".$service."'".","."'".$salaire."'".")";

	$reponse = $bdd->exec($sql);

	if($reponse==false)
	{
		echo "les information a pas été ajouté!";
	}
	else
	{
		echo "les information ont bien été ajouté !";
	}
}


function updateEmployes($prenom,$nom,$sexe,$service,$salaire, $id){
		
	$bdd = connexionBDD();

	$sql = "UPDATE employes SET prenom ='$prenom', nom ='$nom', sexe ='$sexe', service ='$service', salaire ='$salaire' WHERE id_employes=".$id ;

	$reponse = $bdd->exec($sql);
		
		if($reponse==false)
		{
			echo "les information a pas été modifié !";
		}
		else
		{
			echo "les information ont bien été modifié !";
		}
}

function get1Employe($id){

	$bdd = connexionBDD();

	$sql = 'SELECT * FROM employes WHERE id_employes ='.$id;

	$reponse = $bdd->query($sql);

	$result = $reponse->fetch();

	return $result;
}

function deleteEmployes($id){

	$bdd = connexionBDD();

	$sql = 'DELETE FROM employes WHERE id_employes ='.$id;

	$reponse = $bdd->query($sql);
}












function connexionBDD2()
{
	try
	{		
	$bdd = new PDO('mysql:host=localhost;port=3306;dbname=bibliotheque;', 'root', '');
	}
	
	catch(Exception $e)
	{
		echo 'Erreur:'.$e->getMessage();
    }
	return $bdd;
	
}

function getAbonne(){

	$bdd = connexionBDD2();

	$sql = 'SELECT * FROM abonne';

	$reponse = $bdd->query($sql);

	$result = $reponse->fetchAll();

	return $result;
}

function getForConnexion($email){

	$bdd = connexionBDD2();

	$sql = 'SELECT * FROM abonne WHERE email = '. "'".$email."'";

	$reponse = $bdd->query($sql);

	$result = $reponse->fetch();

	return $result;

}

function setAbonne($prenom,$nom,$email){
	
	$bdd = connexionBDD2();

	$sql = "INSERT INTO abonne(prenom,nom,email) VALUE ('".$prenom."'".",". "'".$nom."'".",". "'".$email."'".")";

	$reponse = $bdd->exec($sql);

	if($reponse==false)
	{
		echo "les information a pas été ajouté!";
	}
	else
	{
		echo "les information ont bien été ajouté !";
	}
}

function setEmployesPhoto($prenom,$nom,$email,$password){
	
	$bdd = connexionBDD2();

	$sql = "INSERT INTO abonne(nom,prenom,email,password) VALUE ('".$nom."'".",". "'".$prenom."'".",". "'".$email."'".",". "'".$password."'".")";

	$reponse = $bdd->exec($sql);

	if($reponse==false)
	{
		echo "les information a pas été ajouté!";
	}
	else
	{
		echo "les information ont bien été ajouté !";
	}
}


/* function updateEmployes($prenom,$nom,$sexe,$service,$salaire, $id){
		
	$bdd = connexionBDD();

	$sql = "UPDATE employes SET prenom ='$prenom', nom ='$nom', sexe ='$sexe', service ='$service', salaire ='$salaire' WHERE id_employes=".$id ;

	$reponse = $bdd->exec($sql);
		
		if($reponse==false)
		{
			echo "les information a pas été modifié !";
		}
		else
		{
			echo "les information ont bien été modifié !";
		}
}

function get1Employe($id){

	$bdd = connexionBDD();

	$sql = 'SELECT * FROM employes WHERE id_employes ='.$id;

	$reponse = $bdd->query($sql);

	$result = $reponse->fetch();

	return $result;
}

function deleteEmployes($id){

	$bdd = connexionBDD();

	$sql = 'DELETE FROM employes WHERE id_employes ='.$id;

	$reponse = $bdd->query($sql);
} */