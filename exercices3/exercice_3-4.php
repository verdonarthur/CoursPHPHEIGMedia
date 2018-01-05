<?php
// PHP 7
//define("LIST_ARTICLE",array("bose qc 35"=>255,"xiaomi redmi note 4x"=>125,"surface book i5"=>1300,"moto g watch"=>100));
//PHP 5.6
$LIST_ARTICLE = array("bose qc 35"=>255,"xiaomi redmi note 4x"=>125,"surface book i5"=>1300,"moto g watch"=>100);

/**
 * apply a 8 percent TVA on a $nbr
 * @param $nbr number
 * @return the tva apllied 
 */
function apply_tva($nbr){
    return $nbr+($nbr*(8/100));
}

/**
 * apply a two decimal round to a nbr
 * @param $nbr number
 * @return round number  
 */
function nbr_round($nbr){
    return round($nbr,2);
}

?>

<ul>
<?php 

foreach($LIST_ARTICLE as $name=>$price){
    print("<li>$name : ".nbr_round(apply_tva($price))."</li>");
}

?>
</ul>