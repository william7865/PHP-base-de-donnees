<?php include_once "fonctions/fonctionscategories.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>Formulaire pour les catégories</p>
<form action="categories.php" method="POST">
    <input type="text" name="titre" id="titre" placeholder="titre">
    <input type="submit" value="envoyer">
</form>

<?php 
  $categories = categoriesAll($mysqlclient);
  if(count($categories) > 0) {
    foreach($categories as $key => $categorie) { ?>
        <h2>Catégorie : <?php echo $categorie['id'].' | '.$categorie['titre']; ?></h2>
        <p><a href="editcategories.php?id=<?=$categorie['id']?>">Editer</a> | <a href="suppressioncategories.php?id=<?=$categorie['id']?>">Supprimer</a></p>

        <?php 
        $produits = produitsParCategorie($mysqlclient, $categorie['id']);
        if (count($produits) > 0) { 
            foreach($produits as $produit) { ?>
                <div>
                    <p>Produit : <?php echo $produit['titre']; ?>,
                    Description : <?php echo $produit['description']; ?>,
                    Prix : <?php echo $produit['prix']; ?> €</p>
                    <p><a href="editproduit.php?id=<?=$produit['id']?>">Editer</a> | <a href="suppressionproduits.php?id=<?=$produit['id']?>">Supprimer</a></p>
                </div>
            <?php } 
        } else {
            echo "<p>Aucun produit dans cette catégorie</p>";
        } ?>
        
<?php
    }
  } else {
    echo "<p>Pas de catégorie inscrite</p>";
  }
?>
</body>
</html>
