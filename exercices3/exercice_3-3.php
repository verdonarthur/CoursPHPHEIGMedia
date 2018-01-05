<?php
define("NBR_COL", 10);

function display_beg_end($begin_number, $end_number)
{
    if ($begin_number>$end_number) {
        throw Exception("begin number must be smaller than end number");
    }

    print("<tr>");
    for ($i=$begin_number,$j=0; $i <= $end_number; $i++,$j++) {
        if ($j%10 == 0) {
            print("</tr><tr>");
        }
    
        print("<td>$i<td>");
    }
}
?>
<table>
<?php
    display_beg_end(4, 250);
?>
</table>
