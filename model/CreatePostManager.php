<?php

require_once("model/Manager.php");

class CreatePostManager extends Manager
{
    public function editPost($postTitle, $postContents)
    {
        $db = $this->dbConnect();
        $createPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $createPost->execute(array($postTitle, $postContents));

    } 
}