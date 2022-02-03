<?php
/************* Point d'entrée ******************* 
  
Je suis le point d'entrée
tout le monde passe par moi pour voir le site.

Je m'occupe de récupérer les informations
$_GET, $_POST

Avec ces informations, je choisit quelle vue/template doit être afficher

C'est moi qui dit qu'elle est la page par défaut
puisque c'est moi qui choisit la vue à afficher

Pas d'info => page par défaut
(ça rime donc c'est vrai :D)

*******************************************/

/**********************************
//?    Require des fichiers de classe / functions / BDD / etc ...
**********************************/

// j'ai besoin du fichier pour la function show()
// require __DIR__.'/functions.php';
require __DIR__.'/controllers/MainController.php';


/**********************************
//?    Je m'occupe de $_GET et je définis la vue à afficher
//?    Par défaut la vue sera 'home'
**********************************/

// exemple de lien : index.php?page=store

// on vérifie que l'utilisateur nous donne bien l'information
// de la page qu'il veux, sinon on lui donne la page par défaut
if (isset($_GET['page'])) {
    // on récupère la page demandé par l'utilisateur
    $currentPage = $_GET['page'];
} else {
    // notre page par défaut
    $currentPage = "home";
}

//? ici nous avons la même condition mais sur une seule ligne :
//?  expression ternaire (ternaire : 3)
/*
 est ce que isset($_GET['page'])  est VRAI ?
 après le ? le résultat si VRAI
 après le : le résultat si FAUX
*/
// $currentPage = isset($_GET['page']) ? $_GET['page'] : 'home'


/**********************************
//?    Je dois fournir des informations à mes vues
//?    Ici je donne les informations suivant la vue que l'on a demandé
**********************************/
// Je créer une instance de MainController
// C'est lui qui s'occupe de la méthode show()
$controller = new MainController();

if ($currentPage == 'store')
{
    // comme c'est le rôle du controller
    // je lui demande d'afficher la page store
    // sans rien savoir de ce que le controller va faire
    $controller->affichePageStore();
}
else if ($currentPage == 'home') {
// comme c'est le rôle du controller
    // je lui demande d'afficher la page home
    // sans rien savoir de ce que le controller va faire
    $controller->affichePageHome();
}
else if ($currentPage == 'products') {
// comme c'est le rôle du controller
    // je lui demande d'afficher la page product
    // sans rien savoir de ce que le controller va faire
    $controller->affichePageProducts();
}
else if ($currentPage == 'about') {
    // comme c'est le rôle du controller
        // je lui demande d'afficher la page product
        // sans rien savoir de ce que le controller va faire
        $controller->affichePageAbout();
    }

