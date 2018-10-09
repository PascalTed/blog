<?php

require_once("model/Manager.php");

class AccountManager extends Manager
{

    
    public function editAccount()
    {
        $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db = $this->dbConnect();
        $account = $db->prepare('INSERT INTO users (pseudo, pass, email) VALUES (?, ?, ?)');
        $account->execute(array($_POST['pseudo'], $passHash, $_POST['email']));
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
}