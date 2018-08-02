<?php
    require_once 'db.php';
    if($_POST['isReady']=="true")
    {
        $result=$GLOBALS['db']->query("SELECT ID, Name, Artist, Location, Picture FROM Music ORDER BY RAND() LIMIT 1;");
        if($result->num_rows)
        {
            $a='';
            $table=$result->fetch_all(MYSQLI_NUM);
            foreach ($table as $row) 
            {
                $a.=$row[0].'|';
                $a.=$row[1].'|';
                $a.=$row[2].'|';
                $a.=$row[3].'|';
                $a.=$row[4];
            }
            echo $a;
        }
    }
?>