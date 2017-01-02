<!DOCTYPE html>
<html>
<head>
	<title>form</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

</head>
<body>


	<form classs="form-group" action="test.php" method="get" name="formulaire">
		Auteur: <input type="text" name="auteur" /><br/>
		Titre: <input type="text" name="titre" /><br/>
		contenu: <textarea name="contenu" rows="10" cols="50"></textarea><br/>
		<input type="submit" value="envoyer"/>
	</form>



	<?php

	$auteur = (isset($auteur)) ? $_GET['auteur'] : null;
	$titre = (isset($titre)) ? $_GET['titre'] : null;
	$contenu = (isset($contenu)) ? $_GET['contenu'] : null;

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

		if (isset($_GET['auteur'])) {    
			$auteur = htmlspecialchars($_GET['auteur']);
		}


		if (isset($_GET['titre'])) {
			$titre = htmlspecialchars($_GET['titre']);
		}
		if (isset($_GET['contenu'])) {
			$contenu = htmlspecialchars($_GET['contenu']);
		}
// On ajoute une entrée dans la table avec une requête préparé et en utilisant des marqueurs auteurinatifs.

		$req = $bdd->prepare('INSERT INTO article(auteur, titre, contenu, date_parution) VALUES(:auteur, :titre, :contenu, NOW() )');

		$err = $req->execute(array(
			"auteur" => $auteur,
			"titre" => $titre,
			"contenu" => $contenu,
			));

		echo 'contenu bien envoyé !';

		$req->closeCursor();

	?>

	</body>
	</html>


