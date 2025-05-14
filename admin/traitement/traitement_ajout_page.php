<?php

if (!$_SESSION["admin"] = "ok") {
    header("location: ../login.php");
    exit();
}

require("../../config.php");


if (isset($_POST["title"])&& trim($_POST["title"]) != "") {

    $title = $_POST["title"];
    
    require("../../classes/bdd.class.php");
    $bdd = new BDD();
    $bdd->requete("INSERT INTO `pages` (`id`, `titre`) VALUES (NULL, ?)", [$title]);
}

header("Location: ../index.php");
?>