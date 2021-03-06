<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog' ?>

<?php ob_start(); ?>

<section class="section-one">

    <h1>Ajouter un billet</h1>
    
    <div class="link-adm">
        <p><a href="index.php?action=admListPosts">Billets créés</a><a href="index.php?action=admReportComment">Commentaires signalés</a></p>
    </div>

    <div>
        <form class="form-tiny-mce" action="index.php?action=admEditPost" method="post" id="form-add-post">
            <p>
                <label for="textarea-titre">Ajouter le titre</label>
                <textarea id="textarea-titre" name="textarea-titre"></textarea>
                <span id="no-title"></span>

                <label for="textarea-contenu">Ajouter le contenu</label>
                <textarea id="textarea-contenu" name="textarea-contenu"></textarea>
                <span id="no-content"></span>
                
                <input type="submit" value="Ajouter le billet" />
            </p>
         </form>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>