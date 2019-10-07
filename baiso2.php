<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài số hai</title>
</head>
<body>
    <?php
    include_once("nav.php")
    ?>
    <form>
        <fieldset>
            <legend>Tính toán cơ bản</legend>
        
        <input placeholder="Số thứ nhất" type="text" name ="num1" value="<?php echo $_GET["num1"]?? ""; ?>">
        <input placeholder="Số thứ hai" type="text" name="num2" value="<?php echo $_GET["num2"]?? ""; ?>">
        <select name="operator">
            <option value="none">Vui lòng chọn phép tính</option>
            <option <?php echo $_GET["operator"]=="add"?"selected":""; ?> value="add">Cộng</option>
            <option <?php echo $_GET["operator"]=="substract"?"selected":""; ?> value="substract">Trừ</option>
            <option <?php echo $_GET["operator"]=="multiply"?"selected":""; ?> value="multiply">Nhân</option>
            <option <?php echo $_GET["operator"]=="divide"?"selected":""; ?> value="divide">Chia</option>
        </select>
        <button name="btnCalculate" type="submit" value="1">Tính</button>
        
    </form>
    <?php 
        //var_dump($_GET);
        if (isset($_GET["btnCalculate"])){
            $num1 = $_GET["num1"];
            $num2 = $_GET["num2"];
            $operator = $_GET["operator"];
            $sign ="";
            switch ($operator){
                case 'add':
                    $result =$num1 + $num2;
                    $sign = "+";
                    break;
                case 'substract':
                    $result =$num1 - $num2;
                    $sign = "-";
                    break;
                case 'multiply':
                    $result =$num1 * $num2;
                    $sign = "*";
                    break;
                case 'divide':
                    $result =$num1 / $num2;
                    $sign = "/";
                    break;
                default :
                    $result ="Vui lòng chọn phép tính trước.";
            }
            //$result = $num1 + $num2;
            //echo "<h3>Kết quả: $num1 + $num2 = $result </h3>";
            echo "<h3>Kết quả: $num1 $sign $num2 = $result</h3>";
        }
    ?> 
    </fieldset>
</body>
</html>