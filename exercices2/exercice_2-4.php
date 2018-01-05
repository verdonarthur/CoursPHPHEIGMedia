<?php
function sandwich($a,$b){
    return $a." - ".$b." - ".$a;
}

echo sandwich("pain",sandwich("salade",sandwich("tomate","viande")));

?>