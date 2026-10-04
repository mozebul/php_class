<h1>PrintF</h1>
<?php 
    
printf("Learning Web development you have to learn %s, %s", "HTML", "CSS");
echo "<br>";

printf("%d bottles of tonic water cost $  %f.", 100, 43.20);
echo "<br>";

printf("$%.3f", 43.2); // outputs $43.20
?>
<h1>SprintF</h1>
<?php 
    $cost = sprintf("$%.2f", 43.2); // $cost = $43.20
    echo $cost;
?>