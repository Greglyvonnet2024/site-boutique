<?php require_once './inc/haut.inc.php';

// Partie requêtes

// 1 - Affichage des catégories : 

// executeRequete() fonction qui execute les requêtes SQL qu'on lui soumet
$categories = executeRequete("SELECT DISTINCT categorie FROM produit");


$contenu_gauche .= '<div class="list-group mb-4">';

// On affiche la catégorie "tous" par defaut : 
$contenu_gauche .= '<a href="?categorie=tous" class="list-group-item"> Tous les produits </a>';

// Affichage des categories provenant de la base de données : 
// Boucle while qui ajoutera le resultat du fetch à $cat tant qu'il y'aura des catégories récupérées
while ($cat = $categories->fetch(PDO::FETCH_ASSOC)) {
    $contenu_gauche .= '<a href="?categorie=' . $cat['categorie'] . '" class="list-group-item">' . $cat['categorie'] . '</a>';
}
$contenu_gauche .= '</div>';

// Affichage des produits en fonction de la catégorie :

if (isset($_GET['categorie']) && $_GET['categorie'] != 'tous') {
    $donnees = executeRequete("SELECT * FROM produit WHERE categorie = :categorie", [':categorie' => $_GET['categorie']]);
} else {
    $donnees = executeRequete("SELECT * FROM produit");
}

while ($produit = $donnees->fetch(PDO::FETCH_ASSOC)) {
    $contenu_droite .= '<div class="col-sm-4 mb-4">';

    $contenu_droite .= '<div class="card">';

    // image cliquable:
    $contenu_droite .= '<a href="fiche_produit.php?id_produit=' . $produit['id'] . '">
                        <img src="' . $produit['photo'] . '" alt="' . $produit['titre'] . '" class="card-img-top">
                        </a>';

    // infos du produit : 
    $contenu_droite .= '<div class="card-body">';
    $contenu_droite .= '<h4>' . ucfirst($produit['titre']) . '</h4>';
    $contenu_droite .= '<h5>' . number_format($produit['prix'], 2, ',', '') . '€ </h5>';
    $contenu_droite .= '<p>' . $produit['description'] . '</p>';
    $contenu_droite .= '</div>';
    $contenu_droite .= '</div>';
    $contenu_droite .= '</div>';
}

?>



<h1 class="mt-4">Vêtements</h1>

<div class="row">
    <div class="col-md-3">
        <?= $contenu_gauche; ?>
    </div>
    <div class="col-md-9">
        <?php if (empty($contenu_droite)) { ?>
            <h2>Aucun produit disponible pour le moment</h2>
        <?php } else { ?>
            <?= $contenu_droite; ?>
        <?php } ?>
    </div>
</div>

<?php require_once './inc/bas.inc.php'; ?>