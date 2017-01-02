<!DOCTYPE html>
<html>
<head>
	<title>form</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

</head>
<body>


	<form classs="form-group" action="test.php" method="post" name="formulaire">
		Auteur: <input class="form-control" type="text" name="auteur" /><br/>
		Titre: <input class="form-control" type="text" name="titre" /><br/>
		contenu: <textarea type="text" class="form-control" name="contenu" rows="3"></textarea><br/>
		<button type="submit" class="btn btn-primary">Envoyer</button> 
	</form>



	<?php

	$auteur = (isset($auteur)) ? $_POST['auteur'] : null;
	$titre = (isset($titre)) ? $_POST['titre'] : null;
	$contenu = (isset($contenu)) ? $_POST['contenu'] : null;

	if(isset($auteur) && isset($titre) && isset($contenu)){
		echo $auteur." ".$titre." ".$contenu;}



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

		if (isset($_POST['auteur'])) {    
			$auteur = htmlspecialchars($_POST['auteur']);
		}


		if (isset($_POST['titre'])) {
			$titre = htmlspecialchars($_POST['titre']);
		}
		if (isset($_POST['contenu'])) {
			$contenu = htmlspecialchars($_POST['contenu']);
		}
// On ajoute une entrée dans la table avec une requête préparé et en utilisant des marqueurs auteurinatifs.

		$req = $bdd->prepare('INSERT INTO article(auteur, titre, contenu, date_parution) VALUES(:auteur, :titre, :contenu, NOW() )');

		$err = $req->execute(array(
			"auteur" => $auteur,
			"titre" => $titre,
			"contenu" => $contenu,
			));

		$req->closeCursor();

	?>

	</body>
	</html>


