/* JS Scripts
    Made only for PwPost Project
    Daniel Alarcon
 */


//Language switcher
    function setLang(lang){
        $.post('controllers/LanguageEngine.php', {select:lang},function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
//Go to top or down
    function BottomPage(){
        var hgt = $(document).height();
        $("html, body").animate({scrollTop:hgt+"px"});
    }
    function TopPage(){
        var hgt = $(document).height();
        $("html, body").animate({scrollTop:"0px"});
    }
    
//Login procedure
    //Connect
    function systemConnect(l){
        var username = $("#username").val();
        var password = $("#password").val();
        if(username.length <=4 || password.length<=4){
            if(l==0){
                $("FrontEnd").html("Verifica que tu nombre de usuario esté bien digitado al igual que tu contraseña.<br>");
            }else{
                $("FrontEnd").html("Verify that your username is correctly typed as well as your password.<br>");
            }
            
        }else{
            $.post('controllers/SystemLogin.php',{username:username,password:password},function(sucess){
                $("#FrontEnd").html(sucess);
            });
        }
    }
    //First access code validation
    function FirstCodeValidation(){
        var x = $("#firstCode");

        if(x.val().length >= 8){
            //User wrote the exactly 8 digits
            $("#validateFirstButton").show();
        }
    }
    //Confirmation first access code validation
    function FirstCodeConfirmation(){
        var code =  $("#firstCode").val();
        $.post('controllers/FirstAccessFinish.php', {code:code}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
    //Inital load after loggin
    function DesktopLoad(){
        $.post('controllers/HomeLoading.php', function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }


//Make profile manager
    //Start driver
    function startMakeIdentity(){
        $.post('controllers/NewIdentity.php', {callingFrom:null}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
    //Assistant for enable or disable execution button
    function ButtonGoValidation(package){
        var r = false ;
        //To enable the execution button we need 4 true statements
        if(package.indexOf('false')==-1){
            //The 4 fields are complete and validated.
            r = true;
        }else{
            //There is an uncomplete field or mismatch field
            r = false;
        }

        return r ;
    }
    //Validate if the user's full name is at least 4 chars
    function validatefullname(l){
        var a = $("#mk_fullname").val();
        if(a.length<4){
            if(l==0){
                $("#mkmsg1").html("Tu nombre debe ser de por lo menos 4 dígitos"); 
            }else{
                $("#mkmsg1").html("Your name must be at least 4 digits"); 
            }
        }else{
            $("#mkmsg1").html(""); 
            $('#isOk_1').val('true'); 
            $("#mkmsg1").delay(5000).fadeOut(1000);
        }
    }
    //Validate username
    function validateUsername(){
        var username = $("#mk_username").val();
        username = username.toLowerCase();
        if(username.length>=3){
            $.post("procedures/UsernameValidation.php", {username:username}, function(data, status){
                $("#mkmsg2").html(data);
                $("#mkmsg2").delay(5000).fadeOut(1000);
            });
        }
    }
    //Validate email
    function EmailValidation(l){
        var email = $("#mk_email").val();
        email = email.toLowerCase();
        if(email.indexOf('@') >= 0){
            if(email.length>=3){
                $.post("procedures/EmailValidation.php", {email:email}, function(data, status){
                    $("#mkmsg3").html(data);
                });
            }
        }else{
            if(l==0){
                $("#mkmsg3").html("<span style='color:red'>Escribe una dirección de e-mail correcta.</span>");
            }else{
                $("#mkmsg3").html("<span style='color:red'>Write a correct e-mail address.</span>");
            }
        }   
        $("#mkmsg3").delay(5000).fadeOut(1000);
    }
    //Passwords field check procedure, as last field to fill, this Fx will be enable or disable the executor of mkIdentity
    function UserKeyValidation(l){
        var pswd = $("#mk_pswd").val();
        var isOk = false;
        if(pswd.length<5){
            if(l==0){
                $("#mkmsg4").html("La contraseña debe ser igual o mayor a 5 dígitos");
            }else{
                $("#mkmsg4").html("The password must be equal to or greater than 5 digits");
            }
        }else{
            $("#mkmsg4").html("");
            $("#isOk_4").val('true');
            isOk = true;
        }
        $("#mkmsg4").delay(5000).fadeOut(1000);
        if(isOk){
            $("#doRegistry").show();
        }
        
    }
    
    //Executor
    function doMkIdentity(l){
        //Enable or disable button
        var pkg = [] ;
            pkg.push($("#isOk_1").val());
            pkg.push($("#isOk_2").val());
            pkg.push($("#isOk_3").val());
            pkg.push($("#isOk_4").val());
        if(ButtonGoValidation(pkg)){
            //We can execute the signup procedure on DB
            var signupData = {username: "",fullname: "",email: "",pswd: "", validationCode: ""};
            signupData['username'] = $("#mk_username").val();
            signupData['fullname'] = $("#mk_fullname").val();
            signupData['email'] = $("#mk_email").val();
            signupData['pswd'] = $("#mk_pswd").val();
            //Send data to controller
            $.post('controllers/NewIdentity.php', {callingFrom:'doIdentity',data:signupData}, function(sucess){
                $("#FrontEnd").html(sucess);
            });

        }else{
            //There is a field without a validation unprocessed
            if(l==0){
                $("#completedData").html("Verifica la información ingresada.");
            }else{
                $("#completedData").html("Verify the information entered.");
            }
        }
        
    }

//Recovery account procedure
    //Start
    function RecoveryAccount(){
        location.href = 'RecoveryAccount.php';
    }

    //Validate email
    function chkRcvEmail(){
        var email = $("#emailRecovery").val();
        email = email.toLowerCase();
        if(email.indexOf('@') == -1){
            $("#msgSpan").html("E-mail error.");
        }else{
            $("#msgSpan").html("");
            $("#rcvButton").show();
        }   
        $("#msgSpan").delay(5000).fadeOut(1000);
    }
    //Confirm recovery
    function confirmRecovery(){
        //Send data to controller
        var email = $("#emailRecovery").val();
        $.post('controllers/RecoveryAccount.php', {data:email}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
    //Vaidation for the new password afer recovery login
    function UserKeyValidation_2(l){
        var pswd = $("#newpswd").val();
        if(pswd.length<5){
            if(l==0){
                $("#FrontEnd").html("La contraseña debe ser igual o mayor a 8 dígitos");
            }else{
                $("#FrontEnd").html("The password must be equal to or greater than 8 digits");
            }
            $("#rcvButton").hide();
        }else{
            $("#FrontEnd").html("");
            $("#rcvButton").show();
        }
        
    }
    //Set new password on finishing recovery procedure
    function StartRecovery(){
        var pswd = $("#newpswd").val();
        $.post('controllers/RecoveryAccount.php', {call:"setRecovery",data:pswd}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
    


//Follow user procedure
    function SetUpFollow(data){
        //Call the controller and send the username
        if(data==null){
            //Procedure was called from a single profile viewing
            fw = $("#isOnProfile").val();
            $.post('controllers/Follow.php', {data:fw,param:"set"}, function(sucess){
                $("#main").html(sucess);
            });
        }else{
            //Procedure was called from a people listing in the user's profile or other user profile
            var ObjectUser = $(data).attr('role');
            $.post('controllers/Follow.php', {data:ObjectUser,param:"set",extra:true}, function(sucess){
                $("#main").html(sucess);
                //Clean this div to prevent garbage
                $("#main").empty();
            });
        }
    }

    function UnsetFollow(data){
        //Call the controller and send the username
        if(data==null){
            //Procedure was called from a single profile viewing
            fw = $("#isOnProfile").val();
            $.post('controllers/Follow.php', {data:fw,param:"unset"}, function(sucess){
                $("#main").html(sucess);
            });
        }else{
            //Procedure was called from a people listing in the user's profile or other user profile
            var ObjectUser = $(data).attr('role');
            $.post('controllers/Follow.php', {data:ObjectUser,param:"unset",extra:true}, function(sucess){
                $("#main").html(sucess);
                //Clean this div to prevent garbage
                $("#main").empty();
            });
        }
    }

//Auxiliar profile data
    function showProfileResume_LoggedUser(){
        $.post('controllers/ProfileManager.php', {path:RSM},function(sucess){
            $("#profileDescription").html(sucess);
        });
    }

//Entry procedures
    function startNewPost(){
        //Call the controller, but first clean divs
        $("#main").empty();
        document.querySelectorAll('[role="dialog"]').forEach(function (el){
            el.remove();
        });
        //Execute what this functions wants
        $.post('controllers/PostNew.php', {call:"let"},function(sucess){
            $("#main").html(sucess);
        });
        
    }
    //Execution procedure
    function SetUpPost(l){
        r = 0;
        //Read properties
        var t = $("#newEntry_title").val();
        var c = $("#newEntry_content").val();
        

        if(t.length<5){
            //Title haven't 5 digits or more
            if(l==0){
                alertify.alert("Nueva entrada","El título debe contener 5 o más digitos.");
            }else{
                alertify.alert("New entry","The title must contain 5 or more digits");
            }
        }else{
            //Title have 5 digits or more, lets check the content
            if(c.length<5){
                //The content haven't 5 digits or more
                if(l==0){
                    alertify.alert("Nueva entrada","El contenido debe contener 5 o más digitos.");
                }else{
                    alertify.alert("New entry","Content must contain 5 or more digits");
                }
            }else{
                //The title and content have the required requisites, user can publish
                var pkg = {title: "",content: ""};
                pkg["title"] = t ; pkg["content"] = c ;

                $.post('controllers/PostNew.php', {call:"doIt",data:pkg},function(sucess){
                    $("#main").html(sucess);
                });

                if($("#emptyUser")!=undefined){
                    $("#emptyUser").remove();
                }
            }   
        }
    }

//Edit post procedure

    function ButtonSetUpUpdatePost(data){
        $("#updBtn").show();
    }

    function startUpdatePost(data){
        //Next statement will clean any garbage of other 'Edit post' usage.
        $("#main").empty();
        document.querySelectorAll('[role="dialog"]').forEach(function (el){
            el.remove();
        });

        var e = $(data).val();
        $.post('controllers/PostUpdate.php', {call:"let",post:e},function(sucess){
            $("#main").html(sucess);
        })
    }

    function SetUpUpdatePost(){
        var edit_t = $("#editEntry_title").val();
        var edit_c = $("#editEntry_content").val();
        var id = $("#editpostid").val();
        var chk_t = $("#alterationControl_t").val();
        var chk_c = $("#alterationControl_c").val();
        var pkg = {edit_t: "",edit_c: "",id:"",chk_t: "", chk_c: ""};
        pkg["edit_t"] = edit_t; pkg["edit_c"] = edit_c ; pkg["id"]=id; pkg["chk_t"] = chk_t; pkg["chk_c"] = chk_c;
        $.post('controllers/PostUpdate.php', {call:"doIt",post:pkg},function(sucess){
            $("#main").html(sucess);
            document.querySelectorAll('[role="dialog"]').forEach(function (el){
                el.remove();
            });
        })
    }

    //Auxiliar post printer
    function PostPrinter(idp){
        $.post('controllers/PostAuxiliarPrinter.php', {post:idp},function(sucess){
            $("#auxEdited_post").html(sucess);
        })
    }
//Repost procedure
    function startRepost(data){
        //Next statement will clean any garbage of the other 'Repost' usage.
        $("#main").empty();
        document.querySelectorAll('[role="dialog"]').forEach(function (el){
            el.remove();
        });
        //Get vars
        var rpid = $(data).val();
        $.post('controllers/PostRepost.php', {call:"let",post:rpid},function(sucess){
            $("#main").html(sucess);
        })
    }

    //Execution procedure of repost
    function SetUpRepost(){
        //Read properties
        var t = $("#reEntry_title").val();
        var c = $("#reEntry_content").val();
        var rps = $("#repostsourceid").val();
        

        if(t.length<5){
            //Title haven't 5 digits or more
            if(l==0){
                alertify.alert("Repost","El título debe contener 5 o más digitos.");
            }else{
                alertify.alert("Republish","The title must contain 5 or more digits");
            }
        }else{
            //Title have 5 digits or more, lets check the content
            if(c.length<5){  
                //The content haven't 5 digits or more
                if(l==0){
                    alertify.alert("Repost","El contenido debe contener 5 o más digitos.");
                }else{
                    alertify.alert("Republish","Content must contain 5 or more digits");
                }
            }else{
                //The title and content have the required requisites, user can publish
                var pkg = {title: "",content: "",attachedid: ""};
                pkg["title"] = t ; pkg["content"] = c ; pkg["attachedid"] = rps;
                // Call controller
                $.post('controllers/PostRepost.php', {call:"doIt",data:pkg},function(sucess){
                    $("#main").html(sucess); 
                });
            }   
        }
    }

//Repost Twitter entry procedure
    function postTwEntry(data,usr){
        //Next statement will clean any garbage of the other 'Repost' usage.
        $("#main").empty();
        document.querySelectorAll('[role="dialog"]').forEach(function (el){
            el.remove();
        });
        //Start form toa dd title and comment about the twitter entry
        $.post('controllers/PostTwitter.php', {call:"let",post:data,twobj:usr},function(sucess){
            $("#main").html(sucess);
        })
    }

    //Execution procedure of repost
    function SetUp_TwPost(id,usr){
        if(typeof(id) != "undefined"){
            //Execute post
            //Read properties
            var t = $("#tw_add_title").val();
            var c = $("#tw_add_content").val();
            //The title and content have the required requisites, user can publish
            var pkg = {title: "",content: "",attachedid: "", usernametw: ""};
            pkg["title"] = t ; pkg["content"] = c ; pkg["attachedid"] = id; pkg["usernametw"] = usr;
            // Call controller
            $.post('controllers/PostTwitter.php', {call:"doIt",data:pkg},function(sucess){
                $("#main").html(sucess); 
            });
        }else{
            //Maybe something was wrong with ID assign procedure on Twitter entry printing or Twitter Repost form
        }
        
    }

//Delete post procedure
    function startRemovePost(data){
        var rm_id = $(data).val();
        $.post('controllers/PostDelete.php', {call:"let",post:rm_id},function(sucess){
            $("#main").html(sucess);
        })
        
    }

    function SetUpRemove(id){
        $.post('controllers/PostDelete.php', {call:"doIt",post:id},function(sucess){
            $("#main").html(sucess);
        })
    }

    //Hide UnHide procedure
    //Hide
    function startHidePost(data){
        var id = $(data).val();
        $.post('controllers/PostPrivacy.php', {call:"letH",post:id},function(sucess){
            $("#main").html(sucess);
        })
    }
    function SetUpPrivacy(id){
        $.post('controllers/PostPrivacy.php', {call:"doItH",post:id},function(sucess){
            $("#main").html(sucess);
        })
    }
    //Unhide
    function startUnhidePost(data){
        var id = $(data).val();
        $.post('controllers/PostPrivacy.php', {call:"letU",post:id},function(sucess){
            $("#main").html(sucess);
        })
    }
    function UnsetPrivacy(id){
        $.post('controllers/PostPrivacy.php', {call:"doItU",post:id},function(sucess){
            $("#main").html(sucess);
        })
    }



    //Like /Dislike event
    function setLikePost(data){
        var id = $(data).val();
        $.post('controllers/PostLike.php', {call:"like",post:id},function(sucess){
            $("#main").html(sucess);
        })
    }

    function unsetLikePost(data){
        var id = $(data).val();
        $.post('controllers/PostLike.php', {call:"unlike",post:id},function(sucess){
            $("#main").html(sucess);
        })
    }

//Auxiliar for profile viewing
    function ProfileView(path,object){
        $.post('controllers/ProfileManager.php', {path:path,p:object},function(sucess){
            $('#FrontEnd').html(sucess);
        })
    }

//Showing follows and followed people

    function showFollowed(){
        //Clean all dialogs/forms that we used to perform a clean new dialog
        document.querySelectorAll('[role="dialog"]').forEach(function (el){
            el.remove();
        });
        var u = $("#isOnProfile").val();
        if(u=='null'){u="";}
        $.post('controllers/PeopleList.php', {typeList:true,source:u},function(sucess){
            $("#main").html(sucess);
        })
        //Clean main div
        $("#main").empty();
    }

    function showFollowers(){
        //Clean all dialogs/forms that we used to perform a clean new dialog
        document.querySelectorAll('[role="dialog"]').forEach(function (el){
            el.remove();
        });
        var u = $("#isOnProfile").val();
        if(u=='null'){u="";}
        $.post('controllers/PeopleList.php', {typeList:null,source:u},function(sucess){
            $("#main").html(sucess);
        })
        //Clean main div
        $("#main").empty();
    }


    function showLikedPosts(){
        $.post('controllers/LikedList.php',function(sucess){
            $("#FrontEnd").html(sucess);
        })
    }
//Remove profile procedure
function startUnsetIdentity(){
    var whoRequest = $("#whoIsOnline").val();
    $.post('controllers/removeProfile.php', {call:"let",to:whoRequest},function(sucess){
        $("#main").html(sucess);
    });
}

function UnsetIdentity(confirmation,l){
    if(confirmation){
        //Get data
        var x = $("#rmprflmail").val();
        var y = $("#rmprflkey").val();
        if(x.length==0 && y.length==0){
            //Confirmation fields are empty
            if(l==0){
                alertify.alert("Eliminar perfil","No se ingresaron los datos requeridos.<br />Proceso cancelado.");
            }else{
                alertify.alert("Delete profile","The required data was not entered. <br /> Process canceled.");
            }
        }else{
            //Confirmation fields have data
            $.post('controllers/removeProfile.php', {call:"doIt",who:x,key:y},function(sucess){
                $("#main").html(sucess);
            });
        }        
    }else{
        if(l==0){
            alertify.alert("Eliminar perfil","No se puede eliminar tu perfil. Error en los parámetros.");
        }else{
            alertify.alert("Delete profile","Your profile cannot be deleted. Parameter error.");
        }
    }
    
}


//Twitter Engine
//Delete post procedure
function startTwPost(opt){
    if(opt!=0){
        var x = $("#tw_username").val();
        var y = $("#tw_cantityload").val();
        $.post('controllers/Twitter.php', {call:opt,obj:x,cant:y},function(sucess){
            $("#FrontEnd").html(sucess);
        })
    }else{
        location.href='Twitter.php';
    }
    
    
}

function SetUpRemove(id){
    $.post('controllers/PostDelete.php', {call:"doIt",post:id},function(sucess){
        $("#main").html(sucess);
    })
}