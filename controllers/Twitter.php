<?php 

session_start();
    require '../views/Language.php';
    require '../views/Alerts.php';
    require '../views/PostForms.php';
    require '../views/entry.php';

    //Get value of data needed
    $Procedure = $_POST['call'];
    $Object = $_POST['obj'];
    $Cantity = $_POST['cant'];

    function twapikeyengine(){
        // Twitter API Tokens
        /*
        Privacy policy: Can't upload this block because it contents private keys
        */
    }
    //Main 
    function TwitterLoadEntries($who,$howmany){
        //Include TwitterAPI library
        require_once 'TwitterAPIExchange.php';


        // Twitter API Tokens
        $settings = twapikeyengine();  
    
        //API URL to operate and wait answer
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        //Parameters
        $getfield = '?screen_name='.$who.'&count='.$howmany.'';
        //Method of request
        $requestMethod = 'GET';
        //Perform Twitter engine
        $twitter = new TwitterAPIExchange($settings);
        //Perform request and get data
        $data = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(true, [CURLOPT_SSL_VERIFYPEER => false]);
        //Decode JSON package
        $arr_Tweets = json_decode($data);
        //Package to return with decoded and organized data
        $TweetsPackage = array();
        
        foreach ($arr_Tweets as $tweet){
            $tempPkg = array(
                "tw_id" => $tweet->id_str,
                "tw_pubdate" => $tweet->created_at,
                "tw_content" => $tweet->text,
                "tw_useravatar" => $tweet->user->profile_image_url,
                "tw_profile_bg_color" => $tweet->user->profile_background_color,
                "tw_username" => $tweet->user->screen_name,
                "tw_fullname" => $tweet->user->name,
                "tw_userdescription" => $tweet->user->description,
                "tw_userlink" => $tweet->entities->urls->url           
            );
            array_push($TweetsPackage,$tempPkg);
        }
        return $TweetsPackage;
    }
    

    //Assistants
    function whiteFields($x){
        if(empty($x)){return true;}else{return false;}
    }
    //Its works to remove '@'
    // some users forget to type only the username and types @username...
    function VerirfyObject($x){
        if(empty($x)){
            return false;
        }else{
            //Convert String to array
            $t = str_split($x);
            if($t[0]=="@"){
                //Remove 'at'
                $t[0]="";
                //Set the new username without @
                $x = implode($t);
                $GLOBALS['Object'] = $x;
                return true;
            }else{
                //Doesn't have @
                return true;
            }
        }
    }

    //Check again if the cantity its between 1 and 50, if is <1 or >50 show an error
    function checkCantity($x){
        if(($x<1) || ($x>50)){
            return false;
        }else{
            return true;
        }
    }

    
    //Main engine
    switch($Procedure){

        case 1:
            //Run dialog to load someone's profile
            //Check correct write of username
            $ObjectV = VerirfyObject($Object);
            //Check correct min or max cantity
            $verify_Cantity = checkCantity($Cantity);

            if(($ObjectV) && ($verify_Cantity)){
                //Can load Twitter entries
                $Pkg = TwitterLoadEntries($Object,$Cantity);
                //If the 1st array $Pkg matrix is empty, then the username isn't available or was incorrectly typed
                if(!empty($Pkg[0]['tw_id'])){
                    //There is data to print
                    printTwitterEntry($Pkg);
                }else{
                    //Maybe the user isn't available or not exists
                    Twitter::TwLoad_Empty();
                }            
            }else{
                //User to load and entry cantity wasn't indicated correctly.
                if(!$ObjectV){ Twitter::Form_RunTL_Warnings(0); }
                if(!$verify_Cantity){ Twitter::Form_RunTL_Warnings(1); }
            }
        break;

        default:
            alertMessage("Twitter",Alerts::parameterError(),false,false);
        break;
    }

?>