<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = "Blog de Jean Forteroche" ?>

<?php ob_start(); ?>


<section class="section-one">
    
    <h1>Billets du blog :</h1>
    
<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h2>
            <?= htmlspecialchars($data['title']); ?>
            <em>le <?= $data['creation_date_fr']; ?></em>
        </h2>
        
        <p>
            <?= nl2br(htmlspecialchars(substr($data['content'], 0, 100))); ?>
            <em><a href="index.php?action=post&amp;idPost=<?= $data['id']; ?>"> ... lire la suite</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>