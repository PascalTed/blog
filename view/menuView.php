<?php ob_start(); ?>

<ul>
    <li><a href="index.php">Acceuil</a></li>
    <?php
    if (isset($_SESSION['pseudo'])) {
    ?>
        
    <li><a href="index.php?action=disconnectAccount" id="se-deconnecter">Se déconnecter</a></li>
    
    <?php
    } else {
    ?>
    
    <li><a href="#" id="se-connecter">Se connecter</a></li>
    
    <?php
    }
    ?>
    
    <li><a href="index.php?action=displayCreateAccount">Créer un compte</a></li>

    <?php
    if (isset($_SESSION['pseudo']) AND isset($_SESSION['admin']) AND $_SESSION['admin'] == 1) {
    ?>
    <li><a href="index.php?action=admListPosts">Gérer les billets</a></li>
    <?php
    }
    ?>
    
</ul>


<?php $menu = ob_get_clean(); ?>