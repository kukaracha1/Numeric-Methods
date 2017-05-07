<?php

include 'methods.php';


// класс метода
class Method
{
    public $name;
    public $Teta;

    public function __construct($name , $Teta)
    {
        $this->name = $name;
        $this->Teta = $Teta;
    }
}

// класс данных
class Data
{
    public $function;
    public $a ;
    public $b ;
    public $accuracy;
    public $n;

    public function __construct()
    {
        $this->a = (int)$_GET['a'];
        $this->b = (int)$_GET['b'];
        $this->accuracy = (float)$_GET['accuracy'];
        $this->function = $_GET['function'];
        // $this->n = $_GET['n'];
        $this->n = 36;
    }

}


$Data = new Data();

// объявляем массив методов с тетами
$methods[] = new Method('Trapezium' , 1/3);
$methods[] = new Method('Parabola' , 1/15);
$methods[] = new Method('Three_eighths' , 1/3);

// высчитывает значение игрика для заданного икса
function equate($x)
{
    global $Data;
   
   // $result = 1;
   // echo $Data->function;

    // eval('$result =' . $Data->function . ';');
    // return $result;

    // x^2 + 10x + 3
     return $x*$x;
}

//выполняет единичный расчет для заданного метода
function Valu_at_a_point($a, $b, $n, $method_name)
{							
    $array=array();
    $h=($b-$a)/$n;
    for($i=$a;$i<=$b;$i+=$h)
    {
        $y= equate($i);
        array_push($array,$y);
    }
    
    return $method_name($array,$h);
}


// расчет 3-х методов с погрешностями

//echo "{";
for ($i=0 ; $i<3 ; $i++)
{	
    $newN = $Data->n;
    // echo $newN%$i;
    // if ($newN % ($i+1) == 0)
    // {
    do
    // $delta = $Data->accuracy;

    // while($delta > $Data->accuracy)
    {
        $solution1 = Valu_at_a_point($Data->a,$Data->b , $newN , $methods[$i]->name);
        $newN *=2;
        $solution2 = Valu_at_a_point($Data->a,$Data->b , $newN , $methods[$i]->name);
        $delta = abs($solution2 - $solution1)* $methods[$i]->Teta;
        
    }while($delta > $Data->accuracy);

    echo $methods[$i]->name . ": ". sprintf("%.4f", $solution2) . ": " . $delta ;

    if ($i<2)
        echo " , ";
    // }
    }
// }

//echo "}";

?>