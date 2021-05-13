<?php 
    session_start();
    //Verify if the people list will be get from a logged user or a visited profile
    if(empty($_POST['source'])){
        //Get people list from logged user
        $ObjectUser = $_SESSION['UsrPkg']['username'];
    }else{
        $ObjectUser = $_POST['source'];
    }

    //Call view templates
    require '../views/UserProfile.php';
    //Call procedures
    require '../procedures/SYS_DB_CON.php';
    require '../procedures/FollowingData.php';

    //FollowBack detector
    function FollowBackVerify($x,$y){
        for($fbv=0; $fbv<=(count($y)-1); $fbv++){
                $y[$fbv]['followBack'] = DB_VerifyFollow($x,$y[$fbv]['identificador']) ;
        }
        return $y;
    }

    function FollowedFollower($x,$y){
        for($ff=0; $ff<=(count($y)-1); $ff++){
            $y[$ff]['followBack'] = DB_VerifyFollow($y[$ff]['identificador'],$x) ;
    }
        return $y;
    }

    //Define if we need the list of people who an user follows or the list of people who follows an user
    $typeList = $_POST['typeList'];
    echo $typeList;
    if($typeList){
        //Statement to get people followed by an user
        $Pkg = getFollowedList($ObjectUser);
        if($Pkg){
            //There is data, print...
            //We want to show to user if someone from that list is following back its profile
            $Pkg = FollowBackVerify($ObjectUser,$Pkg);
            ShowFollowData(true,$Pkg,$ObjectUser);
        }else{
            echo "<script>alertify.alert('Seguidos ",$ObjectUser,"','Ocurrió un error en el sistema.<br />Intenta luego.');</script>";
        }
    }else{
        //Statement to get people who follows an user
        $Pkg = getFollowersList($ObjectUser);
        if($Pkg){
            //There is data, print...
            //We want to show to user who isn't followed by itself in these followers
            $Pkg = FollowedFollower($ObjectUser,$Pkg);
            ShowFollowData(false,$Pkg,$ObjectUser);
        }else{
            echo "<script>alertify.alert('Seguidores','Ocurrió un error en el sistema.<br />Intenta luego.');</script>";
        }
    }



?>