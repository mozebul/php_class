<h1>Type Casting</h1>
<?php 
    $score = (double) "13.50"; // $score = 13.0
echo $score;
echo "<br>";

var_dump($score);
echo "<br>";

$x = (array) "Rokon";
var_dump($x);


?>
<h1>Type Juggling</h1>
<?php
    $total = 5;       // an integer
    $count = "15abc";    // a string
    $total = $total + $count; // $total = 20 (an integer)
    echo $total;
?>

<?php
    $val1 = "1.2e3"; 
    $val2 = 2;
    echo $val1 * $val2; 
?>