<?php 


function sendEmail($origin,$destination,$subject,$content){
    //We need the TimeZone
    date_default_timezone_set('America/Bogota');
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=\"UTF-8\"\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "From:" . $origin;
    mail($destination, mb_encode_mimeheader($subject), $content, $headers);
    
}


?>