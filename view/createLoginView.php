<?php require('menuView.php'); ?>
<?php require('loginView.php'); ?>

<?php ob_start(); ?>

        <section id="formulaireInscription">
            <div>
                <h1>Inscription</h1>
                <form action="index.php?action=createAccount" method="post">
                    <p>
                        <label for="pseudo">Pseudo : </label><br />
                        <input type="text" id="pseudo" name="pseudo" required /><span id="alertPseudo"></span>
                    </p>
                    <p>
                        <label for="email">Adresse Email : </label><br />
                        <input type="email" id="email" name="email" required /><span id="alertEmail"></span>
                    </p>
                    <p>
                        <label for="password">Mot de passe : </label><br />
                        <input type="password" id="password" name="password" required /><span id="alertPassword"></span>
                    </p>
                    <p>
                        <label for="verifPassword">Vérification du mot de passe : </label><br />
                        <input type="Password" id="verifPassword" name="verifPassword" minlength="8" required /><span id="alertVerifPassword"></span>
                    </p>
                    <p>
                        <input type="submit" value="S'inscrire" />
                    </p>
                </form>
            </div>
            <p><a href="index.php">Retour Acceuil</a></p>
        </section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
