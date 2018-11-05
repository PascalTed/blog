
<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>
<?php require('addCommentView.php'); ?>

<?php $titleHeader = "Blog de Jean Forteroche" ?>

<?php ob_start(); ?>

<section class="section-one">

    <h1>Lecture et commentaires de l'épisode</h1>
    <div class="link-user">
        <p><a href="index.php">&lsaquo;&lsaquo; Tous les épisodes</a></p>
    </div>

    <div class="news">
        <h2>
            <em>le <?= $post['creation_date_fr'] ?></em><br />
            <?= $post['title'] ?>
        </h2>
    
        <div class="news-contenu">
            <?= $post['content'] ?>
        </div>
    </div>
    
    <?= $addComment ?>
    
    <?php
    $countComment = $comments->rowcount();
    if ($countComment == 0) {
    ?>
        <div>
            <p>Il n'y a pas de commentaires.</p>
        </div>
    
    <?php
    } else {
        while ($comment = $comments->fetch()) {
    ?>
            <div class="all-comments">
                <!-- Affichage de chaque message (toutes les données sont protégées par htmlspecialchars -->
                <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong><em> le <?= $comment['comment_date_fr'] ?></em></p>
                
                <p>"<?= nl2br(htmlspecialchars($comment['comment'])) ?>"</p>
                
                <?php
                if (isset($_SESSION['pseudo'])) {
                    if ($comment['moderation'] == 1) {
                ?>
                        <p id="already-report">Commentaire signalé</p>
                
                    <?php
                    } else {
                    ?>
                        <p><a  id="to-report" href="index.php?action=reportComment&amp;idComment=<?= $comment['id']; ?>&amp;idPost=<?= $post['id']; ?> ">Signaler</a></p>
                
                <?php
                    }
                }
                ?>
                
            </div>
    <?php
        }
    }
    $comments->closeCursor();
    ?>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
