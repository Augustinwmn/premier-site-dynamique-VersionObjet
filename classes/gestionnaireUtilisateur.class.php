<?php

class GestionnaireUtilisateur{
    private $utilisateur_actuel;

    public function verification_admin (){

            session_start(); // Instruction nécessaire avant toutes manipulation de $_SESSION
        if ($_SESSION["admin"] != "ok") {
            header("location: login.php"); // Redirection
            exit(); // Interruption forcée de la suite du script
        }else{
            $this->utilisateur_actuel = new Utilisateur($_SESSION["id_admin"], $_SESSION["nom_admin"]);
            // var_dump($utilisateur_actuel);
        }
    }

    public function getUtilisateurActuel(){
        return $this->utilisateur_actuel;
    }

    public function setUtilisateurActuel($utilisateur_actuel){
        $this->utilisateur_actuel = $utilisateur_actuel;
    }
}