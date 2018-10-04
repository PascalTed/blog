
//Affichage de la fenêtre de connexion
var connectWindow = document.getElementById("se-connecter");
connectWindow.addEventListener("click", function() {
    document.getElementById("seConnecter").style.display = "block";
    document.body.style.backgroundColor = "grey";
});

// Début vérification mot de passe avant envoi
var formInscription = document.querySelector("#formulaireInscription > div > form");
var messagePass = document.getElementById("alertPassword");
var messageVerifPass = document.getElementById("alertVerifPassword");

formInscription.addEventListener("submit", function (e) {
    
    var mdpValue = formInscription.elements.password.value;
    var verifMdpValue = formInscription.elements.verifPassword.value;
    
    var regexSpec = Object.create(Regex);
    regexSpec.init(/\W+/, mdp);
    var regexChiffre = Object.create(Regex);
    regexChiffre.init(/\d+/, mdp);

    if (regexSpec.verifier() === true) { 
        console.log("caractère spécial ok");
        if (regexChiffre.verifier() === true) { 
            console.log("chiffre ok");
            if (mdpValue === verifMdpValue) {
            console.log("mot de passe identique");
            m.textContent = "le mot de passe n'est pas identique";
            }else {
                console.log("on peut envoyer");  
                e.preventDefault();
            }
        } else {
            messageVerifPass.textContent = "il n'y a pas de chiffre";  
            e.preventDefault();
        }
    } else {
        messagePass.textContent = "il n'y a pas de caractère spécial";
        e.preventDefault();
    }
});
// Fin vérification mot de passe avant envoi