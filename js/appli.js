
//Affichage de la fenêtre de connexion
var connectWindow = document.getElementById("se-connecter");
if (connectWindow !== null) {
    connectWindow.addEventListener("click", function() {
        document.getElementById("seConnecter").style.display = "block";
        document.body.style.backgroundColor = "grey";
    });
}

// Début vérification infos création compte avant envoi
var formInscription = document.querySelector("#formulaireInscription > div > form");

var messagePseudo = document.getElementById("alertPseudo");
var messageEmail = document.getElementById("alertEmail");
var messagePass = document.getElementById("alertPassword");
var messageVerifPass = document.getElementById("alertVerifPassword");

if (formInscription !== null) {
    
    formInscription.addEventListener("submit", function (e) {
            
        e.preventDefault();
            
        var userCreate = document.getElementById("pseudo").value;
        var emailCreate = document.getElementById("email").value;
        var mdpValue = document.getElementById("password").value;
        var verifMdpValue = document.getElementById("verifPassword").value;

        var regexSpec = Object.create(Regex);
        regexSpec.init(/\W+/, mdpValue);
        
        var regexChiffre = Object.create(Regex);
        regexChiffre.init(/\d+/, mdpValue);
        
        var dataSend = 'pseudo='+ userCreate + '&email=' + encodeURIComponent(emailCreate);
        var ajaxPostCreate = Object.create(AjaxPost);
        
        ajaxPostCreate.init("index.php?action=verifCreateAccount", dataSend, function(reponse) {
  
            console.log("test");
            console.log(dataSend);
            
            if (reponse !== "existUser") {
                console.log("user libre");                   
            } else {
                console.log("user existant");
                messagePseudo.textContent = "Pseudo déjà existant";
                document.getElementById("pseudo").addEventListener("click", function () {
                    messagePseudo.textContent = "";
                });
            }
            if (reponse !== "existEmail") {
                console.log("mail libre"); 
            } else {
                console.log("email existant");
                messageEmail.textContent = "email existe déjà";
                document.getElementById("email").addEventListener("click", function () {
                    messageEmail.textContent = "";
                });
            }
            if (reponse === "valide") {
                console.log("réussi");                
                if (regexSpec.verifier() === true) { 
                    console.log("caractère spécial ok");
                    if (regexChiffre.verifier() === true) { 
                        console.log("chiffre ok");
                        if (mdpValue === verifMdpValue) { 
                            console.log("mdp identique");
                            //formInscription.submit();
                        } else {
                            messageVerifPass.textContent = "Les mots de passe ne sont pas identiques";
                            document.getElementById("verifPassword").addEventListener("click", function () {
                                messageVerifPass.textContent = "";
                                messagePass.textContent = "";
                            });
                        }    
                    } else {
                        messagePass.textContent = "Il faut au minimum un caractère spécial";
                        document.getElementById("password").addEventListener("click", function () {
                            messagePass.textContent = "";
                            messageVerifPass.textContent = "";
                        });
                    }        
                } else {
                    messagePass.textContent = "Il faut au minimum un chiffre"; 
                    document.getElementById("password").addEventListener("click", function () {
                        messagePass.textContent = "";
                        messageVerifPass.textContent = "";
                    });
                }
            }
        });
        ajaxPostCreate.executer();    
    });
}
// Fin vérification infos création compte avant envoi

// Début vérification login connexion
var formConnexion = document.querySelector("#seConnecter > form");

formConnexion.addEventListener("submit", function(e) {
    
    e.preventDefault();
    
    var User = document.getElementById('pseudoConnect').value;
    var Pass = document.getElementById('passwordConnect').value;
    var dataSend = 'pseudoConnect='+ User + '&passwordConnect=' + encodeURIComponent(Pass);
    
    var ajaxPostConnect = Object.create(AjaxPost);
    console.log(ajaxPost);
    
    ajaxPostConnect.init("index.php?action=connectAccount", dataSend, function(reponse) {
    
        console.log("test");
        console.log(dataSend);
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
    ajaxPostConnect.executer();
});
// Fin vérification login connexion