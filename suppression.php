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
  <input type="hidden" name="suppr" value="1">
  <input type="submit" value="La suppression est définitive">
</form>
<?php
}

?>
  
</body>
</html>