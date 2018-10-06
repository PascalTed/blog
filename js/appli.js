
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

if (formInscription !== null) {
    formInscription.addEventListener("submit", function (e) {
        var mdpValue = formInscription.elements.password.value;
        var verifMdpValue = formInscription.elements.verifPassword.value;
        
        var regexSpec = Object.create(Regex);
        regexSpec.init(/\W+/, mdpValue);
        var regexChiffre = Object.create(Regex);
        regexChiffre.init(/\d+/, mdpValue);

        if (regexSpec.verifier() === true) { 
            console.log("caractère spécial ok");
            if (regexChiffre.verifier() === true) { 
                console.log("chiffre ok");
                if (mdpValue === verifMdpValue) {
                    console.log("on peut envoyer");;
                }else {
                    messageVerifPass.textContent = "Les mots de passe ne sont pas identiques";
                    e.preventDefault();
                }
            } else {
                messagePass.textContent = "Il faut au minimum un chiffre";  
                e.preventDefault();
            }
        } else {
            messagePass.textContent = "Il faut au minimum un caractère spécial";
            e.preventDefault();
        }
    });
}
// Fin vérification mot de passe avant envoi

// Début vérification login connexion
var formConnexion = document.querySelector("#seConnecter > form");

formConnexion.addEventListener("submit", function(e) {
    
    e.preventDefault();
    
    var User = document.getElementById('pseudoConnect').value;
    var Pass = document.getElementById('passwordConnect').value;
    var dataSend = 'pseudoConnect='+ User + '&passwordConnect=' + encodeURIComponent(Pass);
    
    var ajaxPost = Object.create(AjaxPost);
    console.log(ajaxPost);
    
    ajaxPost.init("index.php?action=connectAccount", str, function(reponse) {
    
        console.log("test");
        console.log(str);
        console.log(reponse);

        if (reponse === "noUser") {
            console.log("echoué");
            document.getElementById("erreur").textContent = "Pseudo ou mot de passe incorrect";
        }    
        if (reponse === "noPass") {
            console.log("echoué2");
            document.getElementById("erreur").textContent = "Pseudo ou mot de passe incorrect";
        }
        if (reponse === "valid") {
            console.log("réussi");
            formConnexion.submit();
            }
    });
    ajaxPost.executer();
});
// Fin vérification login connexion