<?php include_once "fonctions/fonctionsproduits.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>Formulaire pour les produits</p>
<form action="produits.php" method="POST">
    <input type="titre" name="titre" id="titre" placeholder="titre">
    <input type="text" name="description" id="description" placeholder="description">
    <input type="number" name="prix" id="prix" placeholder="prix">
    <input type="number" name="categorie" id="categorie" placeholder="categorie">
  <input type="submit" value="envoyer">
</form>
<?php 
  $produits = produitAll($mysqlclient);
  if( count($produits) > 0){
    foreach($produits as $key => $produit){ ?>
        <p><?php echo $produit['id'].' | '.$produit['titre'].' | '.$produit['description'].' | '.$produit['prix'].' € ';  ?></p>
        <p><a href="editproduit.php?id=<?=$produit['id']?>">Editer</a> | <a href="suppressionproduits.php?id=<?=$produit['id']?>">Supprimer</a></p>
<?php
    }

  }else{
    echo "<p>Pas de produit inscrit</p>";
  }

?>
</body>
</html>