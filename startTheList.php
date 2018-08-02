<?php
require_once 'db.php';
    $a='';
    $result=$GLOBALS['db']->query("SELECT Track.Num, Music.Location FROM Track INNER JOIN Music ON Track.ID=Music.ID WHERE Track.PlaylistID='{$_POST['listIDtoPlay']}' ORDER BY Track.Num ASC");
    if($result->num_rows)
    {
        $table=$result->fetch_all(MYSQLI_NUM);
        foreach ($table as $sor) 
        {
            $a.=$sor[1].'|';
        }
    }
    echo $a;
?>