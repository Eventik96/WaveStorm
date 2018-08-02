
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
        FB.api('/me?fields=first_name,last_name,email,id', function(response) {
        var name=response.first_name + ' ' + response.last_name;
        var email= response.email;
        var id=response.id;
        var password=response.id;
      
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
        });
    });
}