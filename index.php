<?php session_start(); ?>
<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'post') {
            if (isset($_GET['idPost']) && $_GET['idPost'] > 0) {
                post($_GET['idPost']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé'); 
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['idPost']) && $_GET['idPost'] > 0) {
                if (!empty($_POST['add-comment'])) {
                    addComment($_SESSION['id'], $_GET['idPost'], $_POST['add-comment']);
                }
                else {
                    throw new Exception('Le champs n\'est pas rempli !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }    
        } elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                reportComment($_GET['idComment'], $_GET['idPost']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            } 
        } elseif ($_GET['action'] == 'displayCreateAccount') {
            displayCreateAccount();
            
        } elseif ($_GET['action'] == 'verifCreateAccount') {
            verifPseudoMailPass($_POST['pseudo'], $_POST['email']);    
        
        } elseif ($_GET['action'] == 'createAccount') {
            createAccount($_POST['pseudo'], $_POST['email'], $_POST['password']);
            
        } elseif ($_GET['action'] == 'connectAccount'){
            verifPseudoPass($_POST['pseudoConnect'], $_POST['passwordConnect']);
            
        } elseif ($_GET['action'] == 'disconnectAccount'){
            disconnectAccount();
            
        } elseif ($_GET['action'] == 'admListPosts' && $_SESSION['admin'] == 1) {
            admListPosts();
            
        } elseif ($_GET['action'] == 'admCreatePost' && $_SESSION['admin'] == 1) {
            admCreatePost();
            
        } elseif ($_GET['action'] == 'admEditPost') {
            admEditPost($_POST['textarea-titre'], $_POST['textarea-contenu']);
            
        } elseif ($_GET['action'] == 'admSeeModifyPost' && isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
            admSeeModifyPost($_GET['idPost']);
            
        } elseif ($_GET['action'] == 'admModifyOrRemovePost' && isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
            if (isset($_POST['setPost']) && $_POST['setPost'] == "modifyPost") {
                admModifyPost($_GET['idPost'], $_POST['textarea-titre'], $_POST['textarea-contenu']);
            }
            if (isset($_POST['setPost']) && $_POST['setPost'] == "admRemovePostComments") {
                admRemovePostComments($_GET['idPost']);
            }        
                                
        } elseif ($_GET['action'] == 'admReportComment') {
            admReportComment();
            
        } elseif ($_GET['action'] == 'admValidComment') {
            admValidComment($_GET['idComment']);
            
        } elseif ($_GET['action'] == 'admRemoveComment') {
             admRemoveComment($_GET['idComment']);    
            
        
        }
    } else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
