<!-- mcd (Model Conceptuel de Données)

Nom de base de donnée: site e-commorce

1- Entités:

- membre :
1) id, INT PRIMARY_KEY AUTO_INCREMENTE
2) pseudo, VARCHAR (30 taille caractere)
3) mdp, VARCHAT (255) NOT NULL
4) nom, VARCHAT (255) NOT NULL
5) prenom, VARCHAT (255) NOT NULL
6) email, VARCHAT (255) NOT NULL
7) civilité, ENUM ('Mr, Mme, non binaire')
8) ville,VARCHAT (255) NOT NULL
9) code_postale, INT (11) NOT NULL
10) adresse, VARCHAT (255) NOT NULL
11) statut (admin), BOOLEAN (0.1)

Relations: peut "passer" des 'commandes'

- produits:
1) Id, INT PRIMARY_KEY AUTO_INCREMENTE NOT NUL
2) reference, VARCHAT (20) NOT NULL
3) catégorie, VARCHAT (20) NOT NULL
4) titre, VARCHAT (100) NOT NULL
5) description, TEXT NOT NULL
6) couleur, VARCHAT (20) NOT NULL
7) taille, VARCHAT (5) NOT NULL
8) public, ENUM (f, m, mixte)
9) photo, VARCHAT (250) NOT NULL
10) prix, FLOAT NOT NULL
11) stock, INT(3)NOT NULL

Relation: Peut etre contenu dans une 'commande'

- commandes:
1) Id,
2) montant,
3) date_enregistrement,
4) etat,
5) id_membre,

Relation: Peut "contenir" des 'produits'

- détails_commande:
1) Id,
2) quantité,
3) prix,

Relation: "detaille" le contenu de la 'commande' et 'produit' -->