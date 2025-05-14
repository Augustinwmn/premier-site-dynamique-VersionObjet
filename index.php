<?php

require("config.php");

require("classes/bdd.class.php");
require("classes/page.class.php");
require("classes/video.class.php");
require("classes/gestionnairepages.class.php");
require("classes/gestionnairevideos.class.php");

$gestionnaire_p = new GestionnairePages();

if ($gestionnaire_p->obtenir_page_actuelle()) {
    $page_a_afficher = $gestionnaire_p->obtenir_page_actuelle();
} else {
    $page_a_afficher = $gestionnaire_p->obtenir_page_par_default(); 
}

$gestionnaire_v = new GestionnaireVideos();

$videos = $gestionnaire_v->listevideos();

?>

<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo TITRE_DU_SITE . " - " . $page_a_afficher->getTitre(); ?></title>

        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">

    </head>

    <body>

        <header>
            <h1><?php echo TITRE_DU_SITE; ?></h1>

            <nav>

                <ul>
                    <?php
                    $gestionnaire_p->afficher_menu()
                        ?>
                </ul>
            </nav>
        </header>

        <main>

            <section>
                <h2>Playlist</h2>
                <div class="centrage">

                    <?php foreach ($videos as $video): ?>
                        <div class="video-fiche">
                            <h3><?= htmlspecialchars($video->getTitre()) ?></h3>
                            <p><?= htmlspecialchars($video->getDescription()) ?></p>

                            <iframe width="560" height="315"
                                src="https://www.youtube-nocookie.com/embed/<?= htmlspecialchars($video->getUrl()) ?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                            </iframe>
                        </div>
                    <?php endforeach; ?>

                </div>

            </section>

        </main>

        <footer>

            <p>Ceci est un pied de page</p>
            
        </footer>

    </body>

</html>