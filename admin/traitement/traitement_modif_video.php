<?php

if (!$_SESSION["admin"] = "ok") {
    header("location: ../login.php");
    exit();
}

require("../../config.php");

function extractYoutubeId($url)
{
    if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $url)) {
        return $url;
    }
    if (preg_match('/v=([a-zA-Z0-9_-]{11})/', $url, $matches)) {
        return $matches[1];
    }
    if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
        return $matches[1];
    }
    if (preg_match('/embed\/([a-zA-Z0-9_-]{11})/', $url, $matches)) {
        return $matches[1];
    }
    return false;
}

if (
    isset($_GET["id"])
    && isset($_POST["title"])
    && isset($_POST["url"])
    && isset($_POST["description"])
    && trim($_POST["title"]) != ""
    && trim($_POST["url"]) != ""
    && trim($_POST["description"]) != ""
) {

    $id = $_GET["id"];
    $title = $_POST["title"];
    $url = $_POST["url"];
    $description = $_POST["description"];

    $youtube_id = extractYoutubeId($url);

    if (!$youtube_id) {
        die("L'URL YouTube est invalide.");
    }

    require("../../classes/bdd.class.php");
    $bdd = new BDD();
    $bdd->requete(
        "UPDATE `playlist` SET `titre` = ?, `description` = ?, `id_youtube` = ? WHERE `id` = ?",
        [$title, $description, $youtube_id, $id]
    );

} else {
}

header("Location: ../index.php");
?>