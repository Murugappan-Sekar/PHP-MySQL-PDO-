<html>
<head><title>Printing the contents of the file</title></head>
    <body>
    <h1>Validation page</h1>
    <?php
            $myfile = fopen("store.txt", "r") or die("Unable to open file!");
            fseek($myfile, 0,SEEK_SET);
            while(!feof($myfile))
            {
                $lip=fgets($myfile);
                if($lip=="\n")
                    break;
                $lip=trim($lip);
                $split=explode(",",$lip);
                $us=@$split[0];
                $pass=@$split[1];
                echo $lip."<br>";
                echo $us."        ".$pass."<br>";
            }
            fclose($myfile);
    ?>
    </body>
</html>