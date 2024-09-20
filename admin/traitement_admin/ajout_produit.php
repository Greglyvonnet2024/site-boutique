<?php

require_once '../../inc/init.inc.php';

if(!empty($_POST)&& $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])){
    extract($_POST);
    // traitement etr vérification des champs

    if(empty($reference) || empty($categorie) || empty($titre) || empty($description) || empty($couleur) || empty($taille) ||empty($public) || !isset($_FILES['photo']) || empty($titre) || empty($stock) ) {
        $_SESSION['erreur_admin'] .= '<p class="alert alert-danger">Tous les champs doivent être remplis </p>';
        header('Location: ' .ROOT . 'admin/gestion_produits.php');
    
    }else{
        $fileTMP = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];
        $fileType = $_FILES['photo']['type'];
        $fileNameCmps = explode('.',($fileNameCmps));
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = ['jpg','gif','png','webp'];

        if(in_array($fileExtension,$allowedExtensions)){
            $newFileName = md5(time() . $fileName) . '.' . 
            $fileExtension;

            $uploadDirFile = ROOT . 'img';

            $destination = $uploadDirFile . $newFileName;


            if(move_uploaded_file($fileTMP,$destination)){
executeRequete("INSERT INTO produit VALUES (:reference, :categorie, :titre, :description, :couleur , :taille, :public, :photo, :prix, :stock,)")

            }
        }else{
            $_SESSION['erreur_admin'] = '<p class="alert alert-danger"> L\'image n\'est pas autorisé </p>';
            header('Location: ' . ROOT . 'admin/gestion_produits.php');
        }
    }
}



?>