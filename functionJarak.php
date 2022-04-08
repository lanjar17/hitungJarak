<?php
function cariJarak($x1, $y1, $x2, $y2, $radBumi = 6371000) {
    $rlatFrom = deg2rad($x1);
    $rlonFrom = deg2rad($y1);
    $rlatTo = deg2rad($x2);
    $rlonTo = deg2rad($y2);

    $y = $rlonTo - $rlonFrom;

    $a = pow(cos($rlatTo) * sin($y), 2) + pow(cos($rlatFrom) * sin($rlatTo) - sin($rlatFrom) * cos($rlatTo) * cos($y), 2);
    $b = sin($rlatFrom) * sin($rlatTo) + cos($rlatFrom) * cos($rlatTo) * cos($y);
    $angle = atan2(sqrt($a), $b);

    return $angle * $radBumi;
}
?>