<?php require_once './inc/haut.inc.php'; 
if(!internauteEstConnecte()){
header ('location: connexion.php');

}

    ?>
<h1 class="mt-4">Profil</h1>

<h2>Bonjour <strong><?= htmlspecialchars($_SESSION['membre']['prenom']); ?></strong></h2>

<?php if (internauteEstConnecteEtAdmin()) { ?>
    <h2>Vous êtes un administrateur</h2>
<a href="./admin/gestion_produits.php">Aller sur gestions de produits</a>


<?php } ?>