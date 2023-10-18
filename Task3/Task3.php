<?php

for ($i=1; $i<=100; $i++) {
    if ($i%3 == 0 && $i%5 == 0) {
        echo "ToucanTech";
    } elseif ($i%3 == 0) {
        echo "Toucan";
    } elseif ($i%5 == 0) {
        echo "Tech";
    } else {
        echo $i;
    }
    echo "<br>"; 
}
	
?>

