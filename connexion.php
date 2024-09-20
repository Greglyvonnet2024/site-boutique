<?php require_once './inc/haut.inc.php'; ?>

<h1 class="mt-4">Connexion</h1>

<?php if (isset($_GET['deconnexion']) && $_GET['deconnexion'] == 'succes') { ?>

<?php } ?>

<div class="allert alert-success"> Vous êtes déconnecté(e)</div>

<p>Veuillez indiquer vos identifiants pour vous connecter</p>
<?php if (isset($_GET['erreur']) && $_GET['erreur']) { ?>
    <ul>
        <li><?= $_SESSION['error'] . '<br>'; ?></li>
    </ul>


<?php } ?>
<form action="./traitement/traitement.php" method="post">

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email"><br><br>

    <label for="mdp">Votre mot de passe</label><br>
    <input type="password" id="mdp" name="mdp"><br><br>

    <input type="submit" name="connexion" value="Se connecter" class="btn">
</form>