<?php ob_start(); ?>

<ul>
    <?php
    if (isset($_SESSION['pseudo'])) {
    ?>
        
    <li id="se-deconnecter">Se déconnecter</li>
    
    <?php
    } else {
    ?>
    
    <li id="se-connecter">Se connecter</li>
    
    <?php
    }
    ?>
    
    <li><a href="index.php?action=displayCreateAccount">Créer un compte</a></li>
</ul>

<?php $menu = ob_get_clean(); ?>