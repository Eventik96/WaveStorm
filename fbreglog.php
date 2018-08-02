<?php
    require_once 'db.php';
    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;

    

        if(isUsed($_SESSION['email']))
        {
            $_SESSION['userID']=login($_SESSION['email'],$password);
        }

        else 
        {
            registerWithFB($id,$_SESSION['name'],$_SESSION['email'],$password);
            $_SESSION['userID']=login($_SESSION['email'],$password);
        }
        
        
        
        if( isset($_SESSION['userID']) && !empty($_SESSION['userID']) )
        {
            echo "logged in";
        }
        
    
?>