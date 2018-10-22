<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog de Jean Forteroche' ?>


<?php ob_start(); ?>

<div>
    <p><a href="index.php?action=admListPosts">Billets créés</a><a href="index.php?action=admReportComment">Commentaires signalés</a></p>
</div>



<h2>Ajouter un billet</h2>  

<div>
    <form action="index.php?action=admEditPost" method="post">
        <p>
            <label for="textarea-titre">Ajouter le titre</label>
            <textarea id="textarea-titre" name="textarea-titre"></textarea>
            <span id="no-title"></span><br />

            <label for="textarea-contenu">Ajouter le contenu</label>
            <textarea id="textarea-contenu" name="textarea-contenu"></textarea>
            <span id="no-content"></span><br />
            <input type="submit" value="Ajouter le billet" />
        </p>
     </form>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>