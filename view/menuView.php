<?php ob_start(); ?>

<ul>
    <li><a href="index.php">Acceuil</a></li>
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

<ul>
    <?php
    if (isset($_SESSION['pseudo']) AND isset($_SESSION['admin']) AND $_SESSION['admin'] == 1) {
    ?>
    <li><a href="index.php?action=admListPosts">Gérer les billets</a></li>
    <?php
    }
    ?>
</ul>

<?php $menu = ob_get_clean(); ?>