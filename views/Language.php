<?php 
session_start();

/**
    Follow this statement to use correctly this language engine
    If you are in a file and one of these functions will be called after or inside an 'echo' you will declare a function with 'return'
    If you are in a file and one of these functions will be called without an echo, you will declare a echo inside the function HERE or convert the caller statement with an echo before call one of these functions.
*/

    class indexPage{
        public static function Slogan(){
            if($_SESSION['lang']!="EN"){
                echo "Publica lo que quieras, igual nadie lo va a leer ni le dará importancia!";
            }else{
                echo "Post what you want, nobody will read it or give it importance!";
            }
        }

        public static function login_username(){
            if($_SESSION['lang']!="EN"){
                return "Nombre de usuario";
            }else{
                return "Username";
            }
        }

        public static function login_password(){
            if($_SESSION['lang']!="EN"){
                return "Contraseña";
            }else{
                return "Password";
            }
        }

        public static function login_button(){
            if($_SESSION['lang']!="EN"){
                return "Acceder";
            }else{
                return "Access";
            }
        }

        public static function makeProfile(){
            if($_SESSION['lang']!="EN"){
                return "Crear perfil";
            }else{
                return "Make a profile";
            }
        }

        public static function recoveryProfile(){
            if($_SESSION['lang']!="EN"){
                return "Recuperar perfil";
            }else{
                return "Retrieve profile";
            }
        }

        public static function footer(){
            if($_SESSION['lang']!="EN"){
                echo "Sin derechos reservados, es tan solo un proyecto de asignatura<br>
                No ande de exigente<br>
                Final - TS5C4 - Programación Web<br>
                Tecnología en Desarrollo de Software<br>
                Universidad Tecnológica de Pereira<br>";
            }else{
                echo "No rights reserved, it is just a subject project.<br>
                Don't be picky.<br>
                Final - TS5C4 - Web Programming.<br>
                Technology in Software Development.<br>
                Technological University of Pereira.<br>";
            }
        }

        
    }

    class FormIdentity{
        public static function labels($element){
            if($_SESSION['lang']!="EN"){
                switch($element){
                    case 0:
                        return "Nombre";
                    break;
                    
                    case 1:
                        return "Correo electrónico";
                    break;

                    case 2:
                        return "Nombre de usuario";
                    break;

                    case 3:
                        return "Contraseña";
                    break;

                    case 4:
                        return "Registrarme";
                    break;

                    case 5:
                        return "Crear perfil";
                    break;
                }
            }else{
                switch($element){
                    case 0:
                        return "Name";
                    break;
                    
                    case 1:
                        return "Email address";
                    break;

                    case 2:
                        return "Username";
                    break;

                    case 3:
                        return "Password";
                    break;

                    case 4:
                        return "Sign up";
                    break;

                    case 5:
                        return "Create a profile";
                    break;
                }
            }
        }
    }
    
    class loginMessages{
        public static function UserNonexistence(){
            if($_SESSION['lang']!="EN"){
                echo "<br><br>El usuario no existe.<br>Por favor verifica bien los datos.";
            }else{
                echo "<br><br>Username does not exist. Check the data entered.";
            }
        }

        public static function UserExistence(){
            if($_SESSION['lang']!="EN"){
                echo "<br><br>Por favor espere...";
            }else{
                echo "<br><br>Please wait...";
            }
        }

        public static function TroubleData(){
            if($_SESSION['lang']!="EN"){
                echo "<br><br><b>Verifica si tu contraseña está bien escrita...</b>";
            }else{
                echo "<br><br>Check if your password is spelled correctly.";
            }
        }

        public static function WrongIdentified(){
            if($_SESSION['lang']!="EN"){
                echo "<script>alert('No estás identificado correctamente...'); location.href='index.php';</script>";
            }else{
                echo "<script>alert('You are not correctly identified....'); location.href='index.php';</script>";
            }
        }
    }

    class FirstAccessPage{
        public static function resume(){
            if($_SESSION['lang']!="EN"){
                echo "<p>Dado que es tu primer acceso necesitamos confirmar que la dirección de correo electrónico que suministraste al momento del registro es de fácil acceso para ti.</p>
                <p>A continuación ingresa el código de confirmación que te enviamos:<br><i>Debes digitarlo manualmente, no lo copies y pegues directamente del correo que te enviamos.</i></p>";
            }else{
                echo "<p> Since this is your first login, we need to confirm that the email address you provided at registration is easily accessible to you. </p>
                <p> Then enter the confirmation code that we send you: <br> <i> You must type it manually, do not copy and paste it directly from the email we send you. </i> </p>";
            }
        }
    }

    class recoveryPage{

        public static function title(){
            if($_SESSION['lang']!="EN"){
                echo "Recuperación de cuenta";
            }else{
                echo "Account recovery";
            }
        }

        public static function titleInside(){
            if($_SESSION['lang']!="EN"){
                echo "Recuperar acceso";
            }else{
                echo "Regain access";
            }
        }

        public static function resume(){
            if($_SESSION['lang']!="EN"){
                echo "<p>Si has olvidado tu nombre de usuario, puedes recuperar tu acceso.</p><p>Then enter the email address with which you registered. <br> To that address we will send your username and a temporary password that you will use to enter, once you enter you will be forced to change that password.</p>";
            }else{
                echo "<p>If you have forgotten your username, you can regain your access.</p>";
            }
        }

        public static function button(){
            if($_SESSION['lang']!="EN"){
                echo "Confirmar";
            }else{
                echo "Confirm";
            }
        }

        public static function instructionChangePass(){
            if($_SESSION['lang']!="EN"){
                echo "<p>Ingresaste con la contraseña temporal</p><p>Dado esto, tendrás que asignar a tu perfil una nueva contraseña<br> Digita tu nueva contraseña. Recuerda que debe ser igual o mayor a 8 dígitos.</p>";
            }else{
                echo "<p> You entered with the temporary password </p><p> Given this, you will have to assign a new password to your profile <br> Enter your new password. Remember that it must be equal to or greater than 8 digits. </p>";
            }
        }

        public static function tempKey(){
            if($_SESSION['lang']!="EN"){
                return "En tu correo electrónico encontrarás una contraseña temporal, úsala para iniciar sesión.<br />Una vez ingreses, el sistema te pedirá una nueva contraseña.";
            }else{
                return "In your email you will find a temporary password, use it to log in. <br /> Once you log in, the system will ask you for a new password.";
            }
        }

        public static function recoverSubject(){
            if($_SESSION['lang']!="EN"){
                return "Recuperación de acceso a cuenta";
            }else{
                return "Account access recovery";
            }
        }

    }
    
    class profilePage{
        
        public static function title(){
            if($_SESSION['lang']!="EN"){
                echo "Perfil: ";
            }else{
                echo "Profile: ";
            }
        }

        public static function NavBar($user){
            if($_SESSION['lang']!="EN"){
                echo "<nav>
                <a href='#' id='loadHome'>Inicio</a><span style='padding-left:5em'></span>
                <a href='Profile.php?=".$user."' id='showProfile'>Perfil</a><span style='padding-left:5em'></span>
                <a href='#' id='logOff'>Salir</a>
                </nav>
            </header>";
            }else{
                echo "<nav>
                <a href='#' id='loadHome'>Home</a><span style='padding-left:5em'></span>
                <a href='Profile.php?=".$user."' id='showProfile'>Profile</a><span style='padding-left:5em'></span>
                <a href='#' id='logOff'>Logout</a>
                </nav>
            </header>";
            }
        }

        public static function actionsMenu(){
            if($_SESSION['lang']!="EN"){
                echo "
                    <div id='actionsMenu'>
                        <button class='btn btn-success' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> Nueva entrada</button><br><br>
                    </div>
                    <div id='MoreEntry'>
                        <button class='btn btn-info' onclick='BottomPage()'><img src='components/down.png' style='width:25px;height:25px;'></img> Ir abajo</button>
                    </div>
                    <div id='minusEntry'>
                        <button class='btn btn-info' onclick='TopPage()'><img src='components/up.png' style='width:25px;height:25px;'></img> Ir arriba</button>
                    </div>
                    ";
            }else{
                echo "
                    <div id='actionsMenu'>
                        <button class='btn btn-success' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> New entry</button><br><br>
                    </div>
                    <div id='MoreEntry'>
                        <button class='btn btn-info' onclick='BottomPage()'><img src='components/down.png' style='width:25px;height:25px;'></img> Go bottom</button>
                    </div>
                    <div id='minusEntry'>
                        <button class='btn btn-info' onclick='TopPage()'><img src='components/up.png' style='width:25px;height:25px;'></img> Go top</button>
                    </div>
                    ";
            }
        }

        public static function buttonDeleteProfile(){
            if($_SESSION['lang']!="EN"){
                return "Eliminar mi perfil";
            }else{
                return "Delete my profile";
            }
        }
        public static function buttonListLikedPost(){
            if($_SESSION['lang']!="EN"){
                return "Mostrar post que me gustan";
            }else{
                return "Show post I like";
            }
        }

    }

    class PostPage{
        public static function title(){
            if($_SESSION['lang']!="EN"){
                echo "Entrada: ";
            }else{
                echo "Post: ";
            }
        }

        public static function titlePostAux(){
            if($_SESSION['lang']!="EN"){
                return "no disponible";
            }else{
                return "not available";
            }
        }

        public static function NavBar(){
            if($_SESSION['lang']!="EN"){
                echo "<nav>
                <a href='#' id='loadHome'>Inicio</a><span style='padding-left:5em'></span>
                <a href='#' id='showProfile'>Perfil</a><span style='padding-left:5em'></span>
                <a href='#' id='logOff'>Salir</a>
                </nav>
                <!-- In this page we didn't include the 'New entry' button-->";
            }else{
                echo "<nav>
                <a href='#' id='loadHome'>Home</a><span style='padding-left:5em'></span>
                <a href='#' id='showProfile'>Profile</a><span style='padding-left:5em'></span>
                <a href='#' id='logOff'>Logout</a>
                </nav>
                <!-- In this page we didn't include the 'New entry' button-->";
            }
        }

        public static function EntryPrivateAlertText(){
            if($_SESSION['lang']!="EN"){
                echo "La publicación que buscas no está disponible. Puede ser que esté privada o haya sido eliminada.";
            }else{
                echo "The publication you are looking for is not available. It may be private or it may have been deleted.";
            }
        }
    }

    class DesktopPage{

        public static function insideSlogan(){
            if($_SESSION['lang']!="EN"){
                echo "<p>PwPost - TS5C4 Programación Web - Semestre 1 2021 - Daniel Alarcón - Universidad Tecnológica de Pereira - 2021</p></div>";
            }else{
                echo "<p>PwPost - TS5C4 Web Programming - Semester 1 2021 - Daniel Alarcón - Technological University of Pereira - 2021</p></div>";
            }
        }

        public static function NavBar(){
            if($_SESSION['lang']!="EN"){
                echo "<nav>
                <a href='#' id='loadHome'>Inicio</a><span style='padding-left:5em'></span>
                <a href='#' id='showProfile'>Perfil</a><span style='padding-left:5em'></span>
                <a href='#' id='logOff'>Salir</a>
            </nav>";
            }else{
                echo "<nav>
                <a href='#' id='loadHome'>Home</a><span style='padding-left:5em'></span>
                <a href='#' id='showProfile'>Profile</a><span style='padding-left:5em'></span>
                <a href='#' id='logOff'>Logout</a>
            </nav>";
            }
        }
    }

    class Alerts{
        public static function Finish1StAccessText(){
            if($_SESSION['lang']!="EN"){
                return "El código ha sido confirmado correctamente!<br>Bienvenido(a)!";
            }else{
                return "The code has been successfully confirmed.<br>Welcome!";
            }
        }

        public static function Finish1StAccessTextError(){
            if($_SESSION['lang']!="EN"){
                return "Código incorrecto, verifica e intenta nuevamente.";
            }else{
                return "Wrong code, check and try again.";
            }
        }

        public static function FollowAlertTitle(){
            if($_SESSION['lang']!="EN"){
                return "Seguir usuario";
            }else{
                return "Follow user";
            }
        }

        public static function sessionBroke_message(){
            if($_SESSION['lang']!="EN"){
                return "Error de sesión<br />No se puede ejecutar tu orden.<br />Intenta nuevamente.<br />Si el problema persiste, por favor cierra e inicia sesión nuevamente.";
            }else{
                return "Session error <br /> Your order cannot be executed. <br /> Please try again. <br /> If the problem persists, please close and log in again.";
            }
        }

        public static function systemError(){
            if($_SESSION['lang']!="EN"){
                return "Ocurrió un error en el sistema.<br />Por favor intenta luego.";
            }else{
                return "A system error occurred. <br /> Please try again later.";
            }
        }

        public static function errorSignup(){
            if($_SESSION['lang']!="EN"){
                return "Ha ocurrido un error en nuestro servidor al momento de registrarte. Intenta nuevamente más tarde, si el problema persiste comunícate con soporte.";
            }else{
                return "An error occurred on our server when you registered. Please try again later, if the problem persists contact support.";
            }
        }

        public static function successSignup($object){
            if($_SESSION['lang']!="EN"){
                return "Apreciado(a) ".$object."<br />Tu registro ha sido exitoso. Falta un paso más!<br />En tu correo electrónico encontrarás un código que te será solicitado cuando inicies sesión por primera vez.";
            }else{
                return "Dear ".$object."<br /> Your registration has been successful. One more step is missing! <br /> In your email you will find a code that will be requested when you log in for the first time.";
            }
        }

        public static function MakeIdentityTitle(){
            if($_SESSION['lang']!="EN"){
                return "Registro de usuario";
            }else{
                return "User signup";
            }
        }

        public static function followedTitle(){
            if($_SESSION['lang']!="EN"){
                return "Seguidos";
            }else{
                return "Followed";
            }
        }

        public static function followersTitle(){
            if($_SESSION['lang']!="EN"){
                return "Seguidores";
            }else{
                return "Followers";
            }
        }

        public static function noPeople($list){
            if($_SESSION['lang']!="EN"){
                if($list=="fwr"){ return "No hay seguidores"; }else{ return "There is not followers"; }
            }else{
                if($list=="fwd"){ return "No hay seguidos"; }else{ return "There is not followed people."; }
            }
        }

        public static function postDeleteTitle(){
            if($_SESSION['lang']!="EN"){
                return "Eliminación de entrada";
            }else{
                return "Entry removing";
            }
        }

        public static function parameterError(){
            if($_SESSION['lang']!="EN"){
                return "Error en parámetros";
            }else{
                return "Parameter Error";
            }
        }

        public static function successDelete(){
            if($_SESSION['lang']!="EN"){
                return "Entrada eliminada<br />Aquellos usuarios que hayan realizado repost de esta entrada les saldrá un aviso de que la misma ya no está disponible.";
            }else{
                return "Post deleted <br /> Those users who have reposted this post will get a notice that it is no longer available. ";
            }

        }

        public static function errorDelete(){
            if($_SESSION['lang']!="EN"){
                return "Ha ocurrido un error en la base de datos.<br />No se pudo eliminar tu entrada. Intenta más tarde.";
            }else{
                return "An error occurred in the database. <br /> Your entry could not be removed. Please try later.";
            }

        }

        public static function errorDeleteAuthority(){
            if($_SESSION['lang']!="EN"){
                return "No se puede eliminar la entrada<br />Tú no eres el propietario de la entrada.";
            }else{
                return "Cannot delete entry <br /> You are not the owner of the entry.";
            }

        }

        public static function errorUnsetLike(){
            if($_SESSION['lang']!="EN"){
                return "No puedes marcar que ya no te gusta este post.<br />Error del sistema";
            }else{
                return "Can't remove 'Like' mark of that post.<br />System error";
            }
        }

        public static function noAvailablePostLike(){
            if($_SESSION['lang']!="EN"){
                return "El post que intentas marcar como que te gusta ya no está disponible.";
            }else{
                return "The post you are trying to mark as you like is no longer available.";
            }
        }

        public static function newEntryTitle(){
            if($_SESSION['lang']!="EN"){
                return "Nueva entrada";
            }else{
                return "New entry";
            }
        }

        public static function errorNewEntry(){
            if($_SESSION['lang']!="EN"){
                return "Ha ocurrido un error en la base de datos.<br />No se pudo publicar tu entrada. Intenta más tarde.";
            }else{
                return "An error occurred in the database. <br /> Your entry could not be published. Please try later.";
            }
        }

        public static function privacyTitle(){
            if($_SESSION['lang']!="EN"){
                return "Privacidad de entrada";
            }else{
                return "Entry's privacy";
            }
        }

        public static function errorPrivacy(){
            if($_SESSION['lang']!="EN"){
                return "Ha ocurrido un error en la base de datos.<br />No se pudo aplicar la privacidad de tu entrada. Intenta más tarde.";
            }else{
                return "An error has occurred in the database. <br /> The privacy of your entry could not be applied. Please try later.";
            }
        }

        public static function errorPrivacyAuthority(){
            if($_SESSION['lang']!="EN"){
                return "No se puede operar la entrada<br />Tú no eres el propietario de la entrada.";
            }else{
                return "The ticket cannot be operated <br /> You are not the owner of the ticket.";
            }
        }

        public static function successPrivacySet(){
            if($_SESSION['lang']!="EN"){
                return "Entrada oculta<br />Aquellos usuarios que hayan realizado repost de esta entrada les saldrá un aviso de que la misma ya no está disponible.";
            }else{
                return "Hidden entry <br /> Those users who have reposted this entry will get a notice that it is no longer available.";
            }
        }

        public static function successPrivacyUnset(){
            if($_SESSION['lang']!="EN"){
                return "Entrada pública<br />Aquellos usuarios que hayan realizado repost de esta entrada les aparecerá el contenido.";
            }else{
                return "Public entry <br /> Those users who have reposted this entry will see the content.";
            }
        }

        public static function privacyNotificationSet(){
            if($_SESSION['lang']!="EN"){
                return "Entrada privatizada";
            }else{
                return "Privatized entry";
            }
        }

        public static function privacyNotificationUnset(){
            if($_SESSION['lang']!="EN"){
                return "Entrada pública";
            }else{
                return "Public entry";
            }
        }

        public static function noAvailablePostRepost(){
            if($_SESSION['lang']!="EN"){
                return "El post que intentas repostear ya no está disponible.";
            }else{
                return "The post you are trying to repost is no longer available.";
            }
        }

        public static function updateTitle(){
            if($_SESSION['lang']!="EN"){
                return "Actualización de entrada";
            }else{
                return "Entry update";
            }
        }

        public static function updateLimit(){
            if($_SESSION['lang']!="EN"){
                return "Ya utilizaste las 5 veces que se permite que una entrada sea editada.<br />No se permite editar la entrada.<br />Crea una nueva o hazle repost a esta.";
            }else{
                return "You have already used the 5 times an entry is allowed to be edited. <br /> The entry is not allowed to be edited. <br /> Create a new one or repost it.";
            }
        }

        public static function noupdateNotification(){
            if($_SESSION['lang']!="EN"){
                return "No se realizaron modificaciones";
            }else{
                return "No modifications were made";
            }
        }

        public static function updateNotification(){
            if($_SESSION['lang']!="EN"){
                return "Entrada actualizada. La encuentras al principio de la página.";
            }else{
                return "Updated entry. You find it at the top of the page.";
            }
        }

        public static function errorUpdate(){
            if($_SESSION['lang']!="EN"){
                return "Ha ocurrido un error en la base de datos.<br />No se pudo actualizar tu entrada. Intenta más tarde.";
            }else{
                return "An error occurred in the database. <br /> Your entry could not be updated. Please try later.";
            }
        }

        public static function recoveryTitle(){
            if($_SESSION['lang']!="EN"){
                return "Recuperar cuenta";
            }else{
                return "Recover account";
            }
        }

        public static function failMailCheckOnRecovery(){
            if($_SESSION['lang']!="EN"){
                return "La dirección de correo electrónico proporcionada NO existe en nuestra base de datos.";
            }else{
                return "The email address provided does NOT exist in our database.";
            }
        }

        public static function successRecovery(){
            if($_SESSION['lang']!="EN"){
                return "Cuenta y contraseña de acceso recuperadas.";
            }else{
                return "Account and access password recovered.";
            }
        }
        
        public static function deleteProfileTitle(){
            if($_SESSION['lang']!="EN"){
                return "Eliminar perfil";
            }else{
                return "Delete profile";
            }
        }

        public static function deleteProfileAuthority(){
            if($_SESSION['lang']!="EN"){
                return "Los datos para verificación de autoridad sobre el perfil no son correctos.<br />Se puede tratar de una suplantación de identidad en este preciso momento.";
            }else{
                return "The data for the authority verification on the profile is not correct. <br /> It may be a spoofing at this precise moment.";
            }
        }

        public static function successDeleteProfile(){
            if($_SESSION['lang']!="EN"){
                return "El perfil ha sido eliminado exitosamente.";
            }else{
                return "The profile has been successfully deleted.";
            }
        }

    }

    class Follow{
        public static function unfollowButton(){
            if($_SESSION['lang']!="EN"){
                return "Dejar de seguir";
            }else{
                return "Unfollow";
            }
        }

        public static function followButton(){
            if($_SESSION['lang']!="EN"){
                return "Seguir";
            }else{
                return "Follow";
            }
        }
    }

    class Like{
        public static function LikeTitleHead(){
            if($_SESSION['lang']!="EN"){
                echo "<h3>Publicaciones que te gustaron</h3>";
            }else{
                echo "<h3> Posts you liked </h3>";
            }
        }
    }

    class MakeIdentity{
        public static function mailSubject(){
            if($_SESSION['lang']!="EN"){
                return "Código de confirmación de registro";
            }else{
                return "Registration confirmation code";
            }
        }

        public static function emailCheck($option){
            if($_SESSION['lang']!="EN"){
                if($option==0){ return " pertenece a otro usuario!"; }else{ return " está libre de asociación!";}
            }else{
                if($option==0){ return " belongs to another user!"; }else{ return "is free of association!";}
            }
        }

        public static function usernameCheck($option){
            if($_SESSION['lang']!="EN"){
                if($option==0){ return " está en uso!"; }else{ return " está disponible!";}
            }else{
                if($option==0){ return " already in use!"; }else{ return " is available!";}
            }
        }

        public static function auxField(){
            if($_SESSION['lang']!="EN"){
                return "Nombre de usuario ";
            }else{
                return "Username ";
            }
        }

    }

    class ConfirmationDialogs{

        public static function Remove($side){
            if($_SESSION['lang']!="EN"){
                if($side==0){return "Eliminar entrada";}else{return "¿En realidad quieres eliminar esta entrada?";}
            }else{
                if($side==0){return "Delete entry";}else{return "Do you really want to delete this entry?";}
            }
        }
            public static function RemoveNotification(){
                if($_SESSION['lang']!="EN"){
                    return "Se cancela eliminación de la entrada";
                }else{
                    return "Entry deletion is canceled";
                }
            }


        public static function Hide($side){
            if($_SESSION['lang']!="EN"){
                if($side==0){return "Ocultar entrada";}else{return "¿En realidad quieres ocultar esta entrada?";}
            }else{
                if($side==0){return "Hide entry";}else{return "Do you really want to hide this entry?";}
            }
        }
            public static function HideNotification(){
                if($_SESSION['lang']!="EN"){
                    return "Se cancela privatización de la entrada";
                }else{
                    return "Entry privatization canceled";
                }
            }


        public static function Unhide($side){
            if($_SESSION['lang']!="EN"){
                if($side==0){return "Mostrar entrada";}else{return "¿En realidad quieres mostrar esta entrada?";}
            }else{
                if($side==0){return "Unhide entry";}else{return "Do you really want to unhide this entry?";}
            }
        }
            public static function UnhideNotification(){
                if($_SESSION['lang']!="EN"){
                    return "Se cancela visibilidad de la entrada";
                }else{
                    return "Entry visibility is canceled";
                }
            }


        public static function DeleteProfile($side){
            if($_SESSION['lang']!="EN"){
                if($side==0){return "Eliminar perfil";}else{return "Para confirmar la eliminación de tu perfil, escribe tus datos de inicio de sesión. <div class=mb-3><label for=username class=form-label>Correo electrónico</label> <input type=text class=form-control id=rmprflmail aria-describedby=emailHelp></div><div class=mb-3><label for=password class=form-label>Contraseña de inicio de sesión en PwPost!</label><input type=password class=form-control id=rmprflkey></div>";}
            }else{
                if($side==0){return "Delete profile";}else{return "To confirm the deletion of your profile, enter your login details.<div class=mb-3><label for=username class=form-label>Email</label> <input type=text class=form-control id=rmprflmail aria-describedby=emailHelp></div><div class=mb-3><label for=password class=form-label>PwPost login password</label><input type=password class=form-control id=rmprflkey></div>";}
            }
        }
            public static function DeleteProfileNotification(){
                if($_SESSION['lang']!="EN"){
                    return "Eliminación de perfil cancelada";
                }else{
                    return "Profile deletion canceled";
                }
            }


    }

    class Entry{
        public static function EditCounterFrame($a,$b,$c){
            if($_SESSION['lang']!="EN"){
                return "Ediciones: ".$a." - Fecha de edición previa a la actual: ".$b." - Fecha de publicación original: ".$c;
            }else{
                return "Editions: ".$a." - Edition date prior to the current one: ".$b." - Original publication date: ".$c;
            }
        }

        public static function EntryAttached($text){
            if($_SESSION['lang']!="EN"){
                switch($text){
                    case 0:
                        return "Esta entrada es un repost de otra que está privada o fue eliminada.";
                    break;
                    
                    case 1:
                        return "Repost a entrada de: ";
                    break;

                    case 2:
                        return "Ver original del post adjunto";
                    break;

                }
            }else{
                switch($text){
                    case 0:
                        return "This entry is a repost of another that is private or was deleted.";
                    break;
                    
                    case 1:
                        return "Repost at the entry of: ";
                    break;

                    case 2:
                        return "See original of the attached post";
                    break;

                }
            }
        }

        public static function EntryVersionControl($side){
            if($_SESSION['lang']!="EN"){
                if($side==0){ return "Versión original."; }else{ return "Edición #"; }
            }else{
                if($side==0){ return "Original version"; }else{ return "Edition #"; }
            }
        }

        public static function publishText($side){
            if($_SESSION['lang']!="EN"){
                if($side==0){ return "Publicado por: "; }else{ return "Fecha de publicación: "; }
            }else{
                if($side==0){ return "Published by: "; }else{ return "Publication date: "; }
            }
        }

        public static function publishOne_ifEmptyProfile($selector){
            if($_SESSION['lang']!="EN"){
                if($selector==0){ return "<br>No sigues a ninguna cuenta y tampoco has publicado algo.<br>Anímate, no seas mala onda.<br>"; }else{ return "Publicar algo... "; }
            }else{
                if($selector==0){ return "<br> You don't follow any account and you haven't published anything either. <br> Cheer up, don't be bad. <br>"; }else{ return "Post something ... "; }
            }
        }

        public static function publishTextVersionControl($side){
            if($_SESSION['lang']!="EN"){
                if($side==0){ return "Publicado por: "; }else{ return "Fecha de publicación de esta versión: "; }
            }else{
                if($side==0){ return "Published by: "; }else{ return "Release date of this version:"; }
            }
        }
    }



/*
    if($_SESSION['lang']!="EN"){
        return "Perfil: ";
    }else{
        return "Profile: ";
    }

    if($_SESSION['lang']!="EN"){
        echo "Perfil: ";
    }else{
        echo "Profile: ";
    }

    if(lang is different from english){
        use spanish
        --extra params if you need
    }else{
        use english
        --extra params if you need
    }
    */
?>