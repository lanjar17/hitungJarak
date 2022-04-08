<?php
include("buatKotak.php");
$myfile = fopen("text.txt", "r") or die ("Unable to Open File !!");

while($file = fgets($myfile)){
    $isi = explode("|", $file);
    $baris = $isi[0];
    $kolom = $isi[1];
    buatKotak($baris, $kolom);
}

fclose($myfile);
?>