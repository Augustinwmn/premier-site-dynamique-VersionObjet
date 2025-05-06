<?php

require("config.php");

require("classes/bdd.class.php");
require("classes/page.class.php");
require("classes/gestionnairepages.class.php");


// On demande au gestionnaire toutes les informations concernant la page a afficher
$gestionnaire = new GestionnairePages();

$page_a_afficher = $gestionnaire->obtenir_page_actuelle();




// on pourrait aussi utiliser include() à la place de require() - dans ce cas, si le fichier à inclure n'est pas trouvé, le reste de la page tente quand même de s'afficher / s'exécuter
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
            <div style="display: flex; justify-content: end; width: 100%">
                <a href="admin" class="connexion"><button>Sign in</button></a>
            </div>
                <h1><?php echo TITRE_DU_SITE; ?></h1>

            <nav>

                <ul>
                    <?php
                    $gestionnaire->afficher_menu()
                        ?>
                </ul>
            </nav>
        </header>

        <main>

            <section>

                <div class="centrage">

                    <h2><?php echo $page_a_afficher->getTitre(); ?></h2>

                    <?php echo nl2br($page_a_afficher->getContenu()); ?>

                </div>

            </section>

        </main>

        <footer>

            <p>Ceci est un pied de page</p>
            <!-- Ne change pas selon la page, mais pourrait être intéressant à administrer -->

        </footer>

    </body>

</html>