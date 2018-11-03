<!DOCTYPE html>

<html lang="fr">
    
    <head>
        <meta charset="utf-8" />
        <title>Blog de Jean Forteroche (acteur et écrivain)</title>
        <link rel="icon" type="image/png" href="images/favicon.png">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="fontawesome/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Jean Forteroche (acteur et écrivain) innove, suivez son nouveau roman &quot;Billet simple pour l'Alaska&quot; publié par épisode sur son blog">
        
        <!-- Facebook, Open Graph data -->
		<meta property="og:title" content="Blog de Jean Forteroche (acteur et écrivain)">
		<meta property="og:type" content="website">
		<meta property="og:url" content="http://jf-blog.tedsev.com/">
		<meta property="og:image" content="http://jf-blog.tedsev.com/images/jf-blog.png">
		<meta property="og:description" content="Jean Forteroche (acteur et écrivain) innove, suivez son nouveau roman &quot;Billet simple pour l'Alaska&quot; publié par épisode sur son blog">
        
        <!-- Twitter Card data -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="http://jf-blog.tedsev.com/">
		<meta name="twitter:title" content="Blog de Jean Forteroche (acteur et écrivain)">
		<meta name="twitter:description" content="Jean Forteroche (acteur et écrivain) innove, suivez son nouveau roman &quot;Billet simple pour l'Alaska&quot; publié par épisode sur son blog">
		<meta name="twitter:image" content="http://jf-blog.tedsev.com/images/jf-blog.png">
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
        
        <div id="opaque-window"></div>
        
        <!-- section -->
        <?= $content ?>
        <!-- /section -->
        
        <footer>
            <div>
                <p>Copyright 2018 - Tous droits réservés</p>
            </div>
        </footer>
        
        <!-- début script -->
        <script src="js/tinymce/tinymce.js"></script>
        <script>
        tinymce.init({
            selector: '#textarea-titre', menubar: false, toolbar: 'undo redo | bold, italic | underline | strikethrough', branding: false, statusbar: false, forced_root_block: false, entity_encoding : "raw"
        });
        tinymce.init({
            selector: '#textarea-contenu', menubar: false, toolbar: 'undo redo | bold, italic | underline | strikethrough | alignleft, aligncenter, alignright, alignjustify', branding: false, statusbar: false, entity_encoding: "raw", plugins: "autoresize"
        });
        </script>        
        <script src="js/ajaxpost.js"></script>
        <script src="js/regex.js"></script>
        <script src="js/appli.js"></script>
        <!-- fin script -->
    </body>
    
</html>