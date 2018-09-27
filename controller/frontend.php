<?php

// Chargement des classes
require('model/PostManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/listPostsView.php');
}