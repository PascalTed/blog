<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog de Jean Forteroche' ?>

<?php ob_start(); ?>

<section class="section-one">
    
    <h1>Billets du blog à modifier ou supprimer</h1>
    
    <div class="link-adm">
        <p><a href="index.php?action=admCreatePost">Ajouter des billets</a><a href="index.php?action=admReportComment">Commentaires signalés</a></p>
    </div>
    
    <?php
    while ($data = $posts->fetch())
    {
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
            <?= $data['title']; ?>
            <em>le <?= $data['creation_date_fr']; ?></em>
        </h2>
        
        <div class="news-contenu">
            <?= $postExtract; ?> ...
            <p class="modif-supp">
                <a href="index.php?action=admSeeModifyPost&amp;idPost=<?= $data['id']; ?>">Modifier ou supprimer</a>
            </p>
        </div>
    </div>
    
    <?php
    }
    $posts->closeCursor();
    ?>
 
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>