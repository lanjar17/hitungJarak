<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .genap {
            background-color: black;
            color: white;
        }
    </style>
</head>
<?php

?>

<body>

    <?php
    if (isset($_POST['submit'])) {
        $baris = $_POST['baris'];
        $kolom = $_POST['kolom'];
        function buatKotak($baris, $kolom){
            echo "<table border=1>";
            $num = 1;
            for ($i = 1; $i <= $baris; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= $kolom; $j++) {
                    if ($num % 2 == 0) {
                        echo ('<td class="genap">');
                        echo $num;
                        echo ("</td>");
                    } else {
                        echo ("<td>" . $num . "</td>");
                    }

                    $num++;
                }
                echo "</tr>";
            }


            echo ("</table>");
        }


        buatKotak($baris, $kolom);
    }
    ?>
</body>

</html>