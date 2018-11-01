<?php

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comments.id, comments.user_id, comments.comment, DATE_FORMAT(comments.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, users.pseudo FROM comments INNER JOIN users ON comments.post_id = ? AND users.id = user_id ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
    
    public function editReport($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET moderation = true where id = ?');
        $comments->execute(array($commentId));
    }
    
    public function postComment($userId, $postId, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(user_id, post_id, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($userId, $postId, $comment));

        return $affectedLines;
    } 
    
    public function getReportComment()
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT comments.id, comments.comment, comments.comment_date, posts.title FROM comments INNER JOIN posts ON comments.post_id = posts.id AND moderation = 1 ORDER BY comment_date DESC');
        return $comments;   
    }
    
    public function validComment($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET moderation = false where id = ?');
        $comments->execute(array($commentId));
    }
    
    public function removeComment($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments where id = ?');
        $comments->execute(array($commentId));
    }
    
    public function removeCommentsByPost($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments where post_id = ?');
        $comments->execute(array($postId));
    }  
}