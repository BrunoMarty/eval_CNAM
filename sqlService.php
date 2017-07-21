<?php

$dsn = 'mysql:dbname=CNAM;host=127.0.0.1'; // on declare une variable avec le nom et l'hote de la base de données
$user = 'root'; // on declare une variable avec le nom d'utilisateur de la base de données 
$password = 'root'; // on declare une variable avec le mot de passe de la base de données 

$request = $_POST['msg']; // on récupère dans une variable le contenu de la variable msg envoyé en POST via l'ajax

try { // on test la connexion à la base de données
    $dbh = new PDO($dsn, $user, $password); // on fait la connexion
} catch (PDOException $e) { // si il y a une erreur
    echo 'Connexion �chou�e : ' . $e->getMessage();// on affiche l'erreur
}

$sth = $dbh->prepare($request); //on prépare une requête à l'exécution et retourne un objet
$sth->execute(); // on lance la requete
$result = $sth->fetchAll(); // on récupère le resultat de la requiete dans une variable result

$dbh =null; // on se deconnecte de la base de données	
	
echo json_encode($result); // on renvoi le contenu de la variable $result au format JSON
?>