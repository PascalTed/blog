<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog' ?>

<?php ob_start(); ?>

<section class="section-one">
    
    <h1>Billets du blog à modifier ou à supprimer</h1>
    
    <div class="link-adm">
        <p><a href="index.php?action=admCreatePost">Ajouter des billets</a><a href="index.php?action=admReportComment">Commentaires signalés</a></p>
    </div>
    
    <?php
    while ($data = $posts->fetch())
    {
        // Récupérer extrait du billet
        $postExtract = $data['content'];
        $postExtract = substr($postExtract, 0, 600);
    ?>
    <!-- Affichage du billet -->
    <div class="news">
        <h2>
            <em>le <?= $data['creation_date_fr']; ?></em><br />
            <?= $data['title']; ?>
        </h2>
        
        <div class="news-contenu">
            <?= strip_tags($postExtract); ?> ...
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