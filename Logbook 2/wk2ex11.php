<?php
$mymarks = array(
    "CO411" => 50,
    "CO412" => 51,
    "CO413" => 52,
    "CO415" => 53,
    "CO416" => 54,
    "CO417" => 88
);

$total = 0;
$highestMark = 0;
$lowestMark = 100;
$bestModule = '';
$worstModule = '';

foreach ($mymarks as $index => $value) {
    echo "For $index my grade was $value <br/>";
    $total = $total + $value;

    if ($value > $highestMark) {
        $highestMark = $value;
        $bestModule = $index;
    }

    if ($value < $lowestMark) {
        $lowestMark = $value;
        $worstModule = $index;
    }
}

$average = $total / 6; 

echo "My best module was $bestModule with a grade of $highestMark <br/>";
echo "My average grade is $average <br/>";
echo "My highest module was $bestModule with a mark of $highestMark <br/>";
echo "My lowest module was $worstModule with a mark of $lowestMark <br/>";
?>