<?php
class page {
    
    private $id;
    private $titre;
    
    public function __construct($nouvel_id, $nouveau_titre) {
        $this->id = $nouvel_id;
        $this->titre = $nouveau_titre;
    }

    public function getID() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setID($nouvel_id) {
        $this->id = $nouvel_id;
    }

    public function setTitre($nouveau_titre) {
        $this->titre = $nouveau_titre;
    }
}