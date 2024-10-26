<?php
try{

  $mysqlclient = new PDO('mysql:host=localhost;dbname=b2dev2projet;charset=utf8', 'root', 'root', 
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

}
catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}

function ajoutCategorie($mysqlclient, $categorieNew){
  $sqlQuery = "INSERT INTO categories(titre) VALUES(:titre)";
  $insertCategorie = $mysqlclient->prepare($sqlQuery);
  $insertCategorie->execute([
    'titre' => $categorieNew['titre'],
  ]);
}
function categoriesAll($mysqlclient){
  $sqlQuery = 'SELECT * FROM categories ORDER BY titre ASC';
  $categories = $mysqlclient->prepare($sqlQuery);
  $categories->execute();
  return $categories->fetchAll();
}

function categorieSelect($mysqlclient, $id){
  $sqlQuery = 'SELECT * FROM categories WHERE id = '.$id.'';
  $categorie = $mysqlclient->prepare($sqlQuery);
  $categorie->execute();
  return $categorie->fetch(PDO::FETCH_ASSOC);

}

function produitsParCategorie($mysqlclient, $categorie_id) {
  $query = $mysqlclient->prepare("SELECT * FROM produits WHERE categorie = ?");
  $query->execute([$categorie_id]);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}


function  categorieUpdate($mysqlclient,$categorieUpdate){
  $sqlQuery = 'UPDATE categories SET titre = :titre WHERE id = :id ';
  $updateCategorie = $mysqlclient->prepare($sqlQuery);
  $updateCategorie->execute([
    'id' => $categorieUpdate['id'],
    'titre'=> $categorieUpdate['titre']
  ]);
}

function  categorieSuppr($mysqlclient, $id){
  $sqlQuery = 'DELETE FROM categories WHERE id ='.$id.'';
  $categorie = $mysqlclient->prepare($sqlQuery);
  $categorie->execute();
}


if(isset($_GET['id']) && is_numeric($_GET['id']) && !empty($_GET['id'])){
  $categorieSelect = categorieSelect($mysqlclient, $_GET['id']);
}


if(isset($_POST) && !empty($_POST)){
  if(isset($_POST['id']) && !empty($_POST['id'])){
    if(isset($_POST['suppr']) && !empty($_POST['suppr'])){
      $id = $_POST['id'];
      categorieSuppr($mysqlclient, $id);      

    }else{
      $categorieUpdate = $_POST;
      categorieUpdate($mysqlclient,$categorieUpdate);
    }

  }else{
    $categorieNew = $_POST;
    ajoutCategorie($mysqlclient,$categorieNew);
  }
}