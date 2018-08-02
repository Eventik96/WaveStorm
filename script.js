$('document').ready(function(){
    $('#logo').fadeIn(1000);
    $('#wavestorm').fadeIn(1500);
});


//Email reguláris kifejezés ellenörzés
function isRegular(str) {
   var pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   return pattern.test(str);  // returns a boolean 
}


//Elfogadta-e a felhasználási feltételeket és a két jelszó egyezik-e
$('document').ready(function()
{
    

    $('#regbtn').click(function()
        {
            if(!$('#acceptbox').is(':checked'))
            {
                $("#must").show();
            }

            if(  $('[name="password1"]').val()!=$('[name="password2"]').val()  )
            {
                $('#PassWordMustMatch').show();
            }

            if( $('#nev').val().length==0)
            {
                $('#NameRequired').show();
            }

            if( $('#email').val().length==0)
            {
                $('#EmailRequired').show();
            }

            if( $('#password1').val().length==0)
            {
                $('#PasswordRequired').show();
            }


            if(  $('#acceptbox').is(':checked') && ($('[name="password1"]').val()==$('[name="password2"]').val()) && $('#nev').val().length>0 && $('#email').val().length>0 && $('#password1').val().length>0 && isRegular( $('#email').val() ) )
            {
                var name=$('#nev').val();
                var email=$('#email').val();
                var password=$('#password1').val();
                $.ajax({
                    type:'POST',
                    url: 'registration.php',
                    data: {name: name, email:email,password:password},
                    success: function(data)
                    {
                        if(data=="used")
                        {
                            $('#AlreadyUsed').show();
                        }
                        if(data=="logged in")
                        {
                            window.location.href="home.php";
                        }

                    }

                    
                });
            }


        });


        $('#email').blur(function(){


            if($('#email').val().length!=0)
            {
                if(isRegular($('#email').val())==false)
                {
                    $('#RegExpEmail').show();
                }
            }

        });


        $('#email').focusin(function(){$('#RegExpEmail').css('display','none');});


        $('[name="password1"]').focusin(function(){ $("#PassWordMustMatch").css('display','none');});

        $('#email').focusin(function(){$('#EmailRequired').css('display','none');});

        $('#nev').focusin(function(){$('#NameRequired').css('display','none');});

        $('#password1').focusin(function(){$('#PasswordRequired').css('display','none');});
        
        $('[name="password2"]').focusin(function(){$("#PassWordMustMatch").css('display','none');});

        $('#acceptbox').click(function(){$("#must").css('display','none');});

        $('#email').focusin(function(){$('#AlreadyUsed').css('display','none');});
});





