<!DOCTYPE html>

<html lang="fr">
    
    <head>
        <meta charset="utf-8" />
        <title>Blog de Jean Forteroche</title>
        <link href="css/style.css" rel="stylesheet" />
    </head>
    
    <body>
        <header>
            <div>
                <?= $titleHeader ?>
                <?= $menu ?>
                <?= $connexion ?>
            </div>
        </header>
        <?= $content ?>
        
        <!-- script -->
        <script src="js/tinymce/tinymce.js"></script>
        <script>
        tinymce.init({
            selector: '#textarea-titre, #textarea-contenu', menubar: false, toolbar: 'undo redo | bold, italic | alignleft, aligncenter, alignright, alignjustify', forced_root_block: false, branding: false, statusbar: false
        });
        </script>        
        <script src="js/ajaxpost.js"></script>
        <script src="js/regex.js"></script>
        <script src="js/appli.js"></script>
    </body>
    
</html>