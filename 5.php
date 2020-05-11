<?php
// un = a + (n-1)b
#
// a := suku pertama b:= beda n:=0,1,2
// b = un=u^n-1; u1(2) - u1

function createTriangle($a,$u){
    if($u%$a == 0){
        $baris = $u/$a;
        $beda = $a*2 - $a;
        for($i = 1; $i <= $baris; $i++){
            for($j = $baris; $j > $i; $j--){
                echo " ";
            }
            for($n=1; $n<=$i; $n++){
                $un = $a + ($n-1)*$beda;
                echo $un;
            }
            echo "\n";
        }
    }
}
echo createTriangle(2,10);
