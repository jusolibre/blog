<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="html/style.css">
</head>
<body>


	<form id="form" classs="form-group" action="test.php" method="post" name="formulaire">
		<h1>Blog</h1>
		Auteur: <input class="form-control" type="text" name="auteur" /><br/>
		Titre: <input class="form-control" type="text" name="titre" /><br/>
		contenu: <textarea type="text" class="form-control" name="contenu" rows="3"></textarea><br/>
		<button type="submit" class="btn btn-primary">Envoyer</button> 
	</form>



	<?php

	try
	{
	// On se connecte à MySql
		$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
	// En cas d'erreur, on affiche un contenu et on arrête tout
		die('Erreur: Le contenu est pas envoyé');
	}

// On ajoute une entrée dans la table avec une requête préparé et en utilisant des marqueurs auteurinatifs.
	if(isset($_REQUEST['auteur']) && isset($_REQUEST['titre'])&& isset($_REQUEST['contenu'])){
		

		$auteur = $_REQUEST['auteur'];
		$titre = $_REQUEST['titre'];
		$contenu= $_REQUEST['contenu'];



		$req = $bdd->prepare('INSERT INTO article(auteur, titre, contenu, date_parution) VALUES(:auteur, :titre, :contenu, NOW())');

		$req->bindParam(':auteur', $auteur);
		$req->bindParam(':titre', $titre);
		$req->bindParam(':contenu', $contenu);
		$req->execute();
		
		echo "votre formulaire à bien été envoyer";
		
		/*sleep(3);*/

		header('Location: index.php');
		exit();

	}

	?>

</body>
</html>


