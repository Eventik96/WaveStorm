<?php

session_start();
    //error_reporting(0);
    global $db;
    $db=new mysqli('127.0.0.1','root','','wavestorm');
    if($db->connect_errno)
    {
        echo $db->connect_error;
        die();
    }



    

    
    

    function login($email,$password)
    {
        if($result=$GLOBALS['db']->query("SELECT * FROM User WHERE Email='$email'"))
        {
            $tabla=$result->fetch_all(MYSQLI_ASSOC);
            if($result->num_rows)
            {
                if($tabla[0]['Email']==$email&&$tabla[0]['Password']==$password)
                {
                    return $tabla[0]['ID'];
                }
                else echo 'Hibás jelszó!<br/>';
            }
            else echo 'Nincs ilyen emailcímmel regisztrált felhasználó!<br/>';
            
        }

        else
        {
            
            return null;
        }



    }

    function register($name,$email,$password)
    {
        $resultID=$GLOBALS['db']->query("SELECT max(ID) FROM User WHERE isFacebook=false");
        $IDtable=$resultID->fetch_all(MYSQLI_NUM);
        $nextID=$IDtable[0][0]+1;
            

        $GLOBALS['db']->query("INSERT INTO User values('{$nextID}','{$name}','{$email}','{$password}',false)");

    }



    
    function getEmail($id)
    {
        $resultEmail=$GLOBALS['db']->query("SELECT Email FROM User WHERE id='$id'");
        $EmailTable=$resultEmail->fetch_all(MYSQLI_NUM);
        $email=$EmailTable[0][0];
        return $email;
    }

    function getName($id)
    {
        $resultUsername=$GLOBALS['db']->query("SELECT Username FROM User WHERE id='$id'");
        $UsernameTable=$resultUsername->fetch_all(MYSQLI_NUM);
        $username=$UsernameTable[0][0];
        return $username;
    }


    

    


    function registerWithFB($id,$name,$email,$password)
    {
        
            

        $GLOBALS['db']->query("INSERT INTO User values('{$id}','{$name}','{$email}','{$password}',true)");

    }



    
    function isUsed($emailc)
    {
        if($result=$GLOBALS['db']->query("SELECT email FROM User WHERE email='$emailc'"))
        {
            $tabla=$result->fetch_all(MYSQLI_ASSOC);
            if($result->num_rows)
            {
                return true;
                
            }

            else 
            {
                return false;
            }
        }
    }
        
        
      
    

    
    
?>