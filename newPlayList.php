<?php
    require_once 'db.php';
    $resultID=$GLOBALS['db']->query("SELECT max(ID) FROM Playlist");
    $IDtable=$resultID->fetch_all(MYSQLI_NUM);
    $nextID=$IDtable[0][0]+1;
    $GLOBALS['db']->query("INSERT INTO Playlist VALUES('{$nextID}','{$_SESSION['userID']}','{$_POST['playlistname']}')");
?>