<?php
require_once 'db.php';

if(isset($_POST['newName']) && !empty($_POST['newName']))
{

    if($_POST['newName']!='')
    {
        $GLOBALS['db']->query("UPDATE User SET Username='{$_POST['newName']}' WHERE ID='{$_SESSION['userID']}'");
        $_SESSION['name']=getName($_SESSION['userID']);
    }
        
    
    
}

if(isset($_POST['newPassword']) && !empty($_POST['newPassword']))
{
    if($_POST['newPassword']!='')
    {
        $GLOBALS['db']->query("UPDATE User SET Password='{$_POST['newPassword']}' WHERE ID='{$_SESSION['userID']}'");
    }
        
    
    
}


echo 'success';

?>