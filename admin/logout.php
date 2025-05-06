<?php

// Bloc correspondant à une déconnexion manuelle

session_start();
session_unset(); // Vider le $_SESSION
session_destroy() ; // Supprimer
header("location: ../index.php");

?>