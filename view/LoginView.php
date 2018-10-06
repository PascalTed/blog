<?php ob_start(); ?>               

<div id="seConnecter">
    <form action="index.php?action=connectAccount" method="post">
        <p>
            <label for="pseudoConnect">Pseudo : </label><br />
            <input type="text" id="pseudoConnect" name="pseudoConnect" />
        </p>
        <p>
            <label for="passwordConnect">Mot de passe : </label><br />
            <input type="password" id="passwordConnect" name="passwordConnect" />
        </p>
        <p>
            <input type="submit" value="Se connecter" id="formConnexion"/>
        </p>
        <p id="erreur">incorrect</p>
    </form>
</div>

<?php $connexion = ob_get_clean(); ?>