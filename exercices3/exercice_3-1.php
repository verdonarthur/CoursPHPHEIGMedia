<?php

/**
 * convert an amount in chf in eur and usd
 * @param $chf amount in chf
 * @return array with key chf, eur and usd
 */
function convert_currency($chf)
{
    $usd=(1/0.91)*$chf;
    $eur=(1/1.22)*$chf;

    return array("chf"=>$chf,"usd"=>$usd,"eur"=>$eur);
}

?>