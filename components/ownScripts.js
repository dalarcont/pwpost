/* JS Scripts
    Made only for PwPost Project
    Daniel Alarcon
 */


//Click listeners
    $(document).ready(function(){
        //Let the actions Post;Go to the top; Go to the bottom move when user scrolling 
        var am = $("#actionsMenu");
        var am2 = $("#MoreEntry");
        var am3 = $("#minusEntry");
        am2.hide();
        am3.hide();
        var pos = am.position();
        $(window).scroll(function(){
            var winpos = $(window).scrollTop();
            if(winpos>pos.top){
                am.addClass("actionsMenuMove");
                am2.show();
                am2.addClass("MoreEntryMove");
                am3.show();
                am3.addClass("minusEntryMove");
            }else{
                am.removeClass("actionsMenuMove");
                am2.hide();
                am2.removeClass("MoreEntryMove");
                am3.hide();
                am3.removeClass("minusEntryMove");
            }
        });

            /*
        //Let the 'Go Down' button move around the scroll movement
        var am2 = $("#MoreEntry");
        var pos2 = am2.position();
        //Hidde button because we only need it when the user scrolls down
        am2.hide();
        $(window).scroll(function(){
            var winpos = $(window).scrollTop();
            if(winpos>=pos2.top){
                am2.show();
                am2.addClass("MoreEntryMove");
            }else{
                am2.hide();
                am2.removeClass("MoreEntryMove");
            }
        });

        //Let the 'Go Down' button move around the scroll movement
        var am3 = $("#minusEntry");
        var pos3 = am3.position();
        //Hidde button because we only need it when the user scrolls up
        am3.hide();
        $(window).scroll(function(){
            var winpos = $(window).scrollTop();
            if(winpos>=pos3.top){
                am3.show();
                am3.addClass("minusEntryMove");
            }else{
                am3.hide();
                am3.removeClass("minusEntryMove");
            }
        });*/


        //Let the nav options menu works
        $("#loadHome").click(function(){
            $.post('controllers/loadHome.php', function(sucess){
                $("#FrontEnd").html(sucess);
            });
            
        });

        $("#showProfile").click(function(){
            $.post('controllers/loadOwnProfile.php', function(sucess){
                $("#FrontEnd").html(sucess);
            });
                    
        });

        $("#logOff").click(function(){
            location.href='index.php' ;
        });
    });
//Go to top or down
    function godown(){
        var hgt = $(document).height();
        $("html, body").animate({scrollTop:hgt+"px"});
    }
    function gotop(){
        var hgt = $(document).height();
        $("html, body").animate({scrollTop:"0px"});
    }
//Login procedure
    //Connect
    function connect(){
        var username = $("#username").val();
        var password = $("#password").val();
        if(username.length <=4 || password.length<=4){
            $("#FrontEnd").html("Verifica que tu nombre de usuario esté bien digitado al igual que tu contraseña.<br>");
        }else{
            $.post('controllers/LetLogin.php',{username:username,password:password},function(sucess){
                $("#FrontEnd").html(sucess);
            });
        }
    }
    //First access code validation
    function validateFirstCode(){
        var x = $("#firstCode");

        if(x.val().length == 8){
            //User wrote the exactly 8 digits
            $("#validateFirstButton").show();
        }
    }
    //Confirmation first access code validation
    function confirmFA(){
        var code =  $("#firstCode").val();
        $.post('controllers/confirmationFirstAccess.php', {code:code}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
    //Inital load after loggin
    function initialLoad(){
        $.post('controllers/loadHome.php', function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }


//Make profile manager
    //Start driver
    function letMkIdentity(){
        $.post('controllers/mkIdentity.php', {callingFrom:null}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
    //Assistant for enable or disable execution button
    function validateBtnGo(package){
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
    function validatefullname(){
        var a = $("#mk_fullname").val();
        if(a.length<4){
            $("#mkmsg1").html("Tu nombre debe ser de por lo menos 4 dígitos"); 
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
            $.post("procedures/checkUserAvailable.php", {username:username}, function(data, status){
                $("#mkmsg2").html(data);
                $("#mkmsg2").delay(5000).fadeOut(1000);
            });
        }
    }
    //Validate email
    function validateEmail(){
        var email = $("#mk_email").val();
        email = email.toLowerCase();
        if(email.indexOf('@') >= 0){
            if(email.length>=3){
                $.post("procedures/checkEmailAvailable.php", {email:email}, function(data, status){
                    $("#mkmsg3").html(data);
                });
            }
        }else{
            $("#mkmsg3").html("<span style='color:red'>Escribe una dirección de e-mail correcta.</span>");
        }   
        $("#mkmsg3").delay(5000).fadeOut(1000);
    }
    //Passwords field check procedure, as last field to fill, this Fx will be enable or disable the executor of mkIdentity
    function validatePassField(){
        var pswd = $("#mk_pswd").val();
        var isOk = false;
        if(pswd.length<5){
            $("#mkmsg4").html("La contraseña debe ser igual o mayor a 5 dígitos");
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
    function doMkIdentity(){
        //Enable or disable button
        var pkg = [] ;
            pkg.push($("#isOk_1").val());
            pkg.push($("#isOk_2").val());
            pkg.push($("#isOk_3").val());
            pkg.push($("#isOk_4").val());
        if(validateBtnGo(pkg)){
            //We can execute the signup procedure on DB
            var signupData = {username: "",fullname: "",email: "",pswd: "", validationCode: ""};
            signupData['username'] = $("#mk_username").val();
            signupData['fullname'] = $("#mk_fullname").val();
            signupData['email'] = $("#mk_email").val();
            signupData['pswd'] = $("#mk_pswd").val();
            //Send data to controller
            $.post('controllers/mkIdentity.php', {callingFrom:'doIdentity',data:signupData}, function(sucess){
                $("#FrontEnd").html(sucess);
            });

        }else{
            //There is a field without a validation unprocessed
            $("#completedData").html("Verifica la información ingresada.");
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
            $("#msgSpan").html("Escribe una dirección de correo verídica.");
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
    function validatePassField_2(){
        var pswd = $("#newpswd").val();
        if(pswd.length<5){
            $("#FrontEnd").html("La contraseña debe ser igual o mayor a 8 dígitos");
            $("#rcvButton").hide();
        }else{
            $("#FrontEnd").html("");
            $("#rcvButton").show();
        }
        
    }
    //Set new password on finishing recovery procedure
    function getRecovery(){
        var pswd = $("#newpswd").val();
        $.post('controllers/RecoveryAccount.php', {call:"setRecovery",data:pswd}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
    


//Follow user procedure
    function letFollow(){
        //Call the controller and send the username
        var fw = $("#isOnProfile").val();
        $.post('controllers/follow.php', {data:fw}, function(sucess){
            $("#main").html(sucess);
        });
    }

    function letUnfollow(){
        alertify.alert('Prueba','Dejar de seguir');
    }


//Entry procedures
    function letPost(){
        //Call the controller
        $.post('controllers/newPost.php', {call:"let"},function(sucess){
            $("#main").html(sucess);
        });
        
    }
    //Execution procedure
    function doPost(){
        r = 0;
        //Read properties
        var t = $("#newEntrie_title").val();
        var c = $("#newEntrie_content").val();
        

        if(t.length<5){
            //Title haven't 5 digits or more
            alertify.alert("Nueva entrada","El título debe contener 5 o más digitos.");
        }else{
            //Title have 5 digits or more, lets check the content
            if(c.length<5){
                //The content haven't 5 digits or more
                alertify.alert("Nueva entrada","El contenido debe contener 5 o más digitos.");
            }else{
                //The title and content have the required requisites, user can publish
                var pkg = {title: "",content: ""};
                pkg["title"] = t ; pkg["content"] = c ;

                $.post('controllers/newPost.php', {call:"doIt",data:pkg},function(sucess){
                    $("#main").html(sucess);
                });
            }   
        }
    }

    function letUpd(data){
        var XT = $(data).val();
        alert("UUID a editar "+XT);
    }

    function letRep(data){
        var XT = $(data).val();
        alert("UUID a repostear "+XT);
    }

    function letHide(data){
        var XT = $(data).val();
        alert("UUID a ocultar "+XT);
    }

    function letUnhide(data){
        var XT = $(data).val();
        alert("UUID a mostrar "+XT);
    }

    function letRem(data){
        var XT = $(data).val();
        alert("UUID a eliminar "+XT);
    }

    //
    