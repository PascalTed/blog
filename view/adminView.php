<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php $titleHeader = 'Administration du Blog de Jean Forteroche' ?>


<?php ob_start(); ?>


<div>
    TEST
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>