<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog de Jean Forteroche' ?>


<?php ob_start(); ?>


<div>
    <form action="index.php?action=createPost" method="post">
        
        <label for="textarea-titre">Ajouter le titre</label>
        <textarea id="textarea-titre" name="textarea-titre"></textarea>

               
        <label for="textarea-contenu">Ajouter le contenu</label>
        <textarea id="textarea-contenu" name="textarea-contenu"></textarea>
        
        <input type="submit" value="Ajouter le billet" />
        
    </form>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>