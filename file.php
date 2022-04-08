<?php
$myfile = fopen("text.txt", "r") or die ("Unable to Open File !!");
while(!feof($myfile)){
    $mydata = fgets($myfile);
    echo $mydata;
}
fclose($myfile);


?>