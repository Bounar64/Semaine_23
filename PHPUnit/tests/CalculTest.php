<?php
/* Charger impérativement avec 'require_once', ne fonctionne dans certains cas avec 'require' */
require_once "./classes/calcul.class.php";

use PHPUnit\Framework\TestCase; // Charge le framework PhpUnit

class CalculTest extends TestCase
{   
    public function testDivideOk()
    {
        $oCalcul = new Calcul();

        $number = 10;
        $divide = 2;

        $result = $oCalcul->divide($number, $divide);

        // On attend le que le résultat de 10/2 soit 5 :
        $this->assertEquals(5, $result);
    }

    public function testDivideZero()
    {
        $oCalcul = new Calcul();

        $number = 10;
        $divide = 0;

        $result = $oCalcul->divide($number, $divide);

        // On attend le que le résultat de 10/0 soit false :
        $this->assertEquals(false, $result)
    }        
}
?>