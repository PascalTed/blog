<?php ob_start(); ?>



<section>
    <div>
        <h3>Commentaires</h3>
        <form action="index.php?action=addComment&amp;idPost=<?= $post['id'] ?>" method="post">
            
            <?php 
            if (isset($_SESSION['pseudo'])) {
            ?>
            <label for="add-comment">Laisser un commentaire</label><br />
            <textarea type="text" id="add-comment" name="add-comment" rows="10" cols="30"></textarea><br />
            <input type="submit" value="Envoyer commentaire" />


            <?php
            } else {
            ?>
            <p id="no-connected">Il faut être connecté pour ajouter ou signaler un commentaire</p>
            <p id="connect-to-comment">se connecter</p>
            <?php
            }
            ?>

        </form>
    </div>
</section>




<?php $addComment = ob_get_clean(); ?>