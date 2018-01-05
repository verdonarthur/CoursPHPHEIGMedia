<?php

    $datetime1 = new DateTime("now");
    $datetime2 = new DateTime('24-02-2011 14:00:00');
    $interval = ($datetime1->diff($datetime2));
    echo $interval->format('%y ans %d jours %H heure %m minutes');
?>