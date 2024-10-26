<?php include_once "fonctions/fonctionscategories.php";?>

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
if($categorieSelect){ ?>
<form action="categories.php" method="POST">
  <input type="hidden" name="id" value="<?=$categorieSelect['id']?>">
  <input type="titre" name="titre" id="nom" placeholder="titre" value="<?=$produitSelect['titre']?>">
  <input type="submit" value="envoyer">
</form>
<?php
}

?>
  
</body>
</html>