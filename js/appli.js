// Début affichage menu

// Font awesome barres
var openMenu = document.getElementById("open-menu");
// Font awesome croix
var closeMenu = document.getElementById("close-menu");

var menu = document.getElementById("menu");

openMenu.addEventListener("click", function() {
    openMenu.style.display = "none";
    closeMenu.style.display = "block";
    menu.style.display = "block";
});

closeMenu.addEventListener("click", function() {
    closeMenu.style.display = "none";
    openMenu.style.display = "block";
    menu.style.display = "none";    
});
    

// media query
var mediaQuery = window.matchMedia("(max-width: 850px)");
mediaQuery.addListener(function(changed) {
    if(mediaQuery.matches) {
        openMenu.style.display = "block";
        menu.style.display = "none";
    } else {        
        closeMenu.style.display = "none";
        openMenu.style.display = "none";
        menu.style.display = "flex";
    } 
});
// Fin affichage menu

// Début affichage de la fenêtre de connexion
var connectWindow = document.getElementById("se-connecter");
if (connectWindow !== null) {
    connectWindow.addEventListener("click", function() {
        
        document.getElementById("seConnecter").style.display = "block";
        document.getElementById("opaque-window").style.display = "block";
        
        
        
        
        
        document.getElementById("opaque-window").addEventListener("click", function() {
        document.getElementById("opaque-window").style.display = "none";
        document.getElementById("seConnecter").style.display = "none";

});
 
    }); }
    var closeWindowLogin = document.getElementById("close-window-login");
    closeWindowLogin.addEventListener("click", function() {
        document.getElementById("seConnecter").style.display = "none";
        document.getElementById("opaque-window").style.display = "none";
    });


var connectWindowToComment = document.getElementById("connect-to-comment");
if (connectWindowToComment !== null) {
    connectWindowToComment.addEventListener("click", function() {
        document.getElementById("seConnecter").style.display = "block";
        document.getElementById("opaque-window").style.display = "block";
    });
}



// Fin affichage de la fenêtre de connexion

// Début vérification infos création compte. Si le pseudo et le mail n'existe pas, le compte est créé
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
                            formInscription.submit();
                        } else {
                            messageVerifPass.textContent = "Les mots de passe ne sont pas identiques";
                            document.getElementById("verifPassword").addEventListener("click", function () {
                                messageVerifPass.textContent = "";
                                messagePass.textContent = "";
                            });
                        }    
                    } else {
                        messagePass.textContent = "Il faut au minimum un chiffre";
                        document.getElementById("password").addEventListener("click", function () {
                            messagePass.textContent = "";
                            messageVerifPass.textContent = "";
                        });
                    }        
                } else {
                    messagePass.textContent = "Il faut au minimum un caractère spécial"; 
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
// Fin vérification infos création compte. Si le pseudo et le mail n'existe pas, le compte est créé

// Début vérification login connexion. Si le pseudo et le mot de passe associé sont exactes, on se connecte
var formConnexion = document.querySelector("#seConnecter > form");

formConnexion.addEventListener("submit", function(e) {
    
    e.preventDefault();
    
    var User = document.getElementById('pseudoConnect').value;
    var Pass = document.getElementById('passwordConnect').value;
    var dataSend = 'pseudoConnect='+ User + '&passwordConnect=' + encodeURIComponent(Pass);
    
    var ajaxPostConnect = Object.create(AjaxPost);
    
    ajaxPostConnect.init("index.php?action=connectAccount", dataSend, function(reponse) {
    
        console.log("test");
        console.log(dataSend);
        console.log(reponse);

        if (reponse === "noUser") {
            console.log("echoué");
            document.getElementById("pseudo-pass-alert").textContent = "Pseudo ou mot de passe incorrect";
        }    
        if (reponse === "noPass") {
            console.log("echoué2");
            document.getElementById("pseudo-pass-alert").textContent = "Pseudo ou mot de passe incorrect";
        }
        if (reponse === "valid") {
            console.log("réussi");
            formConnexion.submit();
            }
    });
    ajaxPostConnect.executer();
});
// Fin vérification login connexion. Si le pseudo et le mot de passe associé sont exactes, on se connecte

// Début vérification textarea "Laisser un commentaire"
var formTextComment = document.getElementById("form-add-comment");
var noComment = document.getElementById("no-comment");
var textAreaComment = document.getElementById("add-comment");

if (formTextComment !== null) {
    formTextComment.addEventListener("submit", function (e) {

        e.preventDefault();

        var valueTextComment = textAreaComment.value;

        if (valueTextComment === "") {
            noComment.textContent = "Le champ commentaire n'est pas rempli.";
            textAreaComment.addEventListener("click", function () {
                noComment.textContent = "";
            });
        } else {
            formTextComment.submit();
        }
    });
}
// Fin vérification textarea "Laisser un commentaire"

// Début vérification textarea "Ajouter le titre" et "Ajouter le contenu"
var formCreatePost = document.getElementById("form-add-post");
var noTitle = document.getElementById("no-title");
var noContent = document.getElementById("no-content");
var textAreaCreateTitle = document.getElementById("textarea-titre");
var textAreaCreateContent = document.getElementById("textarea-contenu");

if (formCreatePost !== null) {

    formCreatePost.addEventListener("submit", function (e) {
        tinymce.triggerSave();
        e.preventDefault();
        
        var valueTitle = textAreaCreateTitle.value;
        var valueContent = textAreaCreateContent.value;
        console.log(tinymce.get("textarea-titre"));
        
        if (valueTitle === "") {
            noTitle.textContent = "Il faut ajouter un titre pour ajouter le billet"
            tinymce.get("textarea-titre").on("click", function () {
                noTitle.textContent = "";
            });

        }
                console.log(valueTitle);
        if (valueContent === "") {
            
            noContent.textContent = "Il faut ajouter le contenu pour ajouter le billet"
            tinymce.get("textarea-contenu").on("click", function () {
                noContent.textContent = "";
            });
        }
        console.log(valueContent);
        if (valueTitle !== "" && valueContent !== "") {
            formCreatePost.submit();
            console.log("envoyer");
        }
    });

}
// Fin vérification textarea "Ajouter le titre" et "Ajouter le contenu"