<?php include_once "fonctions/fonctions.php";?>
<?php include_once "header.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/index.css">
  <title>Document</title>
</head>
<body>
<h1>Base de données</h1>
<form action="index.php" method="POST">
<h2>Formulaire pour les utilisateurs</h2>
  <input type="text" name="nom" id="nom" placeholder="nom">
  <input type="text" name="prenom" id="prenom" placeholder="prenom">
  <input type="number" name="age" id="age" placeholder="age">
  <input type="submit" value="Envoyer">
</form>

<h2>Liste des users</h2>

<?php 
  $users = userAll($mysqlclient);

  if( count($users) > 0){
    foreach($users as $key => $user){ ?>
        <p><?php echo $user['id'].' | '.$user['nom'].' | '.$user['prenom'].' | '.$user['age'].' ans ';  ?></p>
        <p><a href="edit.php?id=<?=$user['id']?>">Editer</a> | <a href="suppression.php?id=<?=$user['id']?>">Supprimer</a></p>
<?php
    }

  }else{
    echo "<p>Pas d'utilisateurs inscrit</p>";
  }

?>
<?php include_once "footer.php";?>
</body>
</html>