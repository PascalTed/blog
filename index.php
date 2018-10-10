<?php session_start(); ?>
<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'post') {
            if (isset($_GET['idPost']) && $_GET['idPost'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé'); 
            }
        } elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['idComment']) && $_GET['idComment'] > 0) {
                reportComment();
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé'); 
            } 
        } elseif ($_GET['action'] == 'displayCreateAccount') {
            displayCreateAccount();
            
        } elseif ($_GET['action'] == 'verifCreateAccount') {
            verifPseudoMailPass($_POST['pseudo'], $_POST['email']);    
        
        } elseif ($_GET['action'] == 'createAccount') {
            createAccount();
            
        } elseif ($_GET['action'] == 'connectAccount'){
            verifPseudoPass($_POST['pseudoConnect'], $_POST['passwordConnect']);
            
        } elseif ($_GET['action'] == 'displayAdminView' && $_SESSION['admin'] == 1) {
            displayAdminView();            
            
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
        }
    } else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
