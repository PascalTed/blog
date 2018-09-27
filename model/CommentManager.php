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
}