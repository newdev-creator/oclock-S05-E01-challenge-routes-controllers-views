<?php 
/**
 * Fonction qui require les templates HEADER / FOOTER
 * Ainsi que la vue donnée en paramètre
 *
 * @param string $viewName le nom du fichier template à inclure
 * @param $viewData Contient toutes les informations que j'ai besoin pour l'affichage
 */
/* avant de rentrer dans la fonction show
 $viewName = $currentPage;
 $viewData = $weekOpeningHours;
*/
function show($viewName, $viewData)
{
    require_once __DIR__.'/views/header.tpl.php';

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

    require_once __DIR__."/views/{$viewName}.tpl.php";
    require_once __DIR__.'/views/footer.tpl.php';

    /* A la manière de la Saison 4 */
    //require __DIR__.'/views/header.tpl.php';
    // require __DIR__."/views/{$currentPage}.tpl.php";
    // Autre manière de concatener notre variable
    // require __DIR__.'/views/'.$currentPage.'.tpl.php';
    //require __DIR__.'/views/footer.tpl.php';
}