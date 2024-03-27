<?php
     $lottodate = date("Ymd");
     echo "The lottery numbers for $lottodate are ";
     for($n=1; $n<=6; $n++){
        $number[$n] = rand(1,49);
        echo "<br/> $number[$n]";
     }
     $conn = mysqli_connect("localhost", "root", "", "logbook");

     if (!$conn) {
         die('Could not connect: ' . mysqli_error($conn));
     }

     $sql = "INSERT INTO lotto (lottodate,number1,number2,number3,number4,number5,number6) VALUES ($lottodate,$number[1],$number[2],$number[3],$number[4],$number[5],$number[6])";

     $result = mysqli_query($conn, $sql);

     if ($result) {
         echo "<br/>This week's numbers have been saved";
     } else {
         echo "<br/>Error: " . $sql . "<br>" . mysqli_error($conn);
     }

     mysqli_close($conn);
?>