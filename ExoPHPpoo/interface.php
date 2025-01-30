<?php
interface calculable 
{
    public function calculer($a, $b);
}

class addition implements calculable {
    public function calculer($a, $b) {
        return $a + $b;
    }
}

class multiplication implements calculable {
    public function calculer($a, $b) {
        return $a * $b;
    }
}

$addition = new addition();
echo "Addition : ". $addition->calculer(5, 7). "<br>";

$multiplication = new multiplication();
echo "Multiplication : ". $multiplication->calculer(5, 7). "<br>";

?>