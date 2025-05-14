<?php

class GestionnaireUtilisateur{
    private $utilisateur_actuel;

    public function verification_admin (){

            session_start();
        if ($_SESSION["admin"] != "ok") {
            header("location: login.php");
            exit();
        }else{
            $this->utilisateur_actuel = new Utilisateur($_SESSION["id_admin"], $_SESSION["nom_admin"]);
        }
    }

    public function getUtilisateurActuel(){
        return $this->utilisateur_actuel;
    }

    public function setUtilisateurActuel($utilisateur_actuel){
        $this->utilisateur_actuel = $utilisateur_actuel;
    }
}