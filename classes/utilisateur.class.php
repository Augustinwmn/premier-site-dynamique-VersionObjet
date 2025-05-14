<?php
class Utilisateur {
    
    private $id;
    private $nom;
    private $mdp;

    public function __construct($nouvel_id, $nouveau_nom){
        $this->id = $nouvel_id;
        $this->nom = $nouveau_nom;
    }
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    
}