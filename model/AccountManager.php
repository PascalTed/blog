<?php

require_once("model/Manager.php");

class AccountManager extends Manager
{
    public function searchPseudo($pseudo)
    {
        $db = $this->dbConnect();
        $account = $db->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $account->execute(array($pseudo)); 
        $existPseudo = $account->fetch();
        return $existPseudo;
     }
    
    public function searchEmail($email)
    {
        $db = $this->dbConnect();
        $account = $db->prepare('SELECT email FROM users WHERE email = ?');
        $account->execute(array($email)); 
        $existEmail = $account->fetch();
        return $existEmail;
    }
    
    public function editAccount()
    {
        $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $account = $db->prepare('INSERT INTO users (pseudo, pass, email) VALUES (?, ?, ?)');
        $account->execute(array($_POST['pseudo'], $passHash, $_POST['email']));
    }
}