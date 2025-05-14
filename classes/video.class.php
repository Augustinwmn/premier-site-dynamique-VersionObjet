<?php

class Video {
    
    private $id;
    private $titre;
    private $description;
    private $id_youtube;
    
    public function __construct($nouvel_id, $nouveau_titre, $nouvelle_description, $nouvelle_id_youtube,) {
        $this->id = $nouvel_id;
        $this->titre = $nouveau_titre;
        $this->description = $nouvelle_description;
        $this->id_youtube = $nouvelle_id_youtube;
    }
    public function getID() {
        return $this->id;
    }
    public function getTitre() {
        return $this->titre;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getUrl() {
        return $this->id_youtube;
    }

    public function setID($nouvel_id) {
        $this->id = $nouvel_id;
    }
    public function setTitre($nouveau_titre) {
        $this->titre = $nouveau_titre;
    }
    public function setDescription($nouvelle_description) {
        $this->description = $nouvelle_description;
    }
    public function setUrl($nouvelle_id_youtube) {
        $this->id_youtube = $nouvelle_id_youtube;
    }
}