<?php

require_once("model/Manager.php");

class AccountManager extends Manager
{
    public function searchPseudoMailPass($pseudo, $mail) 
    {
        $db = $this->dbConnect();
        
        $pseudoAccount = $db->prepare('SELECT id, admin, pseudo, email FROM users WHERE pseudo = ?');
        $pseudoAccount->execute(array($pseudo));
        $existingUser = $pseudoAccount->fetch();
        
        $mailAccount = $db->prepare('SELECT id, admin, pseudo, email FROM users WHERE email = ?');
        $mailAccount->execute(array($mail));
        $existingMail = $mailAccount->fetch();

        if ($existingUser['pseudo']) {
            echo "existUser";
        } elseif ($existingMail['email']) {
            echo "existEmail";
        } else{
            $_SESSION['id'] = $existingUser['id'];
            $_SESSION['admin'] = $existingUser['admin'];
            $_SESSION['pseudo'] = $pseudo;           
            echo "valide";
        } 
    }
    
    public function editAccount($pseudo, $mail, $pass)
    {
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $account = $db->prepare('INSERT INTO users (pseudo, pass, email) VALUES (?, ?, ?)');
        $account->execute(array($pseudo, $passHash, $mail));
    }
    
    public function searchPseudoPass($pseudo, $pass) 
    {
        $db = $this->dbConnect();
        $account = $db->prepare('SELECT id, admin, pass FROM users WHERE pseudo = ?');
        $account->execute(array($pseudo));
        $existingUsers = $account->fetch();
            
        $passHashVerif = password_verify($pass, $existingUsers['pass']);
            
        if (!$existingUsers) {
            echo "noUser";
        } elseif ($passHashVerif) {

            $_SESSION['id'] = $existingUsers['id'];
            $_SESSION['admin'] = $existingUsers['admin'];
            $_SESSION['pseudo'] = $pseudo;           
            echo 'valid';
        } else {
            echo "noPass";
        } 
    }
    
    public function removeSession()
    {
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();
    }
}