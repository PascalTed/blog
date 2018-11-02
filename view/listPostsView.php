<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = "Blog de Jean Forteroche" ?>

<?php ob_start(); ?>

<section class="section-one">
    
    <h1>Billets du blog :</h1>
    
    <?php
    while ($data = $posts->fetch()) {
        // Récupérer extrait du billet
        $postExtract = $data['content'];
        $postExtract = substr($postExtract, 0, 500);
        $firstSpace = strrpos($postExtract, '<p');

        if ($firstSpace == false) {
            $firstSpace = strrpos($postExtract, ' ');
            $postExtract = substr($postExtract, 0, $firstSpace);
        } else {
            $postExtract = substr($postExtract, 0, $firstSpace);
            $firstSpace = strrpos($postExtract, ' ');
            $postExtract = substr($postExtract, 0, $firstSpace);
        }
    ?>
    
    <!-- Affichage du billet --> 
    <div class="news">
        <h2>
            <em>le <?= $data['creation_date_fr']; ?></em><br/>
            <?= $data['title']; ?>
        </h2>

        <div class="news-contenu">
            <?= $postExtract; ?>
            <a id="extrait" href="index.php?action=post&amp;idPost=<?= $data['id']; ?>"> <em><strong>... lire la suite</strong></em></a>
        </div>
    </div>
    
    <?php
    }
    $posts->closeCursor();
    ?>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>