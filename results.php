<?php
    session_start();
?>
<!DOCTYPE HTML>

<html>
    <head>
        <meta charset="utf-8">
        <title>Fibonacci Sequence</title>    
    </head>
    <body>
        <form action="https://s3645635-cc2018.appspot.com/results.php" method="post">
            A:
            <input type="number" name="a"><br>
            B:
            <input type="number" name="b"><br><br>
            C:
            <input type="number" name="c"><br><br>
            <input type="submit" value="Submit">
        </form>

        <?php
           if(isset($_POST['a'])) {
                $listAmt = $_SESSION['listAmt'];
                $s = $_POST['a'] + $_POST['b'];
                $m = $s * $_POST['c'];

                $sequence = explode(",", file_get_contents('gs://s3645635-storage/fibonacci_'.$listAmt.'.txt'));

                $add = 0;
                foreach($sequence as $num) {
                    $add += (int)$num;
                }

                $total = $m + $add;
                $sum = $total + ($s + $_POST['c']);
                $average = $sum / ($listAmt + 3);
                
                $handle = fopen("gs://s3645635-storage/results.txt",'w');
                fwrite($handle, "Total Sum: $total  Average: $average");
                fclose($handle);

                echo "Total Sum: $total <br>";
                echo "Average: $average";
            } 
        ?>
    </body>        
</html>