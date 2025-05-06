<?php
class GestionnairePages {

    /*
    OK - Lister toutes les pages existantes
    OK - instancier des pages
    OK - récupérer des données relatives aux pages en BDD
    - créer / donner accès à la page que l'on est en train de consulter en tant que visiteur
    */
    private $pages;
    private $id_page_actuelle;

    public function __construct() {
        $this->listePages(); // Maj automatique de la propriété $this->pages

        if (isset($_GET["id"])) {
            $this->id_page_actuelle = $_GET["id"];
        } else { // Sinon (cas par défaut - A OPTIMISER ! - par exemple fournir une page 404)
            $this->id_page_actuelle = 1;
        }

        // + id_page_actelle 

    }

    public function creerpages($nouvel_id, $nouveau_titre, $nouveau_contenu) {
        $page = new Page($nouvel_id, $nouveau_titre ,$nouveau_contenu);

        return $page;
    }

    public function listePages() {
        
        $bdd = new BDD();
        $donnees_pages = $bdd->recuperer_pages();

        $pages = [];
        foreach ($donnees_pages as $la_donnée){
            // $pages[] = $this->creerpages($la_donnée["id"], $la_donnée["titre"], $la_donnée["contenu"]);
            array_push($pages, $this->creerpages($la_donnée["id"], $la_donnée["titre"], $la_donnée["contenu"]));
        }
        $this->pages = $pages;
        return $pages;

        
    }

    public function obtenir_page_actuelle(){
        return $this->obtenir_page_selon_id($this->id_page_actuelle);
    }

    public function afficher_menu (){
        
        foreach($this->pages as $la_page) {

            if ($la_page->getID() == $this->id_page_actuelle) {
                // Le lien à créer concerne la page déjà affichée
                $ajout_classe = "class='actuel'";
            } else {
                $ajout_classe = ""; // On n'ajoutera pas d'attribut class
            }

            echo "<li><a $ajout_classe href='index.php?id=" . $la_page->getID() . "'>" . $la_page->getTitre() . "</a></li>";

        }
    }

    public function afficher_liste_admin (){
        
        foreach($this->pages as $la_page) {

            echo "<li><a href='editeur.php?id=" . $la_page->getID() . "'>" . $la_page->getTitre() . "</a> 
             <a href='traitement_delete_page.php?id=" . $la_page->getID() . "'><button style='padding: 3px; background-color: red' id='delete_button'>Supprimer la page</button></a>
            </li>";
// <form name='delete_form' action='traitement_delete_page.php?id=" . <?php $_GET['id']; ? . "' method='POST'>
//                 <input type='hidden' name='delete'>
//                 <input id='delete_button' type='button' value='Supprimer la page'>
//             </form>

        }
    }

    function obtenir_page_selon_id($id_a_chercher) {
    
        foreach($this->pages as $la_page) {
            if ($la_page->getID() == $id_a_chercher) {
                return $la_page; 
            }
        }
    
        // Cas par défaut (A OPTIMISER - par exemple fournir une page 404)
        return $this->pages[0];
    
    }
}