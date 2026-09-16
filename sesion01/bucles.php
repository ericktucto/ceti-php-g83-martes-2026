<?php

echo "For\n";

for ($i = 0; $i < 20; $i++) {
    if ($i % 3 === 0) {
        echo "es multiplo de 3\n";
        continue;
    }
    if ($i === 16) {
        echo "fin de la interacion\n";
        break;
    }
    echo "i es {$i}\n";
}

echo "While\n";

$a = 0;

while ($a < 20) {
    if ($a % 3 === 0) {
        echo "es multiplo de 3\n";
        $a++;
        continue;
    }
    if ($a === 16) {
        echo "fin de la interacion\n";
        break;
    }
    echo "a vale {$a}\n";
    $a++;
}