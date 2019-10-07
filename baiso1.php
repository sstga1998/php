<!-- <?php
    echo "Hello world";
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài số một</title>
</head>
<body>
    <?php
    include_once("header.php")
    ?>
    <?php
    include_once("nav.php")
    ?>
    <div id="wrapper">

    <?php
        define('PI', '3.14');
        /**
         * Tính diện tích hình tròn
         * @param $banKinh Bán kính hình tròn
         * @return Diện tích hình tròn có bán kính là $banKinh
         */
        function dienTichHinhTron ($banKinh)
        {
             $s = M_PI * pow($banKinh,2);//$s= PI* $banKinh *$banKinh;
            return $s;
        }
        function sum($n){
            $s =0;
            for($i=0; $i<= $n ; $i++){
                $s +=$i;
            }
            return $s;
        }
        function HomNayThuMay(){
            $dayOfWeek = [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wendesday",
                "Thursday",
                "Friday",
                "Saturday"
            ];
            $day = date("w");
            //var_dump($day); //Hiển thị thông tin toàn bộ biến day
            return $dayOfWeek[$day];
        }
        echo "<h1>Xin chào mọi người</h1>";
        $a=5;
        $b=5.5;
        $c=$a + $b;
        echo "<h3>Kết quả của " .$a ."+". $b. "=". $c. "</h3>";
        echo '<h3>Kết quả của ' .$a .'+'. $b. '='. $c. '</h3>';
        echo "<hr>";
        echo "<h3>Kết quả của " .$a ."+". $b. "=". $c. "</h3>";
        echo '<h3>Kết quả của ' .$a .'+'. $b. '='. $c. '</h3>';
        $r = 5;
        // $s = PI * $r *$r;
        $s= dienTichHinhTron($r);
        echo "<h3>Diện tích hình tròn bán kính  $r là $s</h3>";
        $n = 5;
        $tong = sum($n);
        echo "<h3>Tổng của $n số đầu tiên là $tong</h3>";
        echo "Hôm nay là " . HomNayThuMay();
        
    ?>
    <?php
    include_once("footer.php")
    ?>
</body>
</html>