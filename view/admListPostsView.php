<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog de Jean Forteroche' ?>


<?php ob_start(); ?>




<section class="section-one">
    
    <h1>Billets du blog à modifier ou supprimer:</h1>
    
    <div class="link-adm">
        <p><a href="index.php?action=admCreatePost">Ajouter des billets</a><a href="index.php?action=admReportComment">Commentaires signalés</a></p>
    </div>
    
<?php
while ($data = $posts->fetch())
{
    $postExtract = $data['content'];
    $postExtract = substr($postExtract, 0, 500);
    $firstSpace = strrpos($postExtract, ' ');
    $postExtract = substr($postExtract, 0, $firstSpace);
?>
    <div class="news">
        <h2>
            <?= htmlspecialchars($data['title']); ?>
            <em>le <?= $data['creation_date_fr']; ?></em>
        </h2>
        
        <p>
            <?= nl2br(htmlspecialchars($postExtract)); ?> ...
        </p>
        <p>
            <a href="index.php?action=admSeeModifyPost&amp;idPost=<?= $data['id']; ?>">Modifier ou supprimer</a>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>