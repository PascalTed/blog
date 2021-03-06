<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = "Blog de Jean Forteroche" ?>

<?php ob_start(); ?>

<section class="section-one">
    
    <h1>"Billet simple pour l'Alaska"</h1>
    
    <?php
    while ($data = $posts->fetch()) {
        // Récupérer extrait du billet
        $postExtract = $data['content'];
        $postExtract = substr($postExtract, 0, 600);
    ?>
    
    <!-- Affichage du billet --> 
    <div class="news">
        <h2>
            <em id="date">le <?= $data['creation_date_fr']; ?></em><br/>
            <?= $data['title']; ?>
        </h2>

        <div class="news-contenu">
            <?= strip_tags($postExtract); ?>
            <a class="extrait" href="index.php?action=post&amp;idPost=<?= $data['id']; ?>"> <em>... lire la suite</em></a>
        </div>
    </div>
    
    <?php
    }
    $posts->closeCursor();
    ?>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>