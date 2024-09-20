<?php   
//inti.inc est le fichier de configuration de notre application

//connexion a la BDD
$pdo = new PDO('mysql:host=localhost;dbname=site_commerce','root','',
[PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8']);

// On demarre la session ici:

session_start();

// On note le chemin racine de l'application:
const ROOT = '/site-boutique/';
// definie (ROOT,'/site_boutique/')

// Variable d'affichage
$contenu = '';
$contenu_gauche = '';
$contenu_droite= '';

// On inclut le fichier qui contiendra les fonctions de l'application
require_once 'fonctions.inc.php';





?>