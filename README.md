#Framework Twinoid

Framework de développement pour une utilisation simple des API Twinoid.

##Fonctionnalités
* **Gestion de session** - Vous permet de garder en session l'authentification Twinoid (Le token).
* **Gestion de l'authentification Twinoid** - S'occupe de la redirection pour l'authentification Twinoid et la récupération du Token
* **Gestion de l'API Twinoid** - S'occupe d'effectuer les requêtes à l'API Twinoid avec le token précédemment obtenu.
* **Gestion de l'API Hordes** - S'occupe d'effectuer les requêtes à l'API Hordes avec le token précédemment obtenu.
* **Gestion de l'API Mush** - S'occupe d'effectuer les requêtes à l'API Mush avec le token précédemment obtenu.
* **Gestion des erreurs** - Affichage des erreurs de requêtes.

##Configuration
* Assurer vous que l'extension OpenSSL est activée dans `php.ini` (sans ; devant)
```
extension=php_openssl.dll
```

* Ajouter vos informations d'application dans `Config/App.inc.php`
```php
    <?php
      define('REDIRECT_URI', "URL DE REDIRECTION");
      define('CLIENT_ID', "ID DE L'APPLICATION");
      define('CLIENT_SECRET', "CLÉ SECRÈTE");
    ?>
```

##Exemple
Dans notre cas, nous allons récupérer les informations du joueur actuellement connecté.
```php
    <?php
      $hordesApi = new HordesAPI($authTwinoid->getToken());
      $currentUser = $hordesApi->getMe();                       //Retourne un objet User (explication plus bas)
      echo $currentUser->name;                                  //Affiche le pseudo de l'utilisateur
      // Il suffit de remplacer name par la valeur souhaitée de l'objet User.
    ?>
```

###Pour connaître les objets de retour et les valeurs associées
* [Twinoid](http://twinoid.com/developers/api)
* [Hordes](http://www.hordes.fr/tid/api)
* [Mush](http://mush.vg/tid/api)

[Pour de plus amples informations](http://twd.io/e/OAwW0w/0)
