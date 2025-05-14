<?php

class GestionnaireVideos
{

    private $videos;
    private $id_video_actuelle;

    public function __construct()
    {
        $this->listevideos();

        if (isset($_GET["id"])) {
            $this->id_video_actuelle = $_GET["id"];
        } else {
            $this->id_video_actuelle = $this->videos[0]->getID();
        }
    }

    public function creervideo($nouvel_id, $nouveau_titre, $nouvelle_description, $nouvelle_id_youtube)
    {
        $video = new Video($nouvel_id, $nouveau_titre, $nouvelle_description, $nouvelle_id_youtube);

        return $video;
    }

    public function listevideos()
    {
        $bdd = new BDD();
        $donnees_videos = $bdd->requete("SELECT * FROM `playlist`");

        $videos = [];
        foreach ($donnees_videos as $la_donnée) {
            array_push($videos, $this->creervideo(
                nouvel_id: $la_donnée["id"], 
                nouveau_titre: $la_donnée["titre"], 
                nouvelle_description: $la_donnée["description"], 
                nouvelle_id_youtube: $la_donnée["id_youtube"]));
        }
        $this->videos = $videos;
        return $videos;
    }

    public function afficher_liste_admin()
    {
        foreach ($this->videos as $la_video) {
            echo "<li><a href='editeur_video.php?id=" . $la_video->getID() . "'>" . $la_video->getTitre() . "</a></li>";
        }
    }

    public function obtenir_video_selon_id($id_a_chercher)
    {
        foreach ($this->videos as $la_video) {
            if ($la_video->getID() == $id_a_chercher) {
                return $la_video;
            }
        }

        return false;
    }

    public function obtenir_video_actuelle()
    {
        return $this->obtenir_video_selon_id($this->id_video_actuelle);
    }
}