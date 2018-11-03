<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AccountManager.php');

// Affiche la liste des billets
function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require_once('view/listPostsView.php');
}

// Affiche le billet + commentaires associés
function post($postId)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);

    require_once('view/postView.php');
}

// Signaler un commentaire
function reportComment($commentId, $postId)
{
    $commentManager = new CommentManager();
    $commentManager->editReport($commentId);
    
    header('Location: index.php?action=post&idPost=' . $postId);
}

// Affiche création d'un compte
function displayCreateAccount()
{
    require_once('view/createLoginView.php');
}

// Vérification des informations saisies (pseudo et email), venant d'un ajaxpost, avant de créer un compte. 
function verifPseudoMail($pseudo, $mail) {

    $accountManager = new AccountManager();
    $accountManager->searchPseudoMail($pseudo, $mail);
}

// Création du compte
function createAccount($pseudo, $mail, $pass)
{    
    $accountManager = new AccountManager();
    $accountManager->editAccount($pseudo, $mail, $pass);
    
    header('Location: index.php');
}

// Vérification des informations saisies (pseudo et pass), venant d'un ajaxpost, avant de se connecter
function verifPseudoPass($pseudo, $pass) 
{
    $accountManager = new AccountManager();
    $accountManager->searchPseudoPass($pseudo, $pass);
}

// se déconnecter
function  disconnectAccount()
{
    
    $accountManager = new AccountManager();
    $accountManager->removeSession();
    
    header('Location: index.php');
}

// Affiche la liste des billets à modifier, partie administrateur
function admListPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    
    require_once('view/admListPostsView.php');
}

// Affiche la page pour céer les nouveaux billets, partie administrateur
function admCreatePost()
{
    require_once('view/admCreatePostView.php');
}

// Enregistrement du nouveau billet, partie administrateur
function admEditPost($postTitle, $postContents)
{
    $PostManager = new PostManager();
    $PostManager->editPost($postTitle, $postContents);
    
    header('Location: index.php?action=admListPosts');  
}

// Affiche la page pour modifier le billet, partie administrateur
function admSeeModifyPost($postId)
{
    $postManager = new PostManager();

    $post = $postManager->getPost($postId);
    require('view/admModifPostView.php');
}

// Modifier un poste, partie administrateur 
function admModifyPost($postId, $textareaTitre, $textareaContenu)
{
    
    $postManager = new PostManager();
    $postManager->modifyPost($postId, $textareaTitre, $textareaContenu);
    $posts = $postManager->getPosts();
    
    require_once('view/admListPostsView.php');
}

// Supprimer un poste avec les commentaires, partie administrateur 
function admRemovePostComments($postId) 
{
    $postManager = new PostManager();
    $postManager->removePost($postId);
        
    $commentManager = new CommentManager();
    $commentManager->removeCommentsByPost($postId);
    
    $posts = $postManager->getPosts();
    
    require_once('view/admListPostsView.php');    
}

// Affiche la page des commentaires signalés, partie administrateur
function admReportComment()
{
    $commentManager = new CommentManager();
    $comments = $commentManager->getReportComment();
    
    require_once('view/admReportCommentView.php');
}

// Valider le commentaire signalé
function admValidComment($commentId)
{
    $commentManager = new CommentManager();
    $commentManager->validComment($commentId);
    $comments = $commentManager->getReportComment();
    
    require_once('view/admReportCommentView.php');
}

// Supprimer le commentaire signalé
function admRemoveComment($commentId)
{
    $commentManager = new CommentManager();
    $commentManager->removeComment($commentId);
    $comments = $commentManager->getReportComment();
    
    require_once('view/admReportCommentView.php');
}

// Ajouter un commentaire
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