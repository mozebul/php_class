<!-- Numeric indexed Array -->
<?php 
    $fruits = array("Mango", "Banana", "Grape");
    echo "<pre>";
    print_r($fruits);
?>
<!-- Associative Array -->
 <?php 
    $results = ["Rokon"=>45, "Rifat"=>40, "Muzib"=>48];
    
    print_r($results);
?>
<!-- Multi Dimensional Array -->
<?php
    $myArr = array("Volvo", 15, ["apples", "bananas"]);
    print_r($myArr);
?>