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
            if(isset($_POST['number'])) {
                $_SESSION['listAmt'] = $_POST['number'];
                $listAmt = $_SESSION['listAmt'];
                $handle = fopen("gs://s3645635-storage/fibonacci_$listAmt.txt",'w');

                $x = 0;
                $j = 1;
                for($i = 0; $i < $listAmt; $i++) {
                    $y = $x + $j;
                    if($i == 0) {
                        fwrite($handle, $y);
                    }
                    else
                        fwrite($handle, ", ".$y);
                    $x = $j;
                    $j = $y;
                }
                fclose($handle);
            }
        ?>
    </body>        
</html>