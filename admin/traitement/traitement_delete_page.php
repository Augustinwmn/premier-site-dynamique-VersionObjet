<?php

if (!$_SESSION["admin"] = "ok") {
    header("location: ../login.php");
    exit();
}

require("../../config.php");

if (isset($_GET["id"]) && isset($_POST["delete"]) && trim($_GET["id"])  != "") {

    $id = $_GET["id"];

    
    require("../../classes/bdd.class.php");
    $bdd = new BDD();
    $bdd->requete(
        "DELETE FROM `pages` WHERE `pages`.`id` = ?", 
        [$id]);
}

header("Location: ../index.php");
?>