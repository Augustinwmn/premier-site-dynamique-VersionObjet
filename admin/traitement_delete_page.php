<?php

// Note : Vérifier qu'on a les droits d'accès admin

require("../config.php");

if (isset($_GET["id"]) && isset($_POST["delete"]) && trim($_GET["id"])  != "") {

    $id = $_GET["id"];

    //On établit la connexion
    $connexion = new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DBNAME, USERNAME, PASSWORD);

    // On écrit la requête à envoyer
    $requete = "DELETE FROM `pages` WHERE `pages`.`id` = ?";
    
    // On prépare puis exécute la requête (envoi vers la BDD)
    $preparation = $connexion->prepare($requete);
    $preparation->execute([$id]);// Le tableau en paramètre contient, dans le bon ordre des valeurs qui remplaçeront les "?" dans notre schéma de requête
}

header("Location: index.php");
?>