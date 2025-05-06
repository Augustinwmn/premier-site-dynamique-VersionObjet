<?php

// Note : Vérifier qu'on a les droits d'accès admin

require("../config.php");

// isset permet de vérifier si une variable existe et n'est pas NULL
// trim permet de supprimer les espaces en début et fin de chaîne
if (isset($_POST["title"]) && isset($_POST["content"]) && trim($_POST["title"])  != "" && trim($_POST["content"]) != "") {

    $id = $_GET["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    //On établit la connexion
    $connexion = new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DBNAME, USERNAME, PASSWORD);

    // On écrit la requête à envoyer
    $requete = "UPDATE `pages` SET `titre` = ?, `contenu` = ? WHERE `id` = ?";

    // On prépare puis exécute la requête (envoi vers la BDD)
    $preparation = $connexion->prepare($requete);
    $preparation->execute([$title, $content, $id]);// Le tableau en paramètre contient, dans le bon ordre des valeurs qui remplaçeront les "?" dans notre schéma de requête
}else{
}

header("Location: index.php");
?>