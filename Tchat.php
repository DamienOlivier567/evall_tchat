<?php
session_start();
require_once './Classes/DB.php';

//Creating a $task variable with a default value of list
// Création d'une variable $ task avec une valeur par défaut de list
$task = "list";

//If the GET of task exists then we save the GET task in the variable $task
// Si le GET de la tâche existe alors nous sauvegardons la tâche GET dans la variable $ task
if(isset($_GET['task'])){
    $task = $_GET['task'];
}

//If the $task variable has a precise value then it calls the corresponding function otherwise it displays the messages
// Si la variable $task a une valeur précise alors elle appelle la fonction correspondante sinon elle affiche les messages
if ($task === "write"){
    postMessage();
}
else{
    getMessages();
}

//Function that displays the messages that are stored int the database
// Fonction qui affiche les messages stockés dans la base de données
function getMessages(){
    $db = new DB();
    $request = $db->getDbLink();
    $resultats = $request->query("SELECT message.date_publish, user.pseudo, message.message FROM tchat.message, tchat.user WHERE message.user_fk = user.id ORDER BY date_publish DESC LIMIT 20");
    $messages = $resultats->fetchAll();
    echo json_encode($messages);
}

//Function to record a message in the DB
// Fonction pour enregistrer un message dans le DB
function postMessage(){
    if (!isset($_POST['user_fk']) || !isset($_POST['message'])){
        echo json_encode(["status" => "error", "message" => "Merci de renseigner les champs obligatoire"]);
        return;
    }

    $user_fk = $_POST['user_fk'];
    $message = $_POST['message'];

    $db = new DB();
    $request = $db->getDbLink();
    $query = $request->prepare("INSERT INTO tchat.message SET message = :message, user_fk = :user_fk");
    $query->execute([
        ":message" => $message,
        ":user_fk" => $user_fk
    ]);
}


