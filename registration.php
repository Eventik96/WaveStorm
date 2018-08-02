<?php
    require_once 'db.php';
    

    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    if(isUsed($_SESSION['email'])==true)
    {
        echo "used";
    }
    else
    {
        
        
        
        register($_SESSION['name'],$_SESSION['email'],$password);
        
        $_SESSION['userID']=login($_SESSION['email'],$password);
            
        
        
        if( isset($_SESSION['userID']) && !empty($_SESSION['userID']) )
        {
            echo "logged in";
        }
        
    }
?>