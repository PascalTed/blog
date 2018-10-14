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
            createAccount($_POST['pseudo'], $_POST['email']);
            
        } elseif ($_GET['action'] == 'connectAccount'){
            verifPseudoPass($_POST['pseudoConnect'], $_POST['passwordConnect']);
            
        } elseif ($_GET['action'] == 'admListPosts' && $_SESSION['admin'] == 1) {
            admListPosts();
            
        } elseif ($_GET['action'] == 'admCreatePost' && $_SESSION['admin'] == 1) {
            admCreatePost();
            
        } elseif ($_GET['action'] == 'admEditPost') {
            admEditPost($_POST['textarea-titre'], $_POST['textarea-contenu']);
            
        } elseif ($_GET['action'] == 'admModifPost' && $_SESSION['admin'] == 1) {
            admModifPost();  
                                
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
