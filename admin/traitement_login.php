<?php

require("../config.php");
require("../classes/utilisateur.class.php");

$id = $_POST["identifiant"];
$mdp = $_POST["mdp"];
// $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

//On établit la connexion
$connexion = new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DBNAME, USERNAME, PASSWORD);

/*** Version avec mdp stocke en clair (à éviter !)***
// On écrit la requête à envoyer
$requete = "SELECT * FROM `utilisateur` WHERE `nom` = ? AND `mdp` = ? ";

// On prépare puis exécute la requête (envoi vers la BDD)
$preparation = $connexion->prepare($requete);
$preparation->execute([$id, $mdp]);// Le tableau en paramètre contient, dans le bon ordre des valeurs qui remplaçeront les "?" dasn notre schéma de requête

$authentification = $preparation->fetchAll(PDO::FETCH_ASSOC);

// var_dump($authentification);

// Il faut qu'il y ait au moins un resultat pour considérer que l'authentification est validée

if (count($authentification) > 0) {
    // echo "Bienvenue $id !";
    session_start();
    $_SESSION["admin"] = "ok";
}*/

/* Version sécurisée (mdp stocké de manière chiffrée) */

$requete = "SELECT * FROM `utilisateur` WHERE `nom` = ? ";
$preparation = $connexion->prepare($requete);
$preparation->execute([$id]);
$authentification = $preparation->fetchAll(PDO::FETCH_ASSOC); // liste de tous les comptes avec un nom d'utilisateur correpondant

// var_dump($authentification);

foreach($authentification as $utlisateur){
    $mdp_de_cet_utilisateur = $utlisateur["mdp"];
    $id_de_cet_utilisateur = $utlisateur["id"];

    if(password_verify($mdp, $mdp_de_cet_utilisateur)){

        // Authentification  de l'admin
        // On sait que son nom est $identifiant et que son id est $id_de_cet_utilisateur:
        $utilisateur_actuel = new Utilisateur($id_de_cet_utilisateur, $id);

        session_start();
        $_SESSION["admin"] = "ok";
        $_SESSION["id_admin"] = $id_de_cet_utilisateur;
        $_SESSION["nom_admin"] = $id;

    }

}

header("location: index.php");

?>