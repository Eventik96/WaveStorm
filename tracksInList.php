<?php
    require_once 'db.php';
    $listID=$_POST['listID'];
    $result=$GLOBALS['db']->query("SELECT Music.ID, Music.Name, Music.Artist,Track.Num, Music.Location, Music.Picture FROM Track INNER JOIN Music ON Track.ID=Music.ID WHERE Track.playlistID='{$listID}' ORDER BY Track.Num ASC");
    $table=$result->fetch_all(MYSQLI_NUM);
    $a='';
    if($result->num_rows)
    {
        foreach ($table as $sor) {
            $a.= '<div  style="width:400px;margin:10px;margin-top:0px;margin-bottom:20px;font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <p style="color:grey;float:left;margin:0;padding-right:10px;padding-top:10px;padding-bottom:10px;">'.$sor[3].'.</p>
                <img src="'.$sor[5].'" style="width:40px;height:40px;float:left;margin-right:7px;"/>
                <p onclick="loadNew(this)" style="cursor: pointer; padding:0;margin:0;">'.$sor[1].'</p>
                <span style="display:none">'.$sor[4].'</span>
                <p style="padding:0;margin:0;margin-top:2px;color:grey;text-transform:uppercase;font-size:15px;">'.$sor[2].'</p>
                </div>';
        }
    }
    else {
        $a.='<div style="color:grey;opacity:0.65;font-style:italic;">The playlist is empty.</div>';
    }


echo $a;
?>