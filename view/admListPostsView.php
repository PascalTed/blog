<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog de Jean Forteroche' ?>


<?php ob_start(); ?>

<div>
    <p><a href="index.php?action=admCreatePost">Ajouter des billets</a><a href="index.php?action=admReportComment">Commentaires signalés</a></p>
</div>

<h2>Billets du blog à modifier ou supprimer:</h2>



<section>
    
<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']); ?>
            <em>le <?= $data['creation_date_fr']; ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars(substr($data['content'], 0, 100))); ?>...
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