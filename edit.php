<?php include_once "fonctions/fonctions.php";?>

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
if($userSelect){ ?>
<form action="index.php" method="POST">
  <input type="hidden" name="id" value="<?=$userSelect['id']?>">
  <input type="text" name="nom" id="nom" placeholder="nom" value="<?=$userSelect['nom']?>">
  <input type="text" name="prenom" id="prenom" placeholder="prenom" value="<?=$userSelect['prenom']?>">
  <input type="number" name="age" id="age" placeholder="age" value="<?=$userSelect['age']?>">

  <input type="submit" value="envoyer">
</form>
<?php
}

?>
  
</body>
</html>