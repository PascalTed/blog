<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog de Jean Forteroche' ?>


<?php ob_start(); ?>

<div>
    <p><a href="index.php?action=admCreatePost">Ajouter des billets</a><a href="index.php?action=admListPosts">Billets créés</a></p>
</div>

<h2>Commentaires signalés</h2>



<section>
<?php
while($comment = $comments->fetch()) {
?>    
    <div>
        <p>
            Le commentaire suivant du billet "" a été signalé :
        </p>
        <p>
            <?= htmlspecialchars($comment['comment']); ?>
        </p>
        <p>
            <a href="">Accepter commentaire</a><a href="">Supprimer commentaire</a>    
        </p>

    </div>
<?php
}
$comments->closeCursor();
?>
 

    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
