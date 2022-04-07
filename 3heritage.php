<?php

/*
 L'héritage permet d'étendre une classe ou de la rendre plus spécifique. Elle permet de lier deux classes.

La classe enfant étend la classe parent.

En PHP, une classe peut uniquement hériter d'une seule classe de base. Il n'y a pas d'héritage multiple.

Par exemple, des relations de classes parente / enfant peuvent être : Animal / Oiseau, Utilisateur / Administrateur, Nourriture / Fruit etc.

L'héritage permet d'abstraire certaines fonctionnalités communes à plusieurs classes, tout en permettant la mise en place de fonctionnalités spécifiques dans les classes enfants, sans avoir à réimplémenter toutes les fonctionnalités communes.

Autrement dit, la classe enfant va hériter de toutes les propriétés (qui ne sont pas privées, comme nous le reverrons) et toutes les méthodes de la classe parente. Elle pourra également définir ses propres propriétés et méthodes.

On utilise le mot clé extends pour déclarer la relation d'héritage entre deux classes :
*/

class Felin {

  public bool $griffes = true;
  public bool $digitigrade = true;

  public function rugir() {
    echo 'Rrrrrrr !';
  }
}

class Lion extends Felin {
  public bool $criniere = true;
}

$lion1 = new Lion();
$lion1->rugir(); // Rrrrrrr !

/*
Héritage et constructeurs
Si la classe enfant ne définit pas de constructeur, celui de sa classe parente sera automatiquement appelée :
*/
class User {
  function __construct(public string $prenom, public string $nom) {}

  function direBonjour() {
    echo "Bonjour, je suis $this->prenom $this->nom. <br>";
  }
}

class Admin extends User {
  public bool $isAdmin = true;
}

$dupont = new Admin('Jean', 'Dupont');
$dupont->direBonjour(); // Bonjour, je suis Jean Dupont.
echo $dupont->isAdmin; // 1

/*
Si la classe enfant définit un constructeur, il sera nécessaire de faire appel à parent::__construct() depuis le constructeur enfant si vous souhaitez également appeler le constructeur parent :
*/
<?php
class User {
  function __construct(public string $prenom, public string $nom) {}

  function direBonjour() {
    echo "Bonjour, je suis $this->prenom $this->nom. <br>";
  }
}

class Admin extends User {
  public bool $isAdmin = true;
  function __construct(string $prenom, string $nom, public bool $superadmin) {
    parent::__construct($prenom, $nom);
  }

}

$dupont = new Admin('Jean', 'Dupont', true);
$dupont->direBonjour(); // Bonjour, je suis Jean Dupont.
echo $dupont->superadmin; // 1
 
/*
Les surcharges
Les constantes, méthodes, et propriétés héritées peuvent être surchargées.

Une surcharge est le fait de redéclarer dans la classe enfant des constantes, méthodes ou propriétés ayant le même nom que dans la classe parente.

Une surcharge peut par exemple être utilisée pour écraser une valeur ou pour rendre une méthode plus spécifique.
 */

 /*
 Surcharger des propriétés
Prenons un premier exemple simple :
 */

class User {
  public bool $isAdmin = false;

  function __construct(public string $prenom, public string $nom) {}

  function direBonjour() {
    echo "Bonjour, je suis $this->prenom $this->nom. <br>";
  }
}

class Admin extends User {
  public bool $isAdmin = true;
}

$dupont = new Admin('Jean', 'Dupont');
$dupont->direBonjour(); // Bonjour, je suis Jean Dupont.
echo $dupont->isAdmin; // 1

 /*
Dans l'exemple précédent nous surchargeons la propriété $isAdmin pour écraser la valeur de la classe parente pour les objets instanciés depuis la classe enfant.
 */

/* Surcharger des méthodes
Pour surcharger une méthode, il faut que sa signature soit compatible avec la méthode parente.*/

<?php
class User {
  function direBonjour($prenom, $nom) {
    echo "Bonjour, je suis $prenom $nom";
  }
}

class Admin extends User {
  function direBonjour($prenom, $nom) {
    echo "Bonjour, je suis $prenom $nom et je suis un admin. <br>";
  }
}

$dupont = new Admin();
$dupont->direBonjour('Jean', 'Dupont'); // Bonjour, je suis Jean Dupont et je suis un admin.

/* 
Vous aurez une erreur si la méthode surchargée n'a pas au moins les mêmes paramètres.

Notez que vous pouvez appeler la méthode parente depuis la méthode surchargée sur la classe enfant :
*/
class User {
  function direBonjour($prenom, $nom) {
    echo "Bonjour, je suis $prenom $nom";
  }
}

class Admin extends User {
  function direBonjour($prenom, $nom) {
    parent::direBonjour($prenom, $nom);
    echo " et je suis un admin. <br>";
  }
}

$dupont = new Admin();
$dupont->direBonjour('Jean', 'Dupont'); // Bonjour, je suis Jean Dupont et je suis un admin.

/* 
*/

/* 
*/

/* 
*/

/* 
*/

/* 
*/