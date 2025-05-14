<?php

if (!$_SESSION["admin"] = "ok") {
    header("location: ../login.php");
    exit();
}

require("../../config.php");

if (isset($_POST["title"]) && trim($_POST["title"])  != "") {

    $id = $_GET["id"];
    $title = $_POST["title"];

    require("../../classes/bdd.class.php");
    $bdd = new BDD();
    $bdd->requete(
        "UPDATE `pages` SET `titre` = ? WHERE `id` = ?",
        [$title,  $id]
    );
}

header("Location: ../index.php");
?>