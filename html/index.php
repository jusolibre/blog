<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Blog</title>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../css/blog.css" /> </head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>Poster un nouveau billet de blog</h1>
                <form action="edit.php" method="post">
                    <div class="form-group">
                        <label for="titre">Titre: </label>
                        <input type="text" name="titre" id="titre" class="form-control"> </div>
                    <div class="form-group">
                        <label for="auteur">Auteur: </label>
                        <input type="text" name="auteur" id="auteur" class="form-control"> </div>
                    <div class="form-group">
                        <label for="contenu">contenu: </label>
                        <textarea type="text" name="contenu" id="contenu" class="form-control" rows="3" cols="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Date au format annee-mois-jj: </label>
                        <input type="date" name="date" id="date" class="form-control"> </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
        <hr>
        <?php         
try
{
   // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
// En cas d'erreur, on affiche un message et on arrête tout
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
            }
        
// On récupère le contenu de la table articles
$reponses = $bdd->query('SELECT * FROM articles');
        

foreach($reponses as $reponse){
?>
            <div class="row">
                <div class="col-md-1">
                    <h3><?php echo $reponse['titre']; ?></h3></div>
                <div class="col-md-6">
                    <p>
                        <?php echo $reponse['contenu']; ?>
                    </p>
                </div>
                <div class="col-md-">
                    <p>Ècrit par:
                        <?php echo $reponse['auteur']; ?>
                    </p>
                </div>
                <div class="col-md-2">
                    <p>Paru le:
                        <?php echo $reponse['date_parution']; ?>
                    </p>
                </div>
            </div>
            <hr>
            <?php    
}
    ?>
    </div>
</body>

</html>