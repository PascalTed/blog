<?php session_start(); ?>
<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        // Afficher un billet
        if ($_GET['action'] == 'post') {
            if (isset($_GET['idPost']) && $_GET['idPost'] > 0) {
                post($_GET['idPost']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé.'); 
            }
        // Ajouter un commentaire
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['idPost']) && $_GET['idPost'] > 0) {
                if (isset($_POST['add-comment']) && $_POST['add-comment'] != '') {
                    addComment($_SESSION['id'], $_GET['idPost'], $_POST['add-comment']);
                } else {
                    throw new Exception('Le champ n\'est pas rempli.');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé.');
            }
        // Signaler un commentaire
        } elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                if (isset($_SESSION['pseudo'])) {
                    reportComment($_GET['idComment'], $_GET['idPost']);
                } else {
                    throw new Exception('Il faut être connecté pour signaler un commentaire, pas de session pseudo enregistré.');
                }
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé.'); 
            }
        // Afficher la page pour créer un compte
        } elseif ($_GET['action'] == 'displayCreateAccount') {
            displayCreateAccount();
            
        // Vérification des informations saisies (pseudo et email), venant d'un ajaxpost, avant de créer un compte.   
        } elseif ($_GET['action'] == 'verifCreateAccount') {
            verifPseudoMail($_POST['pseudo'], $_POST['email']);    
        
        // Enregistrement du nouveau compte
        } elseif ($_GET['action'] == 'createAccount') {
            if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])) {
                createAccount($_POST['pseudo'], $_POST['email'], $_POST['password']);
            } else {
                throw new Exception('Les informations (pseudo, email, password) n\'ont pas été envoyés.');
            }
         // Vérification des informations saisies (pseudo et pass), venant d'un ajaxpost, avant de se connecter
        } elseif ($_GET['action'] == 'connectAccount'){
            verifPseudoPass($_POST['pseudoConnect'], $_POST['passwordConnect']);
            
        // Déconnexion    
        } elseif ($_GET['action'] == 'disconnectAccount'){
            if (isset($_SESSION['pseudo'])) {
                disconnectAccount();
            } else {
                throw new Exception('Pas de session d\'enregistrée, il faut être connecté pour se déconnecté.'); 
            }
        // Affiche la page de la liste des billets à modifier, partie administrateur
        } elseif ($_GET['action'] == 'admListPosts') {
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
               admListPosts();
            } else {
                throw new Exception('Pas de session administrateur enregistrée, il faut être connecté en administrateur pour voir la page de la liste des billets à modifier.');
            }
        // Affiche la page pour céer les nouveaux billets, partie administrateur
        } elseif ($_GET['action'] == 'admCreatePost') {
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
               admCreatePost();
            } else {
                throw new Exception('Pas de session administrateur enregistrée, il faut être connecté en administrateur pour afficher la page "Ajouter un billet".');
            }
        // Enregistrement du nouveau billet, partie administrateur
        } elseif ($_GET['action'] == 'admEditPost') {
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
            admEditPost($_POST['textarea-titre'], $_POST['textarea-contenu']);
            } else {
                throw new Exception('Pas de session administrateur enregistrée, il faut être connecté en administrateur pour enregistrer de nouveaux billets.');
            }
        // Affiche la page pour modifier le billet, partie administrateur
        } elseif ($_GET['action'] == 'admSeeModifyPost') {
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                admSeeModifyPost($_GET['idPost']);
            }else {
                throw new Exception('Pas de session administrateur enregistrée, il faut être connecté en administrateur pour afficher la page "Modifier ou supprimer le billet".');
            }
        // Modifier ou supprimer un poste, partie administrateur    
        } elseif ($_GET['action'] == 'admModifyOrRemovePost') {
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                if (isset($_POST['setPost']) && $_POST['setPost'] == "admModifyPost") {
                    admModifyPost($_GET['idPost'], $_POST['textarea-titre'], $_POST['textarea-contenu']);
                }
                if (isset($_POST['setPost']) && $_POST['setPost'] == "admRemovePostComments") {
                    admRemovePostComments($_GET['idPost']);
                }
            } else {
                throw new Exception('Pas de session administrateur enregistrée, il faut être connecté en administrateur pour modifier ou supprimer le billet.');
            }
        // Affiche la page des commentaires signalés, partie administrateur
        } elseif ($_GET['action'] == 'admReportComment') {
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                admReportComment();
            } else {
                throw new Exception('Pas de session administrateur enregistrée, il faut être connecté en administrateur pour afficher la page "Commentaires signalés".');
            }
        // Valider le commentaire signalé   
        } elseif ($_GET['action'] == 'admValidComment') {
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                admValidComment($_GET['idComment']);
            } else {
                throw new Exception('Pas de session administrateur enregistrée, il faut être connecté en administrateur pour valider un commentaire signalé.');
            }
        // Supprimer le commentaire signaler    
        } elseif ($_GET['action'] == 'admRemoveComment') {
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                admRemoveComment($_GET['idComment']);
            } else {
                throw new Exception('Pas de session administrateur enregistrée, il faut être connecté en administrateur pour supprimer un commentaire signalé.');
            }
        }
    } else {
        // Affiche la liste des postes
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
