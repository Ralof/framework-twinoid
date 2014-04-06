#Framework twinoid

Framework de développement pour une utilisation simple des API Twinoid.

##Fonctionnalités
* **Gestion de session** - Vous permet de garder en session l'authentification twinoid (Le token)
* **Gestion de l'authentification Twinoid** - S'occupe de la redirection pour l'authentification Twinoid et la récupération du Token
* **Gestion de l'API Hordes** - S'occupe d'effectuer les requêtes à l'API Hordes avec le token précédemment obtenu.
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

[Pour de plus amples informations](http://twd.io/e/OAwW0w/0)
