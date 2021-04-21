<?php
require_once '../Classes/DB.php';
require_once '../Classes/Connexion.php';

//We get the PDO connection of the DB class
// On obtient la connexion PDO de la classe DB
$db = new DB();
$link = $db->getDbLink();

//Function selection depending on the user's click
// Sélection des fonctions en fonction du clic de l'utilisateur
if (isset($_POST['buttonValidateC'])) {
    $conn = new Connexion($link);
    $conn->Connect($_POST["pseudo"], $_POST["password"]);
} elseif (isset($_POST['buttonValidateI'])) {

    //Verification if the user has checked the box of acceptance of the general conditions of use
    //Vérification si l'utilisateur a coché la case d'acceptation des conditions générales d'utilisation
    if (isset($_POST['acceptCheckBox'])) {
        $inscr = new Connexion($link);
        $inscr->Inscription($_POST["pseudoInscript"], $_POST["emailInscript"], $_POST["passwordInscript"], $_POST["passwordConfirmInscript"]);
    } else {
        header("Location: ../connect.php?error=Merci d'accepter les conditions générales d'utilisation avant de vous inscrires !");
    }
}