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
        <div id="opaque"></div>
        <?= $content ?>
        
        <!-- script -->
        <script src="js/tinymce/tinymce.js"></script>
        <script>
        tinymce.init({
            selector: '#textarea-titre', menubar: false, toolbar: 'undo redo | bold, italic | underline | strikethrough', branding: false, statusbar: false, forced_root_block: false, invalid_elements : 'div, br', entity_encoding : "raw"
        });
        tinymce.init({
            selector: '#textarea-contenu', menubar: false, toolbar: 'undo redo | bold, italic | underline | strikethrough | alignleft, aligncenter, alignright, alignjustify', branding: false, statusbar: false, entity_encoding : "raw"
        });
        </script>        
        <script src="js/ajaxpost.js"></script>
        <script src="js/regex.js"></script>
        <script src="js/appli.js"></script>
    </body>
    
</html>