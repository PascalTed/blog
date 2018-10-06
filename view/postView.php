<?php session_start(); ?>
<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

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
    <div>
        <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <p><a href="index.php?action=reportComment&amp;idComment=<?= $comment['id']; ?>&amp;idPost=<?= $post['id']; ?> ">Signaler</a></p>
    </div>
<?php
}
?>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
