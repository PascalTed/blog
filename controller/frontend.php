<?php

// Chargement des classes
require('model/PostManager.php');
require('model/CommentManager.php');

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

function reportComment()
{
    $commentManager = new CommentManager();
    $commentManager->editReport($_GET['idComment']);
    
    header('Location: index.php?action=post&id=' . $_GET['idPost']);
}