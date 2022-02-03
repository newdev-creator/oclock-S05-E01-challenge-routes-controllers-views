# Définitions

## include VS require VS _once

`include` permet de prendre le contenu d'un autre fichier PHP et de l'écrire dans le fichier

```php
include "nom_autre_fichier.php"
```

`require` permet de prendre le contenu d'un autre fichier PHP et de l'écrire dans le fichier

```php
require "nom_autre_fichier.php"
```

**include VS require VS _once** : la différence n'est visible que si le fichier que l'on veut attraper n'est pas disponible.

`include` génère une erreur de type `E_WARNING` et **continu** d'exécuter le script.

`require` génère une erreur de type `E_COMPILE_ERROR` et **NE continue PAS** d'exécuter le script.

`include_once` et `require_once` fonctionne de la même manière que leur contrepartie sur le type d'erreur, mais ça va prendre le contenu que la **première fois** pour un **même** fichier.

ℹ️ Il n'y a pas de bonne pratique, il faut adapter selon le besoin.

## argument function

Défintion de ma fonction :

```php
function maFonction($monParamtetre) {
   echo monParametre;
}
```

Appel de ma fonction :

```php
$monArgument = 'salut les gens';
maFonction($monArgument); 
```

ici on exécute le code de maFonction donc on exécute les
lignes de codes dans ma fonction en remplaçant `$monParametre` par `$monArgument`
