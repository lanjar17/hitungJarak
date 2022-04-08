<?php
function buatKotak($baris, $kolom){
            echo "<table border=1>";
            $num = 1;
            for ($i = 1; $i <= $baris; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= $kolom; $j++) {
                    if ($num % 2 == 0) {
                        echo ('<td style="color: white; background: #000">');
                        echo $num;
                        echo ("</td>");
                    } else {
                        echo ('<td style="color: white; background: brown">' . $num . "</td>");
                    }

                    $num++;
                }
                echo "</tr>";
            }


            echo ("</table>");
        }


        
    

?>