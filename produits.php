<?php include_once "fonctions/fonctionsproduits.php"; ?>
<?php include_once "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/produit.css">
    <title>Document</title>
</head>

<body>

<h1>Formulaire pour les produits</h1>
<form action="produits.php" method="POST">
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" placeholder="Titre" required>
    
    <label for="description">Description</label>
    <input type="text" name="description" id="description" placeholder="Description" required>
    
    <label for="prix">Prix</label>
    <input type="number" name="prix" id="prix" placeholder="Prix" required>
    
    <label for="categorie">ID Catégorie</label>
    <input type="number" name="categorie" id="categorie" placeholder="ID Catégorie" required>
    
    <input type="submit" value="Envoyer">
</form>

<?php 
  $produits = produitAll($mysqlclient);
  
  // Vérification de la présence de produits
  if (count($produits) > 0) { ?>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Prix</th>
                <th>ID Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit) { ?>
                <tr>
                    <td><?php echo $produit['id']; ?></td>
                    <td><?php echo $produit['titre']; ?></td>
                    <td><?php echo $produit['description']; ?></td>
                    <td><?php echo $produit['prix']; ?> €</td>
                    <td><?php echo $produit['categorie']; ?></td>
                    <td>
                    <a href="editproduit.php?id=<?php echo $produit['id']; ?>">Editer</a> |
                    <a href="suppressionproduits.php?id=<?php echo $produit['id']; ?>">Supprimer</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
<?php
    } else {
    echo "<p>Pas d'utilisateurs inscrit</p>";
  }
?>
</body>
</html>