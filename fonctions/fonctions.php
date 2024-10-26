<?php
try{

  $mysqlclient = new PDO('mysql:host=localhost;dbname=b2dev2;charset=utf8', 'root', 'root', 
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

}
catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}

//Ajout un user
function ajoutUser($mysqlclient, $userNew){
  //Ecriture de la requête pour ajouter un utilisateur dans la table user
  $sqlQuery = "INSERT INTO users(nom, prenom, age) VALUES(:nom, :prenom, :age)";
  //Préparation de la requête
  $insertUser = $mysqlclient->prepare($sqlQuery);
  //Ecécution permet d'ajouter l'utilisateur dans la base de données
  $insertUser->execute([
    'nom' => $userNew['nom'],
    'prenom' => $userNew['prenom'],
    'age' => $userNew['age'],
  ]);
}

//Selectionner tous les users
function userAll($mysqlclient){
  $sqlQuery = 'SELECT * FROM users ORDER BY nom ASC';
  $users = $mysqlclient->prepare($sqlQuery);
  $users->execute();
  // Retourne un tableau contenant toutes les lignes d'un jeu d'enregistrements
  return $users->fetchAll();
}


//Selectionner un utilisateur
function userSelect($mysqlclient, $id){
  $sqlQuery = 'SELECT * FROM users WHERE id = '.$id.'';
  $user = $mysqlclient->prepare($sqlQuery);
  $user->execute();
  return $user->fetch(PDO::FETCH_ASSOC);

}


//Modification d'un user
function  userUpdate($mysqlclient,$userUpdate){
  $sqlQuery = 'UPDATE users SET nom = :nom, prenom = :prenom, age = :age WHERE id = :id ';
  $updateUser = $mysqlclient->prepare($sqlQuery);
  $updateUser->execute([
    'id' => $userUpdate['id'],
    'nom' => $userUpdate['nom'],
    'prenom' => $userUpdate['prenom'],
    'age' => $userUpdate['age']
  ]);
}

//Suppression user
function  userSuppr($mysqlclient, $id){
  $sqlQuery = 'DELETE FROM users WHERE id ='.$id.'';
  $user = $mysqlclient->prepare($sqlQuery);
  $user->execute();
}


//Vérification des données transmises dans l'url
if(isset($_GET['id']) && is_numeric($_GET['id']) && !empty($_GET['id'])){
  $userSelect = userSelect($mysqlclient, $_GET['id']);
}


//Vérification des données transmises par le formulaire utilisateur
if(isset($_POST) && !empty($_POST)){
  //On vérifie si l'id est envoyé
  if(isset($_POST['id']) && !empty($_POST['id'])){
    //On vérifie si la suppression est possible ou non
    if(isset($_POST['suppr']) && !empty($_POST['suppr'])){
      $id = $_POST['id'];
      userSuppr($mysqlclient, $id);      

    }else{
      $userUpdate = $_POST;
      userUpdate($mysqlclient,$userUpdate);
    }

  }else{
    $userNew = $_POST;
    ajoutUser($mysqlclient,$userNew);
  }



  //////
  // Créer un menu qui spnt accessible sur toutes les page header, footer
  // base de donnée : créer une table produits
  // id : PK, 
  //titre: varchar(255), 
  //description TEXT, 
  //prix NUMERIC, 
  //categorie INT

   // base de donnée : créer une table categories
  // id : PK, 
  //titre: varchar(255), 

//FAIRE la CRUD de produits et categorie
//Quand je sélectionne une categorie ça doit lister tous les produits de cette catégorie


}