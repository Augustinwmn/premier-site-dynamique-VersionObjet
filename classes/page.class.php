<?php
class page {
    
    private $id;
    private $titre;
    private $contenu;
    
    public function __construct($nouvel_id, $nouveau_titre, $nouveau_contenu) {
        $this->id = $nouvel_id;
        $this->titre = $nouveau_titre;
        $this->contenu = $nouveau_contenu;
    }

    public function getID() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getContenu() {
        return $this->contenu;
    }


    public function setID($nouvel_id) {
        $this->id = $nouvel_id;
    }

    public function setTitre($nouveau_titre) {
        $this->titre = $nouveau_titre;
    }

    public function setContenu($nouveau_contenu) {
        $this->contenu = $nouveau_contenu;
    }
}