<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog' ?>

<?php ob_start(); ?>

<section class="section-one">
    
    <h1>Modifier ou supprimer le billet</h1>

    <div class="link-adm">
        <p><a href="index.php?action=admListPosts">Billets créés</a><a href="index.php?action=admCreatePost">Ajouter des billets</a><a href="index.php?action=admReportComment">Commentaires signalés</a></p>
    </div>

    <div>
        <form class="form-tiny-mce" action="index.php?action=admModifyOrRemovePost&amp;idPost= <?= $post['id'] ?>" method="post">

            <label for="textarea-titre">Modifier le titre</label>
            <textarea id="textarea-titre" name="textarea-titre"><?= htmlspecialchars($post['title']); ?></textarea><br />


            <label for="textarea-contenu">Modifier le contenu</label>
            <textarea id="textarea-contenu" name="textarea-contenu"><?= htmlspecialchars($post['content']); ?></textarea><br />
            
            <div id="label-radio">
                <label for="modifyPost"><input type="radio" name="setPost" value="admModifyPost" id="modifyPost" checked />Modifier le billet</label>
            
                <label for="admRemovePostComments"><input type="radio" name="setPost" value="admRemovePostComments" id="admRemovePostComments" />Supprimer le billet</label><br />
            </div>
            
            <input type="submit" value="Envoyer" />
        </form>
    </div>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
