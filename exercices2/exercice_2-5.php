<?php
function is_all_pair($array)
{
    for ($i=0; $i<count($array); $i++) {
        if ($array[$i] % 2 != 0) {
            return false;
        }
    }
    return true;
}

$CONST_NB_PLAYER = 4;
$isSixOut = false;
$j=1;
$array_generatedNB;
?>
<table>
<tr>
    <th>Tir numero</th>
    <?php
    for ($i=0; $i < $CONST_NB_PLAYER; $i++) {
        echo '<th>Joueur '.($i+1).'</th>';
    }
    ?>
</tr>
<?php
    $j=0;
    do {
        for ($i=0; $i<$CONST_NB_PLAYER; $i++) {
            $array_generatedNB[$i]=rand(1, 6);
        }
        if (is_all_pair($array_generatedNB)) {
            echo "<tr><td>Tir ".$j."</td>";
            for ($i=0; $i<$CONST_NB_PLAYER; $i++) {
                echo '<td style=\'';
                if (max($array_generatedNB) == $array_generatedNB[$i]) {
                    echo 'font-weight:bold;';
                }
                if ($array_generatedNB[$i] == 6) {
                    echo 'color:red;';
                    $isSixOut=true;
                }
                echo "'>$array_generatedNB[$i]</td>";
            }
            echo '</tr>';
        }
        $j++;
    } while (!$isSixOut);
?>
</table>
