<?php

require("../../config.php");
require("../../classes/utilisateur.class.php");

$id = $_POST["identifiant"];
$mdp = $_POST["mdp"];


require("../../classes/bdd.class.php");
$bdd = new BDD();
$bdd->requete(
    "SELECT * FROM `utilisateur` WHERE `nom` = ?",
    [$id]
);

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

header("location: ../index.php");

?>