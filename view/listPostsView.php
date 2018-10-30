<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = "Blog de Jean Forteroche" ?>

<?php ob_start(); ?>


<section class="section-one">
    
    <h1>Billets du blog :</h1>
    
<?php
while ($data = $posts->fetch())
{
    $postExtract = $data['content'];
    $postExtract = substr($postExtract, 0, 300);
    $firstSpace = strrpos($postExtract, '<p');

    if ($firstSpace == false) {
        $firstSpace = strrpos($postExtract, ' ');
        $postExtract = substr($postExtract, 0, $firstSpace);
    } else {
        $postExtract = substr($postExtract, 0, $firstSpace);
        $firstSpace = strrpos($postExtract, ' ');
        $postExtract = substr($postExtract, 0, $firstSpace);
    }
        
?>
    <div class="news">
        <h2>
            <?= $data['title']; ?>
            <em>le <?= $data['creation_date_fr']; ?></em>
        </h2>
        
        <div class="news-contenu">
            <?= $postExtract; ?>
            <em><a href="index.php?action=post&amp;idPost=<?= $data['id']; ?>"> ... lire la suite</a></em>
        </div>
    </div>
<?php
}
$posts->closeCursor();
?>
    
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>