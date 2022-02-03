# Structurer une application avec des classes :sunglasses:

Voici un petit site internet de 3 pages.

Actuellement, il y a 3 fichiers HTML statiques (1 par page du site).

On va améliorer ce site et rendre le tout _dynamique_ !

Pour ce faire, on va adopter une _structuration_ orientée objet plus professionnelle, plus maintenable et plus scalable. :+1:

## Étape 1 : préparation

- **Fichiers views** :
  - déplacer les fichiers HTML dans un sous-répertoire _`/views`_
  - renommer :
    - le fichier `index.html` en `home.tpl.php`
    - et les 2 autres fichiers `.html` en fichiers `.tpl.php`
  - les fichiers `.tpl.php` (tpl = templates) seront responsables de la génération du code HTML de nos pages
- **Fichier point d'entrée unique** :
  - créer le fichier "point d'entrée" du site dynamique à la racine du projet, par convention, nommons le  `index.php`
  - :thinking: _ce fichier correspond aux URLs que nous "exposons" à nos visiteurs : ils n'accéderont jamais directement au dossier `/views`_
- **Lier les deux** :
  - :bulb: pour distinguer les pages malgré notre point d'entrée unique, on va utiliser un paramètre d'URL (query string)​
  - ainsi, dans `index.php`, selon la valeur du _paramètre d'URL `page`_ => **inclure le template correspondant**
    - **page d'accueil** : 
      - URL : `index.php` 
      - template à charger : `home.tpl.php`
    - **page magasin** : 
      - URL : `index.php?page=store`
      - template à charger : `store.tpl.php`
    - **page produits** :
      - URL : `index.php?page=products`
      - template à charger : `products.tpl.php`

```php
require_once __DIR__.'/views/home.tpl.php'; // pour la home
```

## Étape 2 : views

- `view` ou `template`, même combat :muscle: :art: :lipstick:
- **factoriser le code HTML répété** dans les fichiers de vue (templates) :
  - créer une vue `header.tpl.php` dans _views_
  - créer une vue `footer.tpl.php` dans _views_
- **inclure ces 2 fichiers** sur toutes les pages du site en modifiant l'unique fichier "point d'entrée"

## Étape 3 : une fonction d'affichage

- **déclarer une fonction `show` dans `index.php`** qui va s'occuper d'inclure les vues

  ```php
  function show($viewName)
  {
      require_once __DIR__.'/views/header.tpl.php';
      require_once __DIR__.'/views/'.$viewName.'.tpl.php';
      require_once __DIR__.'/views/footer.tpl.php';
  }
  ```

- **utiliser cette fonction** pour générer le code HTML de la page

- :thinking: pourrait-on réutiliser cette fonction dans d'autres projets ayant la même structure ?

## Étape 4 : heures d'ouverture

- dans la page "store", on affiche les horaires d'ouverture
- et, dans le code HTML d'origine,
  - le _jour d'aujourd'hui_ est affiché en jaune et en gras
  - cependant, c'est du code JavaScript qui fait cela (ajout d'une classe CSS `today` sur le bon `<li>`)
- **désormais, on voudrait générer les horaires et l'affichage du jour d'aujourd'hui avec PHP** sans code JavaScript :boom:
- **on va donc avoir besoin des données suivantes** :
  - les _horaires d'ouverture_ de chaque jour de la semaine (voir tableau ci-dessous)
  - le _jour d'aujourd'hui_ (:bulb: la [fonction date()](https://www.php.net/manual/fr/function.date.php) pourrait nous aider)
- **mais où coder tout ça ?** :thinking:
  - ~~directement dans les fichiers _views/templates_~~ :x:
  - pour continuer à bien _séparer les choses_ : 
    - on va d'abord _préparer les données_ :+1:
    - puis _les transmettre à nos templates_ :heavy_check_mark:
    - :warning:  il va falloir modifier la `fonction show()` et faire attention à la portée des variables :smiling_imp:

<details><summary>Tableau des horaires d'ouverture</summary>


```php
$weekOpeningHours = [
    'Sunday' => 'Closed', 
    'Monday' => '7:00 AM to 8:00 PM',
    'Tuesday' => '7:00 AM to 8:00 PM',
    'Wednesday' => '7:00 AM to 8:00 PM',
    'Thursday' => '7:00 AM to 8:00 PM',
    'Friday' => '7:00 AM to 8:00 PM',
    'Saturday' => '9:00 AM to 5:00 PM'
];
```

</details>

<details><summary>Nouvelle fonction <code>show()</code></summary>

La paramètre `$viewData` représente les données que l'on veut transmettre à nos `views/templates`. C'est un tableau (`array`) qui peut contenir 0, 1 ou plusieurs données selon le nombre d'informations nécessaires à la génération du HTML dans nos `views/templates`.


```php
function show($viewName, $viewData = [])
{
    // $viewData est disponible dans chaque fichier de vue
    require_once __DIR__.'/views/header.tpl.php';
    require_once __DIR__.'/views/'.$viewName.'.tpl.php';
    require_once __DIR__.'/views/footer.tpl.php';
}    
```

</details>

## Étape 5 : controllers

- **créer une classe `MainController`** dans le sous-répertoire `controllers`

- **déclarer 3 méthodes vides** dans ce `MainController` :

  - `home` (correspondant à la page d'accueil)
  - `products` (correspondant à la page "products")
  - `store` (correspondant à la page "store")

- **déclarer la méthode `show`** dans `MainController` qui va s'occuper d'inclure les _views_

  ```php
  public function show($viewName, $viewData = [])
  {
      // $viewData est disponible dans chaque fichier de vue
      require_once __DIR__.'/../views/header.tpl.php';
      require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
      require_once __DIR__.'/../views/footer.tpl.php';
  }
  ```

- **dans le corps des 3 méthodes vides** :

  - appeler la méthode `show` sur l'objet courant (`$this`) en précisant en argument quelle _view_ vous souhaitez voir afficher
  - exemple pour la méthode `home() `:

  ```php
  public function home()
  {
      // Délègue l'affichage à la méthode "show" du MainController
      $this->show('home');
  }
  ```

- **dans le corps de la méthode `store`** :

  - appeler la méthode `show` en ajoutant en _2ème argument_, un `array` contenant les données que vous souhaitez transmettre à la _view_

- **modifier le fichier "point d'entrée"** :

  - retirer l'inclusion existante (_views_)

  - inclure la classe `MainController`

  - instancier un objet `MainController`

  - appeler la méthode de l'objet `MainController` correspondant au point d'entrée

    ```php
    <?php
    // File index.php
    // [...]
    // Instanciation de la classe MainController
    $controller = new MainController();
    // Appel de la méthode correspondant à ce point d'entrée (page)
    $controller->home();
    ```

- `point d'entrée` > `valeur du paramètre 'page' ?` > `choix et appel de la méthode du controller` > `affichage de la bonne view` > :ok_hand:

## Dernière étape

Job's done ! :muscle: :tada: :champagne:

Se féliciter, relire la structure de nos fichiers et se représenter le parcours du script PHP dans nos fichiers pour afficher une page HTML, depuis le moment où l'utilisateur entre une URL, jusqu'au moment où il voit le résultat s'afficher.
