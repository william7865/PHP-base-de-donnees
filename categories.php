<?php include_once "fonctions/fonctionscategories.php"; ?>
<?php include_once "header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/categorie.css">
    <title>Document</title>
</head>
<body>

<h1>Formulaire pour les catégories</h1>
<form action="categories.php" method="POST" class="form-container">
    <h2>Catégories</h2>
    <input type="text" name="titre" id="titre" placeholder="Veuillez ajouter un nom de catégorie">
    <input type="submit" value="Envoyer">
</form>

<?php 
  $categories = categoriesAll($mysqlclient);
  if(count($categories) > 0) {
    foreach($categories as $key => $categorie) { ?>
        <div class="category">
        <h2>Catégorie : <?php echo $categorie['id'].' | '.$categorie['titre']; ?></h2>
        <div class="category-actions">
            <a href="editcategorie.php?id=<?=$categorie['id']?>" class="edit-categorie">Editer</a>
            <a href="suppressioncategories.php?id=<?=$categorie['id']?>" class="delete-categorie">Supprimer<a>
        </div>
<?php 
    $produits = produitsParCategorie($mysqlclient, $categorie['id']);
        if (count($produits) > 0) { 
            foreach($produits as $produit) { ?>
                <div class="product">
                    <h3>Produit : <?php echo $produit['titre']; ?></h3>
                    <p>Description : <?php echo $produit['description']; ?></p>
                    <p>Prix : <?php echo $produit['prix']; ?> €</p>
                <div class="product-actions">
                    <a href="editproduit.php?id=<?=$produit['id']?>" class="edit-produit">Editer</a> | 
                    <a href="suppressionproduits.php?id=<?=$produit['id']?>" class="delete-produit">Supprimer</a>
                </div>
                </div>
                <?php } 
            } else {
                echo "<p>Aucun produit dans cette catégorie</p>";
            } ?>
        </div>
    <?php }
  } else {
    echo "<p>Pas de catégorie inscrite</p>";
  }
?>
</body>
</html>
