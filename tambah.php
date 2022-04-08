<?php  
	include "functionJarak.php";

	$myfile = fopen("locations.csv", "a") or die("Can't open file");

	$loc = $_POST["loc"];
	$lat = $_POST["lat"];
	$long = $_POST["long"];

	$data = "\n".$loc.',"'.$lat.','.$long.'"';
	fwrite($myfile, $data);
	fclose($myfile);

	header("location: tambahTempat.php");
?>