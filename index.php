<?php
require('controller/frontend.php');

try 
{
    listPosts();
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
