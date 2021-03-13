//Click listeners
    $(document).ready(function(){
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

    function initialLoad(){
        $.post('controllers/loadHome.php', function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }

//Make profile and forgot profile
    function letMkIdentity(){
        $.post('controllers/mkIdentity.php', {callingFrom:null}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
    function doMkIdentity(){
        var package = [];
        package["callingFrom"] = "doIdentity";  
        package["username"] = $("mkidentity_username").val();
        

        $.post('controllers/mkIdentity.php', {callingFrom:'doIdentity'}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }

    function letForgotIdentify(){
        $.post('controllers/forgotIdentity.php', {callingFrom:null}, function(sucess){
            $("#FrontEnd").html(sucess);
        });
    }
    function validateUsername(){
        var username = $("#mkidentity_username").val();
        username = username.toLowerCase();
        if(username.length>=3){
            $.post("procedures/checkUserAvailable.php", {username:username}, function(data, status){
                $("#resultValidationUsername").html(data);
            });
        }
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