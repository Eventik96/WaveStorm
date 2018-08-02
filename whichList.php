<?php
require_once 'db.php';
$result=$GLOBALS['db']->query("SELECT * FROM Playlist WHERE UserID='{$_SESSION['userID']}'");
$table=$result->fetch_all(MYSQLI_NUM);
$a='';
foreach ($table as $row) {
    $a.='<li id="notThisPls" onclick="IchooseThis(this)" style="cursor:pointer;list-style-type: none;color:wheat;">
        <img id="notThisPls" src="img/disc.png" style="width:22px;height:22px;float:left;margin-right:7px;opacity:0.35;"/>
        <span id="notThisPls" style="font-size:20px;" >'.$row[2].'</span>
        <span id="notThisPls" hidden>'.$row[0].'</span>
        </li>';
}
echo $a;
?>