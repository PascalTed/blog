<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog de Jean Forteroche' ?>


<?php ob_start(); ?>

<div>
    <p><a href="index.php?action=admListPosts">Billets créés</a><a href="index.php?action=admCreatePost">Ajouter des billets</a><a href="index.php?action=admReportComment">Commentaires signalés</a></p>
</div>

<h2>modifier ou supprimer le billet :</h2>



<section>
    


<div>
    <form action="index.php?action=admModifyOrRemovePost&amp;idPost= <?= $post['id'] ?>" method="post">
        
        <label for="textarea-titre">Modifier le titre</label>
        <textarea id="textarea-titre" name="textarea-titre"><?= htmlspecialchars($post['title']); ?></textarea><br />

               
        <label for="textarea-contenu">Modifier le contenu</label>
        <textarea id="textarea-contenu" name="textarea-contenu"><?= nl2br(htmlspecialchars(substr($post['content'], 0, 100))); ?></textarea><br />
        
        <input type="radio" name="setPost" value="modifyPost" id="modifyPost" /> <label for="modifyPost">Modifier le billet</label>
        
        <input type="radio" name="setPost" value="removePost" id="removePost" /> <label for="removePost">Supprimer le billet</label><br />
        
        <input type="submit" value="Envoyer" />

    </form>
</div>


    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
