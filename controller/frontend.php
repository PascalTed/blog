<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AccountManager.php');

// liste des billets
function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require_once('view/listPostsView.php');
}

//billet + commentaires associés
function post($postId)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);

    require_once('view/postView.php');
}

function reportComment($commentId, $postId)
{
    $commentManager = new CommentManager();
    $commentManager->editReport($commentId);
    
    header('Location: index.php?action=post&idPost=' . $postId);
}

function displayCreateAccount()
{
    require('view/createLoginView.php');
}

function verifPseudoMailPass($pseudo, $mail) {

    $accountManager = new AccountManager();
    $accountManager->searchPseudoMailPass($pseudo, $mail);
}

function createAccount($pseudo, $mail, $pass)
{    
    $accountManager = new AccountManager();
    $accountManager->editAccount($pseudo, $mail, $pass);
    header('Location: index.php');
}


function verifPseudoPass($pseudo, $pass) 
{
    $accountManager = new AccountManager();
    $accountManager->searchPseudoPass($pseudo, $pass);
}

function  disconnectAccount()
{
    
    $accountManager = new AccountManager();
    $accountManager->removeSession();
    header('Location: index.php');
    
}

function admListPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/admListPostsView.php');
}

function admCreatePost()
{
    require('view/admCreatePostView.php');
}

function admEditPost($postTitle, $postContents)
{
    $PostManager = new PostManager();
    $PostManager->editPost($postTitle, $postContents);
    header('Location: index.php?action=admListPosts');  
}

function admSeeModifyPost($postId)
{
    $postManager = new PostManager();

    $post = $postManager->getPost($postId);
    require('view/admModifPostView.php');
}

function admModifyPost($postId, $textareaTitre, $textareaContenu)
{
    
    $postManager = new PostManager();
    $postManager->modifyPost($postId, $textareaTitre, $textareaContenu);
    $posts = $postManager->getPosts();
    require('view/admListPostsView.php');
}

function admRemovePostComments($postId) 
{
    $postManager = new PostManager();
    $postManager->removePost($postId);
        
    $commentManager = new CommentManager();
    $commentManager->removeCommentsByPost($postId);
    
    $posts = $postManager->getPosts();
    require('view/admListPostsView.php');    
}


function admReportComment()
{
    $commentManager = new CommentManager();
    $comments = $commentManager->getReportComment();
    require('view/admReportCommentView.php');
}

function admValidComment($commentId)
{
    $commentManager = new CommentManager();
    $commentManager->validComment($commentId);
    $comments = $commentManager->getReportComment();
    require('view/admReportCommentView.php');
}

function admRemoveComment($commentId)
{
    $commentManager = new CommentManager();
    $commentManager->removeComment($commentId);
    $comments = $commentManager->getReportComment();
    require('view/admReportCommentView.php');
}


function addComment($userId, $postId, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($userId, $postId, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&idPost=' . $postId);
    }
}