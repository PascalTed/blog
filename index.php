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
        } elseif ($_GET['action'] == 'createAccount') {
            if (verifPseudo($_POST['pseudo']) == false) {
                if (verifPseudo($_POST['email']) == false) {
                    createAccount();
                } else {
                    displayCreateAccount();
                }
            } else {
                displayCreateAccount();
            }
        }
    } else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
