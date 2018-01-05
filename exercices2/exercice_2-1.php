<?php 
    $i = 0;

    
    do{
        $generatedNumber = rand(1,6);
        echo $generatedNumber."\n";
        $i++;
    }while($generatedNumber!=6);

    if($i==0)
        echo "il a fallu $i essai pour obtenir 6";
    else
        echo "il a fallu $i essais pour obtenir 6";
?>