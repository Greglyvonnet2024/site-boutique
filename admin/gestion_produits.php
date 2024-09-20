<?php
require_once '../inc/haut.inc.php';

if (!internauteEstConnecteEtAdmin()) {
    header('Location: ' . ROOT . 'connection.php');
    // exit();
}

// <!-- 3- formulaire d'ajout d'un produit  -->

?>

<form method="post" action="./traitement_admin/ajout_produit.php" enctype="multipart/form-data"><!-- enctype="multipart/form-data" spécifie que le formulaire envoie des données binaires (correspondants au fichier uploadé) et des données textes (correspondants aux autres champs). Il est obligatoire pour pouvoir uploader des fichiers. -->

    <input type="hidden" name="id_produit" value="0"><!-- champ caché utile pour la modification d'un produit existant, car on a besoin de le connaître pour la requête SQL REPLACE INTO qui se comporte comme un UPDATE en présence d'un id existant. La value à 0 permet de spécifier que l'id n'existe pas, donc que REPLACE INTO doit se comporter comme un INSERT pour créer le produit. -->

    <label for="reference">Référence</label><br>

    <input type="text" id="reference" name="reference" value="<?= (isset($produit_a_modif)) ? $produit_a_modif['reference'] : '' ?>"><br><br>

    <label for="categorie">Catégorie</label><br>
    <input type="text" id="categorie" name="categorie" value=""><br><br>

    <label for="titre">Titre</label><br>
    <input type="text" id="titre" name="titre" value=""><br><br>

    <label for="description">Description</label><br>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <br><br>

    <label for="couleur">Couleur</label><br>
    <input type="text" id="couleur" name="couleur" value=""><br><br>

    <label>Taille</label><br>
    <select name="taille" id="taille">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
    </select><br><br>

    <label for="public">Public</label><br>
    <input type="radio" name="public" value="m" checked> Homme
    <input type="radio" name="public" value="f"> Femme
    <br><br>

    <label for="photo">Photo</label><br>
    <!-- 5- PHOTO -->
    <input type="file" id="photo" name="photo"><br><br><!-- ne pas oublier l'attribut enctype de la balise form pour pouvoir uploader des fichiers -->

    <label for="prix">Prix</label><br>
    <input type="text" id="prix" name="prix" value="0"><br><br>

    <label for="stock">Stock</label><br>
    <input type="text" id="stock" name="stock" value="0"><br><br>

    <input type="submit" value="enregistrer" class="btn" name="ajouter">
</form>

<?php
require_once '../inc/haut.inc.php'; ?>
