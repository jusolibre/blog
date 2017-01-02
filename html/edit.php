<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO articles(titre, auteur, contenu, date_parution) VALUES(?, ?, ?, ?)');
$req->execute(array($_POST['titre'], $_POST['auteur'], $_POST['contenu'], $_POST['date']));
// Redirection du visiteur vers la page du minichat

header('Location: index.php');

?>