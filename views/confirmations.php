<?php 

    //AlertifyJS Confirmation dialogs

    function RemoveConfirmationMessage($id){
        echo "<script>alertify.confirm('".ConfirmationDialogs::Remove(0)."', '".ConfirmationDialogs::Remove(1)."', function(){ SetUpRemove('",$id,"'); }, function(){ alertify.error('".ConfirmationDialogs::RemoveNotification()."')});</script>";
    }

    function HideConfirmationMessage($id){
        echo "<script>alertify.confirm('".ConfirmationDialogs::Hide(0)."', '".ConfirmationDialogs::Hide(1)."', function(){ SetUpPrivacy('",$id,"'); }, function(){ alertify.error('".ConfirmationDialogs::HideNotification()."')});</script>";
    }

    function UnhideConfirmationMessage($id){
        echo "<script>alertify.confirm('".ConfirmationDialogs::Unhide(0)."', '".ConfirmationDialogs::Unhide(1)."', function(){ UnsetPrivacy('",$id,"'); }, function(){ alertify.error('".ConfirmationDialogs::UnhideNotification()."')});</script>";
    }

    function deleteProfileConfirmation(){
        echo "<script>alertify.confirm('".ConfirmationDialogs::DeleteProfile(0)."', '".ConfirmationDialogs::DeleteProfile(1)."', function(){ UnsetIdentity(true,".loginMessages::unsetIdScript()."); }, function(){ alertify.error('".ConfirmationDialogs::DeleteProfileNotification()."')}); $('#rmprflmail').val(''); $('#rmprflkey').val('');</script>";
    }


?>