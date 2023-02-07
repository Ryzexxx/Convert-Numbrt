<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Convert Number to Words</h1>
    <?php 
        function numberTowords($num) {
            $arr=array(
                1 => "one",
                2 => "two",
                3 => "three",
                4 => "four",
                5 => "five",
                6 => "six",
                7 => "seven",
                8 => "eight",
                9 => "nine",
                10 => "ten",
                11 => "eleven",
                12 => "tweleve",
                13 => "thirteen",
                14 => "fourteen",
                15 => "fifteen",
                16 => "sixteen",
                17 => "seventeen",
                18 => "eight",
                19 => "nineteen",
            );
            $t=array(
                2 => "twenty",
                3 => "thirty",
                4 => "fourty",
                5 => "fifty",
                6 => "sixty",
                7 => "seventy",
                8 => "eighty",
                9 => "ninety",
            );
            $hundreds=array(
                "hundred",
                "thousand",
                "million",
                "billion",
            );  
            $num=number_format($num,2,".",",");
            $num_array=explode(".",$num);
            $wholenum=$num_array[0];
            $decnum=$num_array[1];
            $whole_array=array_reverse(explode(",",$wholenum));
            krsort($whole_array);
            $rettext="";

            foreach($whole_array as $key=>$i) {
                if($i<20){
                    $rettext.=$arr[$i];
                }elseif($i<100){
                    $rettext.=$t[substr($i,0,1)];
                    $rettext.="".$arr[substr($i,1,1)];
                }else{
                    $rettext.=$arr[substr($i,0,1)]."".$hundreds[0];
                    $rettext.="".$t[substr($i,1,1)];
                    $rettext.="".$arr[substr($i,2,1)];
                }
                if(key>0){
                    $rettext.="".$hundreds[$key]."";
                }
            }
            if($decnum<0){
                $retext.="and";
            }if($decnum<20){
                $rettext.=$arr[$$decnum];
            }elseif($decnum<100){
                $rettext.=$t[substr($decnum,0,1)];
                $rettext.="".$arr[substr($decnum,2,1)];
            }
            return $rettext;
        }
        extract($_POST);
        if(isset($convert)){
            echo "<p align='center' style='color:red'>".numberTowords("$num")."</p>";
        }
    ?>
    <form method="post">
        <table border="1" align="center">
            <tr>
                <td>Enter Number</td>
                <td><input type="text" name="num" value="<?php if (isset($num)) {echo $num;}?>"></td>
                <td colspan="4" align="center">
                    <input type="submit" value="convert Number to the String" name="convert">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>