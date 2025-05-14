<?php
class GestionnairePages {
    private $pages;
    private $id_page_actuelle;

    public function __construct() {
        $this->listePages(); 

        if (isset($_GET["id"])) {
            $this->id_page_actuelle = $_GET["id"];
        } else { 
            $this->id_page_actuelle = $this->pages[0]->getID(); 
        }

    }

    public function creerpages($nouvel_id, $nouveau_titre) {
        $page = new Page($nouvel_id, $nouveau_titre);

        return $page;
    }

    public function listePages() {
        
        $bdd = new BDD();
        $donnees_pages = $bdd->requete ("SELECT * FROM `pages`");

        $pages = [];
        foreach ($donnees_pages as $la_donnée){
            array_push($pages, $this->creerpages($la_donnée["id"], $la_donnée["titre"]));
        }
        $this->pages = $pages;
        return $pages;
    }

    function obtenir_page_selon_id($id_a_chercher) {
    
        foreach($this->pages as $la_page) {
            if ($la_page->getID() == $id_a_chercher) {
                return $la_page; 
            }
        }
        return false;
    }

    public function obtenir_page_par_default() {
        return $this->pages[0];
    }

    public function obtenir_page_actuelle(){
        return $this->obtenir_page_selon_id($this->id_page_actuelle);
    }

    public function afficher_menu (){
        
        foreach($this->pages as $la_page) {

            if ($la_page->getID() == $this->id_page_actuelle) {
                $ajout_classe = "class='actuel'";
            } else {
                $ajout_classe = "";
            }

            echo "<li><a $ajout_classe href='index.php?id=" . $la_page->getID() . "'>" . $la_page->getTitre() . "</a></li>";

        }
    }

    public function afficher_liste_admin (){
        
        foreach($this->pages as $la_page) {

            echo "<li><a href='editeur_page.php?id=" . $la_page->getID() . "'>" . $la_page->getTitre() . "</a>";

        }
    }

}