<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
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
        }
    } else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
