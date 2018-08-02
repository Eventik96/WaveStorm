<?php
    require_once 'db.php';
    $result=$GLOBALS['db']->query("SELECT * FROM Playlist WHERE UserID='{$_SESSION['userID']}'");
    $table=$result->fetch_all(MYSQLI_NUM);
    $a='';
    foreach($table as $row)
    {
        $a.='<div  style="width:300px;margin:10px;margin-top:15px;margin-bottom:15px;margin-right:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;">
            <img  src="img/disc.png" style="width:45px;height:45px;float:left;margin-right:7px;opacity:0.35;"/>';

        $a.='<span onclick="showTracksInList(this)" style="cursor: pointer; padding0;margin:0;margin-right:10px; font-size:18px;">'.$row[2].'</span>
        <span onclick="startTheList(this)"><img src="img/playlistbtn.png" style="top:3px;position:relative;cursor:pointer;width:18px;height:18px;"/></span>

        <span style="display:none">'.$row[0].'</span>';
        $tracksresult=$GLOBALS['db']->query("SELECT COUNT(ID) FROM Track WHERE PlaylistID='{$row[0]}'");
        $tracktable=$tracksresult->fetch_all(MYSQLI_NUM);
        $a.='<p style="width:400px;padding:0;margin:0;margin-top:2px;color:grey;font-size:15px;">'.$tracktable[0][0].' Tracks</p></div>';
    }
    echo $a;
?>