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
    $countReportComment = $comments->rowcount();
    while($comment = $comments->fetch()) {
    ?>    
        <div>
            <p>
                Titre du billet : <?= $comment['title'] ?>
            </p>
            <p>
                Commentaire signalé : "<?= htmlspecialchars($comment['comment']); ?>"
            </p>
            <p>
                <a href="index.php?action=admValidComment&amp;idComment=<?= $comment['id'] ?>">Valider commentaire</a><a href="index.php?action=admRemoveComment&amp;idComment=<?= $comment['id'] ?>">Supprimer commentaire</a>    
            </p>

        </div>
    <?php
    }
    if ($countReportComment == 0) {
    ?>
        <div>
            <p>Il n'y a pas de commentaires signalés</p>
        </div>
    <?php
    }
    $comments->closeCursor();
    ?>
 

    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
