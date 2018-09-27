<?php
require('controller/frontend.php');

try {
    if ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        } else {
            throw new Exception('Aucun identifiant de billet envoyé'); 
        }
    } else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
