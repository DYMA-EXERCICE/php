<?php

/* Définir une classe
La syntaxe d'une classe est : le mot clé class suivi du nom de la classe, avec une majuscule par convention, suivie d'accolades :

class MaClasse {
}

Les propriétés et les méthodes
Une classe peut contenir des variables, appelées propriétés, et des fonctions appelées méthodes. Elle peut également contenir des constantes.

<?php
class MaClasse {
  public $var = 'une valeur';

  public function direBonjour() {
    echo 'Bonjour !';
  }
}

Créer une instance
Pour instancier une classe, c'est-à-dire pour créer un nouvel objet à partir d'une classe, il faut utiliser le mot clé new :

<?php
class MaClasse {
  public $var = 'une valeur';

  public function direBonjour() {
    echo 'Bonjour !';
  }
}

$instance1 = new MaClasse();
echo '<pre>';
var_dump($instance1);
echo '</pre>';
/* object(MaClasse)#1 (1) {
  ["var"]=>
  string(10) "une valeur"
}

Accès aux propriétés et méthodes
Pour accéder à une propriété ou à une méthode d'un objet, il suffit d'utiliser -> suivi du nom de la propriété ou de la méthode sans $ :
<?php
class MaClasse {
  public $var = 'une valeur';

  public function direBonjour() {
    echo 'Bonjour !';
  }
}

$instance1 = new MaClasse();

echo $instance1->var, '<br>'; // une valeur
echo $instance1->direBonjour(), '<br>'; // Bonjour !

L'assignation d'un objet désigne le même objet
Lorsque vous assignez un objet déjà créé à une variable, l'objet ne sera pas copié et la variable accédera au même objet :
<?php
class MaClasse {
  public $var = 'une valeur';

  public function direBonjour() {
    echo 'Bonjour !';
  }
}

$instance1 = new MaClasse();
$var2 = $instance1;

echo $instance1->var, '<br>'; // une valeur
echo $var2->var, '<br>'; // une valeur

$var2->var = 42;

echo $instance1->var, '<br>'; // 42
echo $var2->var, '<br>'; // 42

Notez que ce n'est pas exactement une référence, la seule différence avec une référence est lorsque l'on assigne null :
<?php
class MaClasse {
  public $var = 'une valeur';

  public function direBonjour() {
    echo 'Bonjour !';
  }
}

$instance1 = new MaClasse();
$var2 = $instance1;
$reference =& $instance1;

echo $instance1->var, '<br>'; // une valeur
echo $var2->var, '<br>'; // une valeur

$var2 = null;

echo $instance1->var, '<br>'; // null
echo $var2->var, '<br>'; // null
echo $reference->var, '<br>'; // une valeur

C'est donc extrêmement proche d'une référence mais pas identique.

Le mot clé $this
Le mot clé $this permet de désigner l'objet courant.

Autrement dit, lorsque nous utilisons $this dans une méthode, il sera remplacé par l'objet qui utilise la méthode.

Par exemple :
<?php
class MaClasse {
  public $nom = 'Paul';

  public function direBonjour() {
    echo "Bonjour $this->nom !";
  }
}

$instance1 = new MaClasse();

echo $instance1->direBonjour(), '<br>'; // Bonjour Paul !
*/