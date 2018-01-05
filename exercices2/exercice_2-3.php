<?php
function is_prime($x)
{
    if ($x <= 1) {
        return false;
    } elseif ($x <= 3) {
        return true;
    } elseif ($x % 2 == 0 or $x % 3 == 0) {
        return false;
    }
    $i=5;
    while ($i * $i <= $x) {
        if ($x % $i == 0 or $x % ($i + 2) == 0) {
            return false;
        }
        $i = $i + 6;
    }
    return true;
}


echo '<table>';
    echo '<tr>';
for ($i=1; $i < 200; $i++) {
    if ($i % 10 == 1) {
        echo '</tr><tr>';
    }

    switch ($i) {
        case is_prime($i):
            echo "<td style=\"color:red\">$i</td>";
            break;
                    
        default:
            echo "<td style=\"color:black\">$i</td>";
            break;
    }
}
            echo '</tr>';

    echo '</table>';
