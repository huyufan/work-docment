<?php
$y="1800";
$x = array();
for($j=0;$j<2000;$j++){
        $x[]= "{$j}";
}
 
for($i=0;$i<3000;$i++){
        if(in_array($y,$x)){
                continue;
        }
}
