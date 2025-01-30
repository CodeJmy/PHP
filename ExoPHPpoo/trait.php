<?php
// Création du trait "Greet"

trait Greet  {
    // function sayHello
    public function sayHello()
    {
        echo "Hello, world!";
    }
}

class Personnes {
    use Greet;
}

class Robot {
    use Greet;
}

class Animal {
    use Greet;
}
// Utilisation des traits

$personne = new Personnes();
$personne->sayHello(); // Affiche : Hello, world!

$robot = new Robot();
$robot->sayHello(); // Affiche : Hello, world!

$animal = new Animal();
$animal->sayHello(); // Affiche : Hello, world!



?>