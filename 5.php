<?php
function createTriangle($a,$b){
    for ($a; $a<=$b; $a++) {
        echo "  ".$a;
        for ($a; $a<=$b; $a++){
            echo $a+$a;
            for ($b; $b>= $a; $b--){
                echo $b;
            }
        }
        echo '<br>';
    }
}
echo createTriangle(2,10);
?>