<?php ob_start(); ?>

<div id="commentaires">
    
    <h3>Commentaires</h3>
    
    <form action="index.php?action=addComment&amp;idPost=<?= $post['id'] ?>" method="post" id="form-add-comment">
            
        <?php 
        if (isset($_SESSION['pseudo'])) {
        ?>
            <label for="add-comment">Laisser un commentaire</label><br />
            <textarea type="text" id="add-comment" name="add-comment" rows="10" cols="30"></textarea><br />
            <span id="no-comment"></span>
            <input type="submit" value="Envoyer commentaire" />

            <?php
            } else {
            ?>
        
            <p id="no-connected">Il faut être connecté pour ajouter ou signaler un commentaire.</p>
            <p><a href="#" id="connect-to-comment">Se connecter</a></p>
        
            <?php
            }
            ?>

    </form>
</div>

<?php $addComment = ob_get_clean(); ?>