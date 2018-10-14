<?php

require("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    
    public function editPost($postTitle, $postContents)
    {
        $db = $this->dbConnect();
        $createPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $createPost->execute(array($postTitle, $postContents));

    }
    
    public function modifyPost ($postId, $textareaTitre, $textareaContenu)
    {
        
        $db = $this->dbConnect();
        $updatePost = $db->prepare('UPDATE posts SET title = ?, content = ? where id = ?');
        $updatePost->execute(array($textareaTitre, $textareaContenu, $postId));
    }
    
    public function removePost($postId)
    {
        $db = $this->dbConnect();
        $deletePost = $db->prepare('DELETE FROM posts where id = ?');
        $deletePost->execute(array($postId));
    }    

}