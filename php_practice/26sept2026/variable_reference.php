<?php
    $value1 = "Hello";
    $value2 =&$value1;    
    $value2 = "Goodbye";   

    echo "Value2: " . $value2;
    echo "<br>";
    echo "Value1: " . $value1;
?>