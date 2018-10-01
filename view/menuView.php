<?php ob_start(); ?>

<ul>
    <?php
    if (isset($_SESSION['pseudo'])) {
    ?>
        
    <li><a href="">Se déconnecter</a></li>
    <li><a href="">Créer un compte</a></li>
    
    <?php
    } else {
    ?>
    
    <li><a href="">Se connecter</a></li>
    
    <?php
    }
    ?>
    
    <li><a href="index.php?action=displayCreateAccount">Créer un compte</a></li>
</ul>

<?php $menu = ob_get_clean(); ?>