<?php
/************* MainController ******************* 
  
Je suis le seul controller (pour l'instant)

Mon rôle est de donner les informations nécéssaires
à l'affichage d'une vue.

C'est aussi moi qui fait les require
je suis donc en charge de la méthode show()

*******************************************/

class MainController {

    private $weekOpeningHours;

    /**
     * Construteur où je met mes valeurs par défaut
     */
    public function __construct()
    {
        // en prévision d'aller les chercher en BDD (fin de saison 5)
        $this->weekOpeningHours = [
            'Sunday' => 'Closed', 
            'Monday' => '7:00 AM to 8:00 PM',
            'Tuesday' => '12:12 AM to 8:00 PM',
            'Wednesday' => '7:00 AM to 8:00 PM',
            'Thursday' => '7:00 AM to 8:00 PM',
            'Friday' => '7:00 AM to 8:00 PM',
            'Saturday' => '9:00 AM to 5:00 PM'
        ];
    }


    public function affichePageStore(){
        // j'utilise la méthode show avec les bons paramètres
        // je sais que cette méthode doit affiche la page store, obvious, le nom de la méthode
        $this->show('store', $this->weekOpeningHours);
    }


    public function affichePageHome(){
        // j'utilise la méthode show avec les bons paramètres
        // je sais que cette méthode doit affiche la page store, obvious, le nom de la méthode
        $this->show('home', "Je suis la page HOME");
    }

    public function affichePageProducts(){
        // j'utilise la méthode show avec les bons paramètres
        // je sais que cette méthode doit affiche la page store, obvious, le nom de la méthode
        $this->show('products', "Je suis la page PRODUCTS");
    }

    public function affichePageAbout(){
        // j'utilise la méthode show avec les bons paramètres
        // je sais que cette méthode doit affiche la page store, obvious, le nom de la méthode
        $this->show('about', "Je suis la page ABOUT");
    }
/**
 * Fonction qui require les templates HEADER / FOOTER
 * Ainsi que la vue donnée en paramètre
 * Et surtout les informations nécessaire/essentielle à l'affichage vue
 *
 * @param string $viewName le nom du fichier template à inclure
 * @param $viewData Contient toutes les informations que j'ai besoin pour l'affichage
 */
/* avant de rentrer dans la fonction show
 $viewName = $currentPage;
 $viewData = $weekOpeningHours;
*/
public function show($viewName, $viewData)
{
    require_once __DIR__.'/../views/header.tpl.php';

    /****************************************** */
    // exemples : require_once __DIR__."/views/{$viewName}.tpl.php";
    // si $viewName == 'home'   
    // require_once __DIR__."/views/home.tpl.php";
    // si $viewName == 'products'   
    // require_once __DIR__."/views/products.tpl.php";
    // si $viewName == 'store'   
    // require_once __DIR__."/views/store.tpl.php";
    /****************************************** */
    
    // ici je peux utiliser $viewData
    // donc dans le require aussi

    require_once __DIR__."/../views/{$viewName}.tpl.php";
    require_once __DIR__.'/../views/footer.tpl.php';

    /* A la manière de la Saison 4 */
    //require __DIR__.'/views/header.tpl.php';
    // require __DIR__."/views/{$currentPage}.tpl.php";
    // Autre manière de concatener notre variable
    // require __DIR__.'/views/'.$currentPage.'.tpl.php';
    //require __DIR__.'/views/footer.tpl.php';
}
}