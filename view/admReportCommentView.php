<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog de Jean Forteroche' ?>


<?php ob_start(); ?>


<section class="section-one">

    <h1>Commentaires signalés</h1>
    
    <div class="link-adm">
    <p><a href="index.php?action=admCreatePost">Ajouter des billets</a><a href="index.php?action=admListPosts">Billets créés</a></p>
</div>
    
    <?php
    $countReportComment = $comments->rowcount();
    while($comment = $comments->fetch()) {
    ?>    
        <div class="valid-delete-comment">
            <p>
                <strong>Titre du billet : </strong><?= $comment['title'] ?>
            </p>
            <p>
                <strong>Commentaire signalé : </strong><br />
                "<?= htmlspecialchars($comment['comment']); ?>"
            </p>
            <p>
                <a href="index.php?action=admValidComment&amp;idComment=<?= $comment['id'] ?>">Valider le commentaire</a><a href="index.php?action=admRemoveComment&amp;idComment=<?= $comment['id'] ?>">Supprimer le commentaire</a>    
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
