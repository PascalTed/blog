<?php ob_start(); ?>

<section>

    <h2>Billets du blog :</h2>

    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>
    
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
