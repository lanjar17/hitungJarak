<?php
include "functionJarak.php";

$myfile = fopen("locations.csv", "r") or die("Can't open file");
$dataLokasi = array();
$n = 0;
$latTS = -7.56526;
$longTS = 110.81423;

?>

<!DOCTYPE html>
<html>

<head>
    <title>World's Wonder Database</title>
</head>

<body>
    <h2>Tambah Data Lokasi</h2>
    <form method="post" action="tambah.php">
        <table>
            <tr>
                <td><label>Location</label></td>
                <td><input type="text" name="loc"></td>
            </tr>
            <tr>
                <td><label>Latitude</label></td>
                <td><input type="text" name="lat"></td>
            </tr>
            <tr>
                <td><label>Longitude</label></td>
                <td><input type="text" name="long"></td>
            </tr>
            <tr>
                <td> </td>
                <td style="text-align: right"><input type="submit" name="submit"></td>
            </tr>
        </table>
    </form>
    <br>
    <hr>
    <br>
    <h2>Location</h2>

    <?php
    while (!feof($myfile)) {

        //ditaruh diatas sebelum lompatan baris pertama
        
        $expl = explode(",", fgets($myfile));
        
        if ($n == 0) {
            $n++;
            continue;
        }


        $name = $expl[0];
        //menghilankan 
        $lat = str_replace('"', "", $expl[1]);
        $long = str_replace('"', "", $expl[2]);

        //hitung jarak
        $jarak = cariJarak($latTS, $longTS, (float)$lat, (float)$long);

        //membentuk data array associatif
        $data = array("loc" => $name, "lat" => $lat, "long" => $long, "jarak" => $jarak);

        //tambah array ke data lokasi
        array_push($dataLokasi, $data);

        //menampilkan data
        /*echo "<tr>
					<td>" . $name . "</td>
					<td>" . $lat . "</td>
					<td>" . $long . "</td>
					<td>" . number_format($jarak, 2, ".", "") . "</td>
				</tr>";*/

        $n++;
    }

    //ambil data pada kolom jarak
    $colJarak = array_column($dataLokasi, "jarak");

    //sort data lokasi berdasar jarak secara ascending
    array_multisort($colJarak, SORT_ASC, $dataLokasi);

    // fclose($myfile);
    ?>

    <table border="1" cellpadding="5">
        <tr>
            <th>Location</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Jarak<br>(In Meter)</th>

            <?php
            foreach($dataLokasi as $dataLoc){
                echo "<tr>
                        <td>" . $dataLoc['loc'] . "</td>
                        <td>" . $dataLoc['lat'] . "</td>
                        <td>" . $dataLoc['long'] . "</td>
                        <td>" . $dataLoc['jarak'] . "</td>
                        
                
                    </tr>";
            }
            /*for($i=0; $i<count($dataLokasi); $i++){
                echo "<tr>
                        <td>".$dataLokasi[$i]['loc']."</td>
                        <td>".$dataLokasi[$i]['lat']."</td>
                        <td>".$dataLokasi[$i]['long']."</td>
                        <td>".$dataLokasi[$i]['jarak']."</td>
                        
                
                    </tr>";
            }*/

            ?>
        </tr>
    </table>
</body>

</html>