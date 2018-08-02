$(document).ready(function(){
    $('.controllButton').hover(function(){
        $(this).find('.ctrlImg').css('opacity','1');
    },function(){
        $(this).find('.ctrlImg').css('opacity','0.8');
    });


    

});

var actualPlayList=null;
var acti=0;


$(document).ready(function()
{
     
    $('#playbtn').click(function(){		
        var zene=document.getElementById("audio"); 
        
        if(zene.paused)
        {
        zene.play();
        $('#playimg').attr('src','img/pause.png');
        var images = ["img/now_green.png","img/now_green2.png","img/now_green3.png"];
        var greyimages = ["img/now.png","img/now_grey2.png","img/now_grey3.png"];
        var index=0;
        setInterval(function(){
             
                if(!zene.paused)
                {
                    if(selected=="nowPlayed")
                    {
                        $('#nowPlayedImg').attr('src',images[index]);
                        index++;
                        if(index >= images.length)
                        {
                        index=0;
                        }
                    }
                    else{
                        $('#nowPlayedImg').attr('src',greyimages[index]);
                        index++;
                        if(index >= greyimages.length)
                        {
                        index=0;
                        }
                    }
                    
                }},130);
        }
        else{
            zene.pause();
            $('#playimg').attr('src','img/play.png');
            
        }
        });
        

        $('.controllButton').click(function(){		

            var image=$(this).find('.ctrlImg');
            image.css('opacity','0.6');
            setTimeout(function(){image.css('opacity','1');},90);
            
        });


        $('#nextbtn').click(function()
        {
            
            if(acti<actualPlayList.length)
        {
            acti++;
        }
        if(acti>actualPlayList.length)
        {
            acti=actualPlayList.length-1;
        }
            
            
        $('#audio').attr('src',actualPlayList[acti]);
        var zene=document.getElementById("audio"); 
        zene.play();
        $('#playimg').attr('src','img/pause.png');
        var src=$('#audio').attr('src');
        
        ID3.loadTags(src, function() {
        showTags(src);
        }, {
        tags: ["title","artist","picture"]
        });
        });

    $('#prevbtn').click(function()
    {
        if(acti>0)
        {
            acti--;
        }
        
        $('#audio').attr('src',actualPlayList[acti]);
        var zene=document.getElementById("audio"); 
        zene.play();
        $('#playimg').attr('src','img/pause.png');
        var src=$('#audio').attr('src');
        
        ID3.loadTags(src, function() {
        showTags(src);
        }, {
        tags: ["title","artist","picture"]
        });
    });

});

/**
         * Loading the tags using the FileAPI.
         */
    /**
     * Loading the tags using XHR.
     */
    //sample.mp3 sits on your domain
    
    function loadFile(input) {
        var file = input.files[0],
            url = file.urn || file.name;
    
        ID3.loadTags(url, function() {
            showTags(url);
        }, {
            tags: ["title","artist","picture"],
            dataReader: ID3.FileAPIReader(file)
        });
        }
        /**
         * Generic function to get the tags after they have been loaded.
         */
        function showTags(url) {
        var tags = ID3.getAllTags(url);
        console.log(tags);
        document.getElementById('title').textContent = tags.title || "";
        document.getElementById('artist').textContent = tags.artist || "";
        document.getElementById('smallTitle').textContent = tags.title || "";
        document.getElementById('smallArtist').textContent = tags.artist || "";
        var image = tags.picture;
        if (image) {
            var base64String = "";
            for (var i = 0; i < image.data.length; i++) {
                base64String += String.fromCharCode(image.data[i]);
            }
            var base64 = "data:" + image.format + ";base64," +
                    window.btoa(base64String);
            
            $('#cover').fadeOut('fast');
            $('#cover').fadeIn('normal'); 
            document.getElementById('cover').setAttribute('src',base64);
                       
            document.getElementById('smallCover').setAttribute('src',base64);
        } else {
            document.getElementById('cover').style.display = "none";
            document.getElementById('smallCover').style.display = "none";
        }

        }


        





$(document).ready(function(){

    var src=$('#audio').attr('src');
    ID3.loadTags(src, function() {
        showTags(src);
        }, {
        tags: ["title","artist","picture"]
        });
});



function next()
{
        if(acti<actualPlayList.length)
        {
            acti++;
        }
        if(acti>actualPlayList.length)
        {
            acti=actualPlayList.length-1;
        }
        

        $('#audio').attr('src',actualPlayList[acti]);
        var zene=document.getElementById("audio"); 
        zene.play();
        $('#playimg').attr('src','img/pause.png');
        var src=$('#audio').attr('src');
        
        ID3.loadTags(src, function() {
        showTags(src);
        }, {
        tags: ["title","artist","picture"]
        });
        
}

var selected;




$(document).ready(function()
{

//********************NOW PLAYED******************//
        $('#nowPlayed').hover(function()
        {
            if(selected!="nowPlayed")
            {
                $('#nowPlayedImg').attr('src','img/now_white.png');
                $('#nowPlayedImg').css('opacity','0.65');
                $(this).css('color','#ffffff');
                $(this).css('opacity','0.65');
            }
            
        }
        ,function()
        {
            if(selected!="nowPlayed")
            {
                $('#nowPlayedImg').attr('src','img/now.png');
                $('#nowPlayedImg').css('opacity','1');
                $(this).css('color','#777777');
                $(this).css('opacity','1');
            }
        }
        );

    $('#nowPlayed').click(function(){
        $('#nowPlayedImg').css('opacity','1');
        $(this).css('opacity','1');
        $('#nowPlayedImg').attr('src','img/now_green.png');
        $(this).css('color','#16bdb7');
        selected="nowPlayed";
        //OTHER//
        $('#discoverDiv').attr('disabled','disabled').hide();
        $('#discoverImg').attr('src','img/discover.png');$('#discoverImg').css('opacity','1');$('#discover').css('color','#777777').css('opacity','1');
        
        $('#playlistImg').attr('src','img/playlist.png');$('#playlistImg').css('opacity','1');$('#playlist').css('color','#777777').css('opacity','1');
        $('#addImg').attr('src','img/add.png');$('#addImg').css('opacity','1');$('#add').css('color','#777777').css('opacity','1');
        $('#searchDiv').hide();
        $('#searchDiv').attr('disabled','disabled');
        $('#playlistsDiv').attr('disabled','disabled').hide();
        $('#MyProfile').hide().attr('disabled','disabled');
        $('#NowPlayedDiv').show();
        $('#addNewPlayListDiv').hide();
        
    });

//********************DISCOVER******************//

        $('#discover').hover(function()
                {
                    if(selected!="discover")
                    {
                        $('#discoverImg').attr('src','img/discover_white.png');
                        $('#discoverImg').css('opacity','0.65');
                        $(this).css('color','#ffffff');
                        $(this).css('opacity','0.65');
                    }
                    
                }
                ,function()
                {
                    if(selected!="discover")
                    {
                        $('#discoverImg').attr('src','img/discover.png');
                        $('#discoverImg').css('opacity','1');
                        $(this).css('color','#777777');
                        $(this).css('opacity','1');
                    }
                }
                );

            $('#discover').click(function(){
                $('#discoverDiv').show();
                $('#discoverImg').css('opacity','1');
                $(this).css('opacity','1');
                $('#discoverImg').attr('src','img/discover_green.png');
                $(this).css('color','#16bdb7');
                selected="discover";
                //OTHER//
                $('#nowPlayedImg').attr('src','img/now.png');$('#nowPlayedImg').css('opacity','1');$('#nowPlayed').css('color','#777777').css('opacity','1');
                $('#playlistImg').attr('src','img/playlist.png');$('#playlistImg').css('opacity','1');$('#playlist').css('color','#777777').css('opacity','1');
                $('#addImg').attr('src','img/add.png');$('#addImg').css('opacity','1');$('#add').css('color','#777777').css('opacity','1');
                $('#searchDiv').hide();
                $('#searchDiv').attr('disabled','disabled');
                $('#MyProfile').hide().attr('disabled','disabled');
                $('#NowPlayedDiv').hide();
                $('#addNewPlayListDiv').hide();
                $('#playlistsDiv').attr('disabled','disabled').hide();

            });



//********************PLAYLIST******************//

        $('#playlist').hover(function()
        {
            if(selected!="playlist")
            {
                $('#playlistImg').attr('src','img/playlist_white.png');
                $('#playlistImg').css('opacity','0.65');
                $(this).css('color','#ffffff');
                $(this).css('opacity','0.65');
            }
            
        }
        ,function()
        {
            if(selected!="playlist")
            {
                $('#playlistImg').attr('src','img/playlist.png');
                $('#playlistImg').css('opacity','1');
                $(this).css('color','#777777');
                $(this).css('opacity','1');
            }
        }
        );

    $('#playlist').click(function(){
        $('#playlistsDiv').removeAttr('disabled').show();
        $('#playlistImg').css('opacity','1');
        $(this).css('opacity','1');
        $('#playlistImg').attr('src','img/playlist_green.png');
        $(this).css('color','#16bdb7');
        selected="playlist";
        //ITT JÖN A LÉNYEG A LISTÁK MEGJELENÍTÉSE
        $.ajax({type:'POST',url:'allPlayList.php',data:{},
        success: function(data){
            $('#theLists').html(data);
        }});
        //OTHER//

        $('#nowPlayedImg').attr('src','img/now.png');$('#nowPlayedImg').css('opacity','1');$('#nowPlayed').css('color','#777777').css('opacity','1');
        $('#discoverImg').attr('src','img/discover.png');$('#discoverImg').css('opacity','1');$('#discover').css('color','#777777').css('opacity','1');
        $('#addImg').attr('src','img/add.png');$('#addImg').css('opacity','1');$('#add').css('color','#777777').css('opacity','1');
        $('#searchDiv').hide();
        $('#searchDiv').attr('disabled','disabled');
        $('#MyProfile').hide().attr('disabled','disabled');
        $('#NowPlayedDiv').hide();
        $('#addNewPlayListDiv').hide();
        $('#discoverDiv').attr('disabled','disabled').hide();

    });




//********************ADD******************//

    $('#add').hover(function()
    {
        if(selected!="add")
        {
            $('#addImg').attr('src','img/add_white.png');
            $('#addImg').css('opacity','0.65');
            $(this).css('color','#ffffff');
            $(this).css('opacity','0.65');
        }
        
    }
    ,function()
    {
        if(selected!="add")
        {
            $('#addImg').attr('src','img/add.png');
            $('#addImg').css('opacity','1');
            $(this).css('color','#777777');
            $(this).css('opacity','1');
        }
    }
    );

$('#add').click(function(){
    $('#addImg').css('opacity','1');
    $(this).css('opacity','1');
    $('#addImg').attr('src','img/add_green.png');
    $(this).css('color','#16bdb7');
    selected="add";
    //OTHER//
    $('#nowPlayedImg').attr('src','img/now.png');$('#nowPlayedImg').css('opacity','1');$('#nowPlayed').css('color','#777777').css('opacity','1');
    $('#discoverImg').attr('src','img/discover.png');$('#discoverImg').css('opacity','1');$('#discover').css('color','#777777').css('opacity','1');
    $('#playlistImg').attr('src','img/playlist.png');$('#playlistImg').css('opacity','1');$('#playlist').css('color','#777777').css('opacity','1');
    //$('#searchDiv').hide();
    $('#searchDiv').attr('disabled','disabled');
    //$('#NowPlayedDiv').hide();
    $('#addNewPlayListDiv').show();
});

$('#plusImg').hover(function(){$(this).attr('src','img/plus_white.png').css('opacity','0.65');},
    function(){$(this).attr('src','img/plus.png').css('opacity','1')});

    $('#addNewPlayListDiv').on('click','img',function(){
        if($('#newPlayListInput').val()!=0)
        {
            var name=$('#newPlayListInput').val();
            $.ajax({type: 'POST', url:'newPlayList.php',data:{playlistname:name}});
            $('#playlist').trigger('click');
        }
        
    });

});


$(document).ready(function(){
    $('#nowPlayed').trigger("click");
});


$(document).ready(function(){

    $('#searchImg').hover(function()
        {
                $(this).attr('src','img/search_white.png');
                $(this).css('opacity','0.65');
        }
        ,function()
        {
                $(this).attr('src','img/search_grey.png');
                $(this).css('opacity','1');  
        }
        );

    $('#searchImg').mousedown(function()
    {
        $(this).css('opacity','1');
        $(this).attr('src','img/search_green.png');
    }
    );
    $('#searchImg').mouseup(function()
    {
        setTimeout(function(){
            $('#searchImg').css('opacity','0.65').attr('src','img/search_white.png');
        },150);
    }
    );
    
    

});

$(document).ready(function(){
    $('#kereses').on('click', 'img', function(){
        var sample=$('#searchInput').val();
        if(sample!=null && sample!="")
        {
            $.ajax({type:'GET',url: 'search.php', data:{sample:sample},
            success: function(data){
                $('#discoverDiv').attr('disabled','disabled').hide();
                $('#searchDiv').html(data);
                $('#NowPlayedDiv').hide();
                $('#nowPlayedImg').attr('src','img/now.png');$('#nowPlayedImg').css('opacity','1');$('#nowPlayed').css('color','#777777').css('opacity','1');
                $('#discoverImg').attr('src','img/discover.png');$('#discoverImg').css('opacity','1');$('#discover').css('color','#777777').css('opacity','1');
                $('#playlistImg').attr('src','img/playlist.png');$('#playlistImg').css('opacity','1');$('#playlist').css('color','#777777').css('opacity','1');
                $('#addImg').attr('src','img/add.png');$('#addImg').css('opacity','1');$('#add').css('color','#777777').css('opacity','1');
                $('#NowPlayedDiv').hide();
                $('#searchDiv').removeAttr("disabled").show();
                $('#addNewPlayListDiv').hide();
                $('#playlistsDiv').attr('disabled','disabled').hide();
                $('#MyProfile').hide().attr('disabled','disabled');
                selected="search";
            }});
        } 
    });
});

$(document).keypress(function(e) {
    if ($("#searchInput").is(":focus")) {
        if(e.which == 13) {
            var sample=$('#searchInput').val();
            if(sample!=null && sample!="")
            {
                $.ajax({type:'GET',url: 'search.php', data:{sample:sample},
                success: function(data){
                    $('#discoverDiv').attr('disabled','disabled').hide();
                    $('#searchDiv').html(data);
                    $('#NowPlayedDiv').hide();
                    $('#nowPlayedImg').attr('src','img/now.png');$('#nowPlayedImg').css('opacity','1');$('#nowPlayed').css('color','#777777').css('opacity','1');
                    $('#discoverImg').attr('src','img/discover.png');$('#discoverImg').css('opacity','1');$('#discover').css('color','#777777').css('opacity','1');
                    $('#playlistImg').attr('src','img/playlist.png');$('#playlistImg').css('opacity','1');$('#playlist').css('color','#777777').css('opacity','1');
                    $('#addImg').attr('src','img/add.png');$('#addImg').css('opacity','1');$('#add').css('color','#777777').css('opacity','1');
                    $('#NowPlayedDiv').hide();
                    $('#discoverDiv').hide();
                    $('#playlistsDiv').attr('disabled','disabled').hide();
                    $('#MyProfile').hide().attr('disabled','disabled');
                    $('#searchDiv').removeAttr("disabled").show();
                    $('#addNewPlayListDiv').hide();
                    selected="search";
                }});
            }
        }
      }
    
});



 function loadNew(e)
 {
     
     var loc=$(e).find('span').text();
     
     $('#audio').attr('src',loc);
        var zene=document.getElementById("audio"); 
        zene.play();
        $('#playimg').attr('src','img/pause.png');
        var src=$('#audio').attr('src');
        
        ID3.loadTags(src, function() {
        showTags(src);
        }, {
        tags: ["title","artist","picture"]
        });

        var images = ["img/now_green.png","img/now_green2.png","img/now_green3.png"];
        var greyimages = ["img/now.png","img/now_grey2.png","img/now_grey3.png"];
        var index=0;
        setInterval(function(){
             
                if(!zene.paused)
                {
                    if(selected=="nowPlayed")
                    {
                        $('#nowPlayedImg').attr('src',images[index]);
                        index++;
                        if(index >= images.length)
                        {
                        index=0;
                        }
                    }
                    else{
                        $('#nowPlayedImg').attr('src',greyimages[index]);
                        index++;
                        if(index >= greyimages.length)
                        {
                        index=0;
                        }
                    }
                    
                }},130);

 }



               
 function showTracksInList(e)
 {
     var listID=$(e).next().next().text();
     $.ajax(
         {
             type:'POST',
             url:'tracksInList.php',
             data:{listID:listID},
             success: function(data){
                $('#tracksinlist').html(data);
            }
    
        });
    
 }
        
function startTheList(e)
{
    var listIDtoPlay=$(e).next().text();
    $.ajax(
        {
            type:'POST',
            url:'startTheList.php',
            data:{listIDtoPlay:listIDtoPlay},
            success:function(data)
            {
                if(data!=''&&data!=null)
                {
                    var str=data;
                    actualPlayList=str.split("|");
                    actualPlayList.pop();
                    acti=0;
                    $('#audio').attr('src',actualPlayList[acti]);
                    var zene=document.getElementById("audio"); 
                    zene.play();
                    $('#playimg').attr('src','img/pause.png');
                    var src=$('#audio').attr('src');
                
                    ID3.loadTags(src, function() {
                    showTags(src);
                    }, {
                    tags: ["title","artist","picture"]
                    });

                    var images = ["img/now_green.png","img/now_green2.png","img/now_green3.png"];
                    var greyimages = ["img/now.png","img/now_grey2.png","img/now_grey3.png"];
                    var index=0;
                    setInterval(function(){
                    
                        if(!zene.paused)
                        {
                            if(selected=="nowPlayed")
                            {
                                $('#nowPlayedImg').attr('src',images[index]);
                                index++;
                                if(index >= images.length)
                                {
                                index=0;
                                }
                            }
                            else{
                                $('#nowPlayedImg').attr('src',greyimages[index]);
                                index++;
                                if(index >= greyimages.length)
                                {
                                index=0;
                                }
                            }
                            
                        }},130);
                }   
                
            }
        }

    );
}

var allReady=[];

/*FELFEDEZÉS*/
function randomMusic(e)
{
    
    $.ajax(
        {
            type:'POST',
            url: 'randomMusic.php',
            data: {isReady: "true"},
            success: function(data)
            {
                var tomb=data.split("|");
                if(allReady.includes(tomb[0]))
                {
                    randomMusic(e);
                }
                else
                {
                    allReady.push(tomb[0]);
                    $('#'+e).find(".randtitle").text(tomb[1]);
                    $('#'+e).find(".randartist").text(tomb[2]);
                    $('#'+e).find(".randCover").attr('src',tomb[4]);
                    $('#'+e).find(".hrefloc").text(tomb[3]);
                }
                
            }
        }
    );
   
}


//FENTI ACCOUNT MENÜ
$(document).ready(function()
{
    $('li').hover(function(){$(this).find('p').css('color','white');$(this).find('a').css('color','white');},
    function(){$(this).find('p').css('color','#c0c0c0');$(this).find('a').css('color','#c0c0c0');});

    $('#AccountButton').hover(function(){$(this).find('img').attr('src','img/down_white.png');},function(){$(this).find('img').attr('src','img/down.png');});


    
    var isShowed=false;

    $('#AccountButton').click(function(){
        
        if(!isShowed)
        {
            $('#ProfileMenu').show();
            isShowed=true;
            
        }
        else
        {
            $('#ProfileMenu').hide();
            isShowed=false;
            
        }  
    });


    

    $('html').click(function(e){
        if(e.target.id!='AccountButton')
        {
            
            $('#ProfileMenu').hide();
            isShowed=false;
        }
    });


    $('#myProfileli').click(function()
        {
            $('#MyProfile').show();
            
            //EGYÉB ELREJTÉSE
            $('#NowPlayedDiv').hide().attr('disabled','disabled');
            $('#searchDiv').hide().attr('disabled','disabled');
            $('#playlistsDiv').hide().attr('disabled','disabled');
            $('#discoverDiv').hide().attr('disabled','disabled');
        });


    $('#logoutli').click(function(){window.location='logout.php';});
});

//******ADATMÓDOSÍTÁSOK*****//
$(document).ready(function()
{
    $('#save').click(function()
{
    if(  $('[name="newPassword1"]').val()!=$('[name="newPassword2"]').val()  )
    {
        $('#PassWordMustMatch').show();
    }
    else
    {
        $('#PassWordMustMatch').hide();
    }

    var name='';
    var password='';
    if($('#newName').val()!=0 && $('#newPassword1').val()==0)
    {
        name=$('#newName').val();
        $.ajax(
            {
                type: 'POST',
                url: 'refresh.php',
                data: {newName: name},
                success: function(data)
                {
                        if(data=='success')
                        {
                            alert('Successfully updated!');
                            location.reload();
                        }
                    
                    
                }
            }
        );
    }


    if($('#newPassword1').val()!=0)
    {
        if($('#newPassword1').val()!=0 && $('[name="newPassword1"]').val()==$('[name="newPassword2"]').val())
        {
            password=$('#newPassword1').val();
            if($('#newName').val()==0)
            {
                $.ajax(
                    {
                        type: 'POST',
                        url: 'refresh.php',
                        data: {newPassword: password},
                        success: function(data)
                        {
                                if(data=='success')
                                {
                                    alert('Successfully updated!');
                                    location.reload();
                                }
                            
                            
                        }
                    }
                );
            }

            if($('#newName').val()!=0)
            {
                name=$('#newName').val();
                $.ajax(
                    {
                        type: 'POST',
                        url: 'refresh.php',
                        data: {newName:name, newPassword: password},
                        success: function(data)
                        {
                                if(data=='success')
                                {
                                    alert('Successfully updated!');
                                    location.reload();
                                }
                            
                            
                        }
                    }
                );
            }

        }
    }
    

   



});
}
);

/***************ÚJ ZENE HOZZÁADÁSA EGY LISTÁHOZ**********************************/
var theMusic=null;
function Add2One(e)
{
    theMusic=$(e).next().text();
    $("#selectList").show().css( {position:"absolute", top:event.clientY+10, left: event.clientX+10});
    $.ajax(
        { type:'post',url: 'whichList.php',data:{},
        success: function(data)
        {
            $('#selectList').html(data);
        }

        }
    );
        
    
}

$(document).ready(function(){

    $('html').mousedown(function(e){
        if(e.target.id!='notThisPls')
        {
            $('#selectList').hide();
        }
        
    });

    

});


function IchooseThis(e)
{
    var chosedList=$(e).find('span').eq(1).text();
    //alert("TrackID: "+theMusic+' '+"ListID: "+ListNum);
    $.ajax(
    {
        type:'POST',
        url: 'newTrack.php',
        data: {theMusic:theMusic,chosedList:chosedList},
        success: function(data)
        {
            //...
        }
        
    });
}