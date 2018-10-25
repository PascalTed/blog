<?php ob_start(); ?>               

<div id="seConnecter">
    <form action="#" method="post">
        <i class="fas fa-times fa-2x" id="fa-times"></i>
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
        <p id="pseudo-pass-alert"></p>
    </form>
</div>

<?php $connexion = ob_get_clean(); ?>