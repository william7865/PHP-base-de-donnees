<?php include_once "fonctions/fonctionsproduits.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edition</title>
</head>
<body>
<h1>Formulaire d'édition</h1>

<?php
if($produitSelect){ ?>
<form action="produits.php" method="POST">
  <input type="hidden" name="id" value="<?=$produitSelect['id']?>">
  <input type="titre" name="titre" id="nom" placeholder="titre" value="<?=$produitSelect['titre']?>">
  <input type="text" name="description" id="description" placeholder="description" value="<?=$produitSelect['description']?>">
  <input type="number" name="prix" id="prix" placeholder="prix" value="<?=$produitSelect['prix']?>">
  <input type="number" name="categorie" id="categorie" placeholder="categorie" value="<?=$produitSelect['categorie']?>">


  <input type="submit" value="envoyer">
</form>
<?php
}

?>
  
</body>
</html>