<?php

// Chargement des classes
require('model/PostManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/postView.php');
}