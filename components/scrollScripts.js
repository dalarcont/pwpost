//Entire body action listener and onload behavior
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

    //Let the 'Go Top' button move around the scroll movement
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
    });


    //Let the nav options menu works
    $("#loadHome").click(function(){
        location.href='Desktop.php';
    });

    $("#showProfile").click(function(){
        var objLogged = $("#whoIsOnline").val();
        $.post('controllers/ProfileManager.php', {path:"PV",p:objLogged},function(sucess){
            $("#FrontEnd").html(sucess);
        });
                
    });

    $("#logOff").click(function(){
        location.href='index.php' ;
    });
});