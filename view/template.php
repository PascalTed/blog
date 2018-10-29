<!DOCTYPE html>

<html lang="fr">
    
    <head>
        <meta charset="utf-8" />
        <title>Blog de Jean Forteroche</title>
        <link href="css/style.css" rel="stylesheet" />
        <link rel ="stylesheet" href="fontawesome/css/all.css">
    </head>
    
    <body>
        <header>
            <div id="title-menu">
                <div id="title-container">
                    <p><?= $titleHeader ?></p>
                </div>
                
                <div id="menu-container">
                    <?= $menu ?>
                    <?= $connexion ?>
                </div>
            </div>
        </header>
        <?= $content ?>
        
        <!-- script -->
        <script src="js/tinymce/tinymce.js"></script>
        <script>
        tinymce.init({
            selector: '#textarea-titre, #textarea-contenu', menubar: false, toolbar: 'undo redo | bold, italic | underline | strikethrough', forced_root_block: false, branding: false, statusbar: false, entity_encoding : "raw"
        });
        </script>        
        <script src="js/ajaxpost.js"></script>
        <script src="js/regex.js"></script>
        <script src="js/appli.js"></script>
    </body>
    
</html>