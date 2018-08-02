<?php
    require_once 'db.php';

	if(isset($_SESSION['userID']) && !empty($_SESSION['userID']))
	{
		header("Location: home.php");
	}

    

    if(isset($_POST['loginemail']) && isset($_POST['loginpassword']) && !empty($_POST['loginemail']) && !empty($_POST['loginpassword']))
    {
        if($_SESSION['userID']=login($_POST['loginemail'],$_POST['loginpassword']))
        {
            $_SESSION['name']=getName($_SESSION['userID']);
            $_SESSION['email']=getEmail($_SESSION['userID']);
            header("Location: home.php");
        }
        else  
        {
            echo'Bejelentkezési probléma<br/>';
        }
    }

    


?>
<!DOCTYPE html>
<html>

<head>
    <link href="css/loginstyle.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-16">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="script.js"></script>
    <link rel="icon" href="img/rsz_icon45x45.png"/>
    <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '352263095145906',
              cookie     : true,
              xfbml      : true,
              version    : 'v2.0'
            });
              
            FB.AppEvents.logPageView();
              
          };

          (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));



          
            function checkLoginState() {
            FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
            });
            }

            function statusChangeCallback(response)
            {
              FB.api('/me?fields=first_name,last_name,email,id', function(response) {
                  //alert(response.email);
                var name=response.first_name + ' ' + response.last_name;
                var email= response.email;
                var id=response.id;
                var password=response.id;
                
                if(email!=null)
                {
                $.ajax({
                type:'POST',
                url: 'fbreglog.php',
                data: {id: id, name: name, email:email,password:password},
                success: function(data)
                {
                    if(data=="logged in")
                    {
                        window.location.href="home.php";
                    }
                    
                
                }
            });
            }
              
            });
            }


            
            

            
        </script>
</head>
<?php
echo "<body>";
?>

        
    <div id="container">
        
        <div class="brand">
            
            <br/>
            <img src="img/logo2.png" class="logo" id="logo">
            <div style="padding-right: 15px; height: 120px; width: 500px;position: relative;margin-left: auto;margin-right: auto;">
                <p id="wavestorm" >WaveStorm</p> 

            </div> 
             <br/>
            <a href="#in" id="start" class="start" >start</a>
            
        </div>
        

        <div id="in">
                <br/><br/><br/><br/>
            <div class="background">
                
                <div id="registration">
                    <p class="cim">Registration</p>

                    
                        <form method="post">
                        <div class="form-input">
                        <input type="text" class="mezo" id="nev" name="nev" placeholder="Name">
                        </div>

                        <div id="NameRequired" >Required.</div>

                        <div class="form-input">
                        <input type="email" class="mezo" id="email" name="regemail" placeholder="Email">
                        </div>

                        <div id="EmailRequired" >Required.</div>
                        <div id="AlreadyUsed"> This email already used.</div>
                        <div id="RegExpEmail">Invalid email address.</div>

                        <div class="form-input">
                        <input type="password" class="mezo" id="password1" name="password1" placeholder="Password">
                        </div>

                        <div id="PasswordRequired">Required.</div>
                        
                        <div class="form-input">
                        <input type="password" class="mezo" name="password2" placeholder="Password again">
                        </div>

                        <div id="PassWordMustMatch" >The two password doesn't match.</div>
                        

                        <div class="form-input" style="padding-left:0px;padding-right:50px;color:grey;">
                            <input type="checkbox" id="acceptbox" />
                            I accept the <a class="terms_and_conditions" href="privacy.html" title="Continue to read Terms & Conditions..." >Terms & Conditions</a>.
                        </div>

                        <div id="must" >You must agree with Terms & Conditions.</div>
                        
                        <div class="form-input">
                                <input type="button" class="gomb" id="regbtn" name="registration" value="Sign up">
                            </div>

                        </form>

                </div>

                
                
                <div class="login">
                <p class="cim">Login</p>

                        <form action="login.php" method="post">

                            <div class="form-input">
                                <input type="email" class="mezo" name="loginemail" placeholder="Email">
                            </div>

                            <div class="form-input">
                                <input type="password" class="mezo" name="loginpassword" placeholder="Password">
                            </div>  

                            <div class="form-input">
                                <input type="submit" class="gomb" name="login" value="Sign in">
                            </div>
                        </form>
                        <a class="forgot-password" href="fm.html" >Forgot password?</a>
                        <p class="or">
                            or
                        </p>
                        <div class="fb-login-button" data-width="100" data-max-rows="1" data-size="large" scope="public_profile,email" onlogin="checkLoginState();"
                            data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false">
                            Sign in with Facebook
                        </div>

                </div>

            </div>
                
                

        </div>

    </div>
    
    
    
</body>

</html>




