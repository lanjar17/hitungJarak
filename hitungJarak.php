<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="addLocation.php" method="post">
        <div>
            <label for="namaTempat">Nama Tempat</label>
            <input type="text" name="namaTempat" id="namaTempat">
        </div>

        <div>
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" id="latitude">
        </div>

        <div>
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" id="longitude">
        </div>
        <div>
            <button type="submit">Simpan</button>
        </div>
    </form>

    <hr>
    <h3>Daftar Lokasi</h3>

    <table border="1">
        <thead>
            <th>Nama Lokasi</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Jarak</th>
        </thead>
        <tbody>


            <?php
            $file = fopen("locations.csv", "r") or die("jajja");
            $n = 0;
            rewind($file);
            while (!feof($file)) {
                $hasil = explode(",", fgets($file));

                if ($n == 0) {
                    $n++;
                    continue;
                }

                $location = $hasil[0];
                $latitude = str_replace('"', '', $hasil[1]);
                $longitude = str_replace('"', '', $hasil[2]);
            ?>

                <tr>
                    <td><?= $location; ?></td>
                    <td><?= $latitude; ?></td>
                    <td><?= $longitude; ?></td>
                    <td><?= hitungJarak($latitude, $longitude); ?></td>
                </tr>

            <?php
                $n++;
            }
            fclose($file);
            ?>
        </tbody>
    </table>
</body>

</html>

<?php

function hitungJarak($y1, $y2)
{
    $x1 = -7.56526;
    $x2 = 110.81423;

    $r = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    return $r;
}

?>