<?php ob_start(); ?>

<h2>Billets du blog :</h2>

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