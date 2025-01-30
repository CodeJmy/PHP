<?php
// Déclaration d'une interface
interface Describale{
    public function getDescription();
}
// Déclaration d'un trait
trait Color{
    public $color;
}
// Déclaration de class
class Fruit implements Describale{
    public $fruit;
    use Color;
    public function __construct($fruit, $color){
        $this->fruit = $fruit;
        $this->color = $color;
    }
    public function getDescription(){
        return "La {$this->fruit} est de couleur {$this->color}";
    }
}

$fraise = new Fruit('Fraise' ,'Rouge');
echo $fraise->getDescription();
?>