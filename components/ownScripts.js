//Click listeners
    $(document).ready(function(){
        //Let the 'New post' button move around the scroll movement
        var am = $("#actionsMenu");
        var pos = am.position();
        $(window).scroll(function(){
            var winpos = $(window).scrollTop();
            if(winpos>=pos.top){
                am.addClass("actionsMenuMove");
            }else{
                am.removeClass("actionsMenuMove");
            }
        });


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

    function letForgotIdentify(){
        $.post('controllers/forgotIdentity.php', {callingFrom:null}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
    
    


//Preparing methods
    function letPost(){
        //alert("crear nuevo post");
        $.post('controllers/newPost.php', function(sucess){
            $("#main").html(sucess);
            });
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

//Execution methods
    function doPost(){
        var t = $("#newEntrie_title").val();
        var c = $("#newEntrie_content").val();
        var keep1 = true;
        var keep2 = true;
        //Fields validation
        if(t.length <=4){
            keep1 = false;
            alertify.alert("Nueva entrada","El título debe ser mayor a 5 dígitos...");
            stop();
        }else{
            //That means the title have equal or more than 5 chars
            keep1 = true;
        }
        //Content validation
        if(c.length <=4){
            keep2 = false;
            alertify.alert("Nueva entrada","El contenido debe ser mayor a 5 dígitos...");
            stop();
        }else{
            keep2 = true;
        }
        
        //If both fields are true, then proceed to publish
        
        if(keep1==true && keep2==true){
            alertify.alert("Prueba","CORRECTO");
        }else{
            alertify.alert("Prueba","ERROR");
        }
    }