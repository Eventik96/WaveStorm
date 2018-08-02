<?php
    require_once 'db.php';

//!!!!!!!!!!********TRAAAACKKK****!!!!!
    function searchTrack()
    {
        $a='<p class="pt" >Track</p>';
        $string=$_GET['sample'];
        $eleje="SELECT DISTINCT ID,Name,Artist,Location,Picture FROM Music WHERE Name LIKE '%";
        $vege="%' ORDER BY Name ASC";
        $teljes=$eleje.$string.$vege;
        $result=$GLOBALS['db']->query($teljes);
        $table=$result->fetch_all(MYSQLI_ASSOC);
        if(!$result->num_rows)
        {
            $a.='<p style="padding:0;margin:0;margin-top:2px;margin-left:20px;color:grey;text-transform:uppercase;font-size:15px;">No result</p>';
        }
        foreach ($table as $sor) 
        {
            
                $a.= '<div  style="margin:10px;margin-top:15px;margin-bottom:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;">
                <img src="'.$sor['Picture'].'" style="width:40px;height:40px;float:left;margin-right:7px;"/>
                
                <span onclick="loadNew(this)" style="max-width:400px;cursor: pointer; padding:0;margin:0;">'.$sor['Name'].'</span>
                <span style="display:none;">'.$sor['Location'].'</span>
                <span name="Add2One" onclick="Add2One(this)"><img title="Add to playlist"src="img/plusOne.png" style="top:3px;position:relative;cursor:pointer;width:18px;height:18px;"/></span>
                <span style="display:none;">'.$sor['ID'].'</span>
                <p style="padding:0;margin:0;margin-top:2px;color:grey;text-transform:uppercase;font-size:15px;">'.$sor['Artist'].'</p>
                
                </div>';
            
        }
        return $a;
    }

//!!!!!!!!!!!!!!******ARTIIIIIIST*****!!!!!!
    function searchArtist()
    {
        $a='<p class="pt" >Artist</p>';
        $string=$_GET['sample'];
        $eleje="SELECT DISTINCT COUNT(Name),Artist,Location,Picture FROM Music WHERE Artist LIKE '%";
        $vege="%' GROUP BY Artist ORDER BY Artist ASC";
        $teljes=$eleje.$string.$vege;
        $result=$GLOBALS['db']->query($teljes);
        $table=$result->fetch_all(MYSQLI_NUM);
        if(!$result->num_rows)
        {
            $a.='<p style="padding:0;margin:0;margin-top:2px;margin-left:20px;color:grey;text-transform:uppercase;font-size:15px;">No result</p>';
        }
        foreach ($table as $sor) 
        {
            $subQuery=$GLOBALS['db']->query("SELECT DISTINCT COUNT(DISTINCT Album) FROM Music WHERE Artist='{$sor[1]}'");
            $subTable=$subQuery->fetch_all(MYSQLI_NUM);

            $a.= '<div  style="margin:10px;margin-top:15px;margin-bottom:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;">
            <img  src="img/artist.png" style="width:45px;height:45px;float:left;margin-right:7px;"/>
            <p onclick="loadNew(this)" style="cursor: pointer; padding:0;margin:0;">'.$sor[1].'</p>
            <span style="display:none">'.$sor[2].'</span>
            <p style="padding:0;margin:0;margin-top:2px;color:grey;font-size:15px;">'.$sor[0].' Tracks, '.$subTable[0][0].' Albums</p>
            
            </div>';
            
        }
        return $a;
    }

//!!!!!!ALBUUUUUUUM!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    function searchAlbum()
    {
        $a='<p class="pt" >Album</p>';
        $string=$_GET['sample'];
        $eleje="SELECT DISTINCT COUNT(Name),Album,Location,Picture FROM Music WHERE Album LIKE '%";
        $vege="%' GROUP BY Album ORDER BY Album ASC";
        $teljes=$eleje.$string.$vege;
        $result=$GLOBALS['db']->query($teljes);
        $table=$result->fetch_all(MYSQLI_NUM);
        if(!$result->num_rows)
        {
            $a.='<p style="padding:0;margin:0;margin-top:2px;margin-left:20px;color:grey;text-transform:uppercase;font-size:15px;">No result</p>';
        }
        foreach ($table as $sor) 
        {
            
            $a.= '<div  style="margin:10px;margin-top:15px;margin-bottom:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;">
            <img  src="'.$sor[3].'" style="width:40px;height:40px;float:left;margin-right:7px;"/>
            <p onclick="loadNew(this)" style="cursor: pointer; padding:0;margin:0;">'.$sor[1].'</p>
            <span style="display:none">'.$sor[2].'</span>
            <p style="padding:0;margin:0;margin-top:2px;color:grey;font-size:15px;">'.$sor[0].' Tracks</p>
            
            </div>';
            
        }
        return $a;
    }


/*
    function search($mit)
    {
        if($mit=="Name")
        {
            $groupline="Track";
        }
        else
        {
            $groupline=$mit;
        } 
        $a='<p class="pt" >'.$groupline.'</p>';
        $string=$_GET['sample'];
        $eleje="SELECT DISTINCT $mit,Location FROM Music WHERE $mit LIKE '%";
        $vege="%' ORDER BY $mit ASC";
        $teljes=$eleje.$string.$vege;
        $result=$GLOBALS['db']->query($teljes);
        $table=$result->fetch_all(MYSQLI_ASSOC);

        foreach ($table as $sor) 
        {
            
                $a.= '<div>
                <p onclick="loadNew(this)" style="cursor: pointer;">'.$sor[$mit].'</p>
                <span style="display:none">'.$sor['Location'].'</span>
                </div>';
            
        }
        return $a;
    }*/

?>
    
<?php 
$tracks=searchTrack(); 
$artists=searchArtist();
$albums=searchAlbum();

echo $tracks.$artists.$albums;
?>
