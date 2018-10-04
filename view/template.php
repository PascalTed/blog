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
                <div id="seConnecter">
                    <form action="" method="post">
                        <p>
                            <label for="pseudoConnect">Pseudo : </label><br />
                            <input type="text" id="pseudoConnect" name="pseudoConnect" />
                        </p>
                        <p>
                            <label for="passwordConnect">Mot de passe : </label><br />
                            <input type="password" id="passwordConnect" name="passwordConnect" />
                        </p>
                        <p>
                            <input type="submit" value="Se connecter" />
                        </p>
                    </form>
                </div>
            </div>
        </header>
        <?= $content ?>
        
        <!-- script -->
        <script src="js/regex.js"></script>
        <script src="js/appli.js"></script>
    </body>
    
</html>