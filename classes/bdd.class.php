<?php

class BDD {

    /* 
    - Etablir une connexion à la BDD
    - Envoyer des requêtes à la BDD
    - Récuperer des données de la BDD
    */
    public function requete($requete) {


        //On établit la connexion
        $connexion = new PDO("mysql:host=" . SERVERNAME ."; dbname=". DBNAME, USERNAME, PASSWORD);
        // On prépare puis exécute la requête (envoi vers la BDD)
        $preparation = $connexion->prepare($requete);
        $preparation->execute();

        // On récupère le résultat / la réponse de la BDD
        return $preparation->fetchAll(PDO::FETCH_ASSOC);

    }

    public function recuperer_pages(){
        return $this->requete ("SELECT * FROM `pages`");

    }   

}