<?php

class BDD
{
    public function requete($requete, $valeurs = [])
    {
        $connexion = new PDO("mysql:host=" . SERVERNAME . "; dbname=" . DBNAME, USERNAME, PASSWORD);
        $preparation = $connexion->prepare($requete);
        $preparation->execute($valeurs);

        return $preparation->fetchAll(PDO::FETCH_ASSOC);
    }
}