<?php
echo '<table>';
    echo '<tr>';
for ($i=1; $i < 200; $i++) {
    if ($i % 10 == 1) {
        echo '</tr><tr>';
    }

    switch ($i) {
        case (int)sqrt($i) == sqrt($i):
            echo "<td style=\"color:blue\">$i</td>";
            break;
            
        case $i % 17 == 0:
            echo "<td style=\"color:red\">$i</td>";
            break;
                    
        default:
            echo "<td style=\"color:black\">$i</td>";
            break;
    }
}
            echo '</tr>';

    echo '</table>';
