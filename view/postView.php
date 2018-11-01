
<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>
<?php require('addCommentView.php'); ?>

<?php $titleHeader = "Blog de Jean Forteroche" ?>

<?php ob_start(); ?>

<section class="section-one">

    <h1>Lecture du billet</h1>
    <div class="link-user">
        <p><a href="index.php">&lsaquo;&lsaquo; Retour à la liste des billets</a></p>
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
                <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong><em> le <?= $comment['comment_date_fr'] ?></em></p>
                
                <p>"<?= nl2br(htmlspecialchars($comment['comment'])) ?>"</p>
                
                <?php
                if (isset($_SESSION['pseudo'])) { 
                ?>
                
                    <p><a href="index.php?action=reportComment&amp;idComment=<?= $comment['id']; ?>&amp;idPost=<?= $post['id']; ?> ">Signaler</a></p>
                
                <?php
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
