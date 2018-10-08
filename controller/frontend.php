<?php

// Chargement des classes
require('model/PostManager.php');
require('model/CommentManager.php');
require('model/AccountManager.php');

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

    $post = $postManager->getPost($_GET['idPost']);
    $comments = $commentManager->getComments($_GET['idPost']);

    require('view/postView.php');
}

function reportComment()
{
    $commentManager = new CommentManager();
    $commentManager->editReport($_GET['idComment']);
    
    header('Location: index.php?action=post&idPost=' . $_GET['idPost']);
}

function displayCreateAccount()
{
    require('view/createLoginView.php');
}

function verifPseudo($pseudo) {

    $accountManager = new AccountManager();
    $pseudoSearchResult = $accountManager->searchPseudo($pseudo);
    return $pseudoSearchResult;
}

function verifEmail($email) {

    $accountManager = new AccountManager();
    $emailSearchResult = $accountManager->searchEmail($email);
    return $emailSearchResult;
}

function createAccount()
{    
    $accountManager = new AccountManager();
    $accountManager->editAccount();
    header('Location: index.php');
}

function verifPseudoPass($pseudo, $pass) 
{
    $accountManager = new AccountManager();
    $accountManager->searchPseudoPass($pseudo, $pass);
}

function addComment($userId, $postId, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($userId, $postId, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}