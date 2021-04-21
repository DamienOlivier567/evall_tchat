let container = document.getElementById('contains');
let pattern = /^[^ ]+@[^ ]+.[a-z]{2,3}$/;

//Login form
//Formulaire de connexion
let pseudo = document.getElementById('pseudo');
let password = document.getElementById('password');
let btnConnexion = document.getElementById('buttonValidateC');

//Registration Form
//Formulaire d'inscription
let pseudoI = document.getElementById('pseudoInscript');
let emailI = document.getElementById('emailInscript');
let passwordI = document.getElementById('passwordInscript');
let passwordConfirmI = document.getElementById('passwordConfirmInscript');
let btnInscriptionI = document.getElementById('buttonValidateI');
let acceptCB = document.getElementById('acceptCheckBox');

/**
 * Event when the login button is clicked and verification of the login form fields
 * Événement lors du clic sur le bouton de connexion et vérification des champs du formulaire de connexion
 */
btnConnexion.addEventListener("click", function(e){
    if(pseudo.value === "" || password.value === ""){
        e.preventDefault();
        message("Merci de remplir les champs requis");
    }
    else if(pseudo.value.length < 2 || pseudo.value.length > 50 || password.value.length < 6 || password.value.length > 60){
        e.preventDefault();
        message("Votre pseudo ou mot de passe est incorrect");
    }
});

/**
 * Event when clicking on the registration button and verification of the fields of the registration form
 * Evénement lors du clic sur le bouton d'inscription et vérification des champs du formulaire d'inscription
 */
btnInscriptionI.addEventListener('click', function (e){
    if(acceptCB.checked === true){
        if(pseudoI.value === "" || passwordI.value === "" || passwordConfirmI.value === "" || emailI.value === ""){
            e.preventDefault();
            message("Merci de remplir les champs requis !");
        }
        else{
            if(passwordI.value !== passwordConfirmI.value){
                e.preventDefault();
                message("Les mots de passe ne correspondent pas !");
            }
            else if(!emailI.value.match(pattern)){
                e.preventDefault();
                message("Merci de renseigner une adresse e-mail valide !");
            }
            else if (pseudoI.value.length < 5 || pseudoI.value.length > 50 || passwordI.value.length < 6 || passwordI.value.length > 60 || passwordConfirmI.value.length < 6 || passwordConfirmI.value.length > 60){
                e.preventDefault();
                message("Votre pseudo ou votre mot de passe ne comporte pas le nombre de caractères requis !");
            }
        }
    }
    else{
        e.preventDefault();
        message("Merci d'accepter de respecter les autres utilisateurs !");
    }
});

/**
 * Fontion which allows you to create error or success messages!
 * @param message = Message content to display
 * @param type = success or error
 */

/**
 * Fontion qui vous permet de créer des messages d'erreur ou de réussite!
 * @param message = Contenu du message à afficher
 * @param type = succès ou erreur
 */

function message(message, type ="error"){
    let div = document.createElement("div");
    let span = document.createElement("span");
    span.innerHTML = message;
    div.append(span);
    div.className = type;
    div.id = "errorOrSuccess";
    container.prepend(div);
    slideUp(div.id, type)
}

//We add the slideUp animation to the div element that contains the message.
// Nous ajoutons l'animation slideUp à l'élément div qui contient le message.
function slideUp(id, type){
    let timeout = setTimeout(function (){
        let div = document.getElementById(id);
        div.classList = (type + " remove");
        deleteMessage("errorOrSuccess");
        clearTimeout(timeout);

    }, 4500);
}

//Function that deletes the message after 4 seconds
// Fonction qui supprime le message après 4 secondes
function deleteMessage(id){
    let timeout = setTimeout(function (){
        let div = document.getElementById(id);
        div.remove();
        clearTimeout(timeout);
    }, 500);
}