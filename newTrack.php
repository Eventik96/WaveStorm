<?php
require_once 'db.php';
if(isset($_POST['theMusic']) && isset($_POST['chosedList']) && !empty($_POST['theMusic']) && !empty($_POST['chosedList']))
{
    $theMusic=$_POST['theMusic'];
    $chosedList=$_POST['chosedList'];
$result=$GLOBALS['db']->query("SELECT MAX(Num) FROM Track WHERE PlaylistID='{$chosedList}'");
if($result->num_rows)
{
    $table=$result->fetch_all(MYSQLI_NUM);
    $nextNum=$table[0][0]+1;
}
else {
    $nextNum=1;
}

    $GLOBALS['db']->query("INSERT INTO Track VALUES('{$theMusic}','{$nextNum}','{$chosedList}')");
}

?>