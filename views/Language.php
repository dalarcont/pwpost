<?php 
session_start();

/**
    Follow this statement to use correctly this language engine
    If you are in a file and one of these functions will be called after or inside an 'echo' you will declare a function with 'return'
    If you are in a file and one of these functions will be called without an echo, you will declare a echo inside the function HERE or convert the caller statement with an echo before call one of these functions.

    EXAMPLE:
        In any file 
            You see this:
                echo "bla bla bla bla bla bla _YOU-NEED-TO-PUT-SOMETHING-HERE-IN-ITS-RESPECTIVELY-LANGUAGE_ ";   
                --> Your function needs to be this way
                    public static function Something(){
                        if($_SESSION['lang']!="EN"){
                            return "WHAT_YOU_WANT_IN_X_LANGUAGE";
                        }else{
                            return "WHAT_YOU_WANT_IN_Y_LANGUAGE";
                        }
                    }
                    --> Your call procedure needs to be this way
                        echo "bla bla bla bla bla bla ".Something()." ";   
            
            You see this:
                echo "YOU-NEED-TO-PUT-SOMETHING-HERE-IN-ITS-RESPECTIVELY-LANGUAGE_";   
                --> Your function needs to be this way
                    public static function Something(){
                        if($_SESSION['lang']!="EN"){
                            echo "WHAT_YOU_WANT_IN_X_LANGUAGE";
                        }else{
                            echo "WHAT_YOU_WANT_IN_Y_LANGUAGE";
                        }
                    }
                    --> Your call procedure needs to be this way, delete that sentence and put:
                    Something();
                    There is no more to do, because that 'echo' you deleted, its included already in the function.
                    That's all.
    
    Structure of methods:
    if(lang is different from english){
        use spanish, all of this block MUST BE in spanish or your language selected for this block
        --extra params if you need, but simple params: conditionals, switchs and read some data in session frame of cookies but not processing data that you haven't, remember that this file is only for user interface behaviors
    }else{
        use english, all of this block MUST BE in english or your language selected for this block
        --extra params if you need, but simple params: conditionals, switchs and read some data in session frame of cookies but not processing data that you haven't, remember that this file is only for user interface behaviors
    }
    */
        
    class globalFrame{

        public static function langSelector_r(){
            if($_SESSION['lang']!="EN"){
                return "es";
            }else{
                return "en";
            } 
        }

        public static function langSelector_e(){
            if($_SESSION['lang']!="EN"){
                return "es";
            }else{
                return "en";
            } 
        }
    }

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
                echo "Sin derechos reservados, es tan solo un proyecto de asignatura - No ande de exigente<br>
                Final - TS5C4 - Programación Web - Tecnología en Desarrollo de Software<br>
                Universidad Tecnológica de Pereira<br>";
            }else{
                echo "No rights reserved, it is just a subject project. - Don't be picky.<br>
                Final - TS5C4 - Web Programming. - Technology in Software Development.<br>
                Technological University of Pereira.<br>";
            }
        }

        public static function loginExecutor(){
            if($_SESSION['lang']!="EN"){
                return "systemConnect(0)";
            }else{
                return "systemConnect(1)";
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

        public static function FormFields($selector){
            if($_SESSION['lang']!="EN"){
                switch($selector){
                    case 0:
                        return "validatefullname(0)";
                    break;

                    case 1:
                        return "EmailValidation(0)";
                    break;

                    case 2:
                        return "UserKeyValidation(0)";
                    break;

                    case 3:
                        return "doMkIdentity(0)";
                    break;
                }
            }else{
                switch($selector){
                    case 0:
                        return "validatefullname(1)";
                    break;

                    case 1:
                        return "EmailValidation(1)";
                    break;

                    case 2:
                        return "UserKeyValidation(1)";
                    break;

                    case 3:
                        return "doMkIdentity(1)";
                    break;
                }
            }
        }
    }
    
    class loginMessages{
        public static function UserNonexistence(){
            if($_SESSION['lang']!="EN"){
                echo "<span style='color:red'>El usuario no existe. Por favor verifica bien los datos.</span>";
            }else{
                echo "<span style='color:red'>Username does not exist. Check the data entered.</span>";
            }
        }

        public static function UserExistence(){
            if($_SESSION['lang']!="EN"){
                echo "<span style='color:green'>Por favor espere...</span>";
            }else{
                echo "<span style='color:green'>Please wait...</span>";
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

        public static function unsetIdScript(){
            if($_SESSION['lang']!="EN"){
                return 0;
            }else{
                return 1;
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
                echo "<p>Si has olvidado tu nombre de usuario, puedes recuperar tu acceso.</p><p> Luego ingresea la dirección de correo electrónico con la que te registraste. <br> A esa dirección te enviaremos tu nombre de usuario y una contraseña temporal que usarás para ingresar, una vez que ingreses te verás obligado a cambiar esa contraseña. </p>";
            }else{
                echo "<p>If you have forgotten your username, you can regain your access.</p><p>Then enter the email address with which you registered. <br> To that address we will send your username and a temporary password that you will use to enter, once you enter you will be forced to change that password.</p>";
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
                return "En tu correo electrónico encontrarás tu usuario y una contraseña temporal, úsala para iniciar sesión.<br />Una vez ingreses, el sistema te pedirá una nueva contraseña.";
            }else{
                return "In your email you will find your username and a temporary password, use it to log in. <br /> Once you log in, the system will ask you for a new password.";
            }
        }

        public static function recoverSubject(){
            if($_SESSION['lang']!="EN"){
                return "Recuperación de acceso a cuenta";
            }else{
                return "Account access recovery";
            }
        }

        public static function mailTemplate($selector){
            if($_SESSION['lang']!="EN"){
                switch($selector){
                    case 0:
                        return "C&oacute;digo de recuperaci&oacute;n de usuario";
                    break;

                    case 1:
                        return "Aquí está tu usuario e ingresa el siguiente c&oacute;digo cuando te sea solicitado en el pr&oacute;ximo inicio de sesi&oacute;n:";
                    break;
                    
                    case 2:
                        return "Este correo fue enviado a la direcci&oacute;n propuesta ";
                    break;

                    case 3:
                        return "Si usted no es el destinatario final y se trata de una equivocaci&oacute;n, por favor hacer caso omiso de este mensaje y eliminarlo.";
                    break;
                }
            }else{
                switch($selector){
                    case 0:
                        return "User recovery code";
                    break;

                    case 1:
                        return "Here is your username and enter this code when prompted at your next login.";
                    break;
                    
                    case 2:
                        return "This email was sent to the proposed address ";
                    break;

                    case 3:
                        return "If you are not the final recipient and it is a mistake, please ignore this message and delete it.";
                    break;
                }
            }
        }

        public static function KeyValidation(){
            if($_SESSION['lang']!="EN"){
                return "UserKeyValidation_2(0)";
            }else{
                return "UserKeyValidation_2(1)";
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
                        <button class='btn btn-success' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> Nueva entrada</button>
                    </div><br>
                    <div id='TwitterMenu'>
                        <button class='btn btn-light' onclick=startTwPost(0)><img src='components/newpost.png' style='width:25px;height:25px;'></img> Repost a usuario de Twitter</button>
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
                        <button class='btn btn-success' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> New entry</button>
                    </div><br>
                    <div id='TwitterMenu'>
                        <button class='btn btn-light' onclick=startTwPost(0)><img src='components/newpost.png' style='width:25px;height:25px;'></img> Republish to Twitter user</button>
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
                echo "<p>PwPost - TS5C4 Programación Web - Semestre 1 2022 - Daniel Alarcón - Universidad Tecnológica de Pereira - 2022</p></div>";
            }else{
                echo "<p>PwPost - TS5C4 Web Programming - Semester 1 2022 - Daniel Alarcón - Technological University of Pereira - 2022</p></div>";
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

        public static function NavBar_Tw(){
            if($_SESSION['lang']!="EN"){
                echo "<nav>
                <a href='Desktop.php'>Inicio</a>
            </nav>";
            }else{
                echo "<nav>
                <a href='Desktop.php' id='loadHome'>Home</a>
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
                if($list=="fwr"){ return "No hay seguidores"; }else{ return "No hay seguidos"; }
            }else{
                if($list=="fwd"){ return "There is not followers"; }else{ return "There is not followed people."; }
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

        public static function errorSetLike(){
            if($_SESSION['lang']!="EN"){
                return "No puedes marcar que te gusta este post.<br />Error del sistema";
            }else{
                return "Can't add 'Like' mark of that post.<br />System error";
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

        public static function byeProfileAfterDelete(){
            if($_SESSION['lang']!="EN"){
                return "Lamentamos que hayas dado de baja tu perfil, nos duele tu retiro.<br />Eres libre de regresar cuando quieras.<br />Atentamente, Equipo PwPost.";
            }else{
                return "We are sorry that you have unsubscribed your profile, your withdrawal hurts us. <br /> You are free to return whenever you want. <br /> Sincerely, PwPost Team.";
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

        public static function emailTemplate($selector){
            if($_SESSION['lang']!="EN"){
                switch($selector){
                    case 0:
                        return "C&oacute;digo de confirmaci&oacute;n de registro de usuario";
                    break;

                    case 1:
                        return "Est&aacute;s a unos pasos de usar nuestro sistema.<br />Ingresa el siguiente c&oacute;digo cuando te sea solicitado en tu primer inicio de sesi&oacute;n:<br>";
                    break;
                }
            }else{
                switch($selector){
                    case 0:
                        return "User registration confirmation code";
                    break;

                    case 1:
                        return "You are a few steps away from using our system. <br /> Enter the following code when prompted for your first login:";
                    break;
                }
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

    class Form_newEntry{
        public static function Fields($data){
            if($_SESSION['lang']!="EN"){
                switch($data){
                    case 0:
                        return "Nueva entrada";
                    break;

                    case 1:
                        return "Título del post";
                    break;

                    case 2:
                        return "Escribe el contenido de tu post&#10Recuerda que el sistema lee HTML por si lo deseas agregar";
                    break;

                    case 3:
                        return "Publicar";
                    break;

                    case 4:
                        return "Editar entrada";
                    break;

                    case 5:
                        return "Nuevo título del post";
                    break;

                    case 6:
                        return "No se habilitará el botón hasta que hagas una modificación.<br>El solo hecho de añadir un espacio o cualquier elemento y dejarlo o hasta incluso borrarlo para dejar el contenido intacto se considerará como actualización de entrada.";
                    break;

                    case 7:
                        return "Actualizar";
                    break;

                    case 8:
                        return "Repost";
                    break;

                    case 9:
                        return "Escribe el contenido/comentario de tu repost&#10Recuerda que el sistema lee etiquetas HTML por si lo deseas";
                    break;

                    case 10:
                        return "Título de la publicación a la que haces repost";
                    break;

                    case 11:
                        return "Contenido de la publicación a la que haces repost";
                    break;

                    case 12:
                        return "Publicar repost";
                    break;

                    case 13:
                        return "Título del repost";
                    break;
                }
            }else{
                switch($data){
                    case 0:
                        return "New post";
                    break;

                    case 1:
                        return "Entry title";
                    break;

                    case 2:
                        return "Type your post content&#10Remember that the system can read HTML if you want to add it.";
                    break;

                    case 3:
                        return "Publish";
                    break;

                    case 4:
                        return "Edit entry";
                    break;

                    case 5:
                        return "New post title";
                    break;

                    case 6:
                        return "The button will not be enabled until you make a modification. <br> The mere fact of adding a space or any element and leaving it or even deleting it to leave the content intact will be considered as an input update.";
                    break;

                    case 7:
                        return "Update";
                    break;

                    case 8:
                        return "Entry mention";
                    break;

                    case 9:
                        return "Write the content/comment of your mentioned post&#10Remember that the system can read HTML if you want to add it.";
                    break;

                    case 10:
                        return "Mentioned entry title";
                    break;

                    case 11:
                        return "Mentioned entry content";
                    break;

                    case 12:
                        return "Republish";
                    break;

                    case 13:
                        return "Title of post mention";
                    break;
                }
            }
        }

        public static function ScriptLang(){
            if($_SESSION['lang']!="EN"){
                return "SetUpPost(0)";
            }else{
                return "SetUpPost(1)";
            }
        }

        public static function ScriptLang_R(){
            if($_SESSION['lang']!="EN"){
                return "SetUpRepost(0)";
            }else{
                return "SetUpRepost(1)";
            }
        }
    }

    class ProfileViewer{
        public static function profileInformationText($selector){
            if($_SESSION['lang']!="EN"){
                switch($selector){
                    case 0:
                        echo "<div id='emptyUser'><br>No has publicado algo, por algo tu perfil está vacío.<br>Anímate, no seas mala onda.<br>
                        <button class='art-button' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> Publicar algo...</button></div>";
                    break;

                    case 1:
                        echo "<br>Este usuario no ha publicado nada.<br>Visita este perfil después.<br>";
                    break;

                    case 2:
                        echo "<big>No existen publicaciones que hayas marcado con <img src='components/unsetlike.png' style='width:25px;height:25px;'></img>.</big>";
                    break;

                    case 3:
                        echo "<big>Este usuario no existe o no está disponible temporalmente.</big>";
                    break;
                }
            }else{
                switch($selector){
                    case 0:
                        echo "<div id='emptyUser'><br>You have not published something, then your profile is empty. <br> Cheer up, don't be mean.<br>
                        <button class='art-button' onclick='startNewPost()'><img src='components/newpost.png' style='width:25px;height:25px;'></img> Post something...</button></div>";
                    break;

                    case 1:
                        echo "<br> This user has not published anything. <br> Visit this profile later. <br>";
                    break;

                    case 2:
                        echo "<big>There are no posts that you have marked with <img src='components/unsetlike.png' style='width:25px;height:25px;'></img>.</big>";
                    break;

                    case 3:
                        echo "<big>This user does not exist or is temporarily unavailable.</big>";
                    break;
                }
            }
        }

        public static function followLegend($selector){
            if($_SESSION['lang']!="EN"){
                if($selector==0){return "TE SIGUE";}else{return "NO TE SIGUE";}
            }else{
                if($selector==0){return "FOLLOWS YOU";}else{return "DOESN'T FOLLOWS YOU";}
            }
        }

        public static function followListsPeople($selector){
            if($_SESSION['lang']!="EN"){
                if($selector==0){return "Seguidos";}else{return "Seguidores";}
            }else{
                if($selector==0){return "Followed";}else{return "Followers";}
            }
        }

        public static function PeopleListText($selector){
            if($_SESSION['lang']!="EN"){
                if($selector==0){return "Fecha de registro";}else{return "Cantidad de publicaciones";}
            }else{
                if($selector==0){return "Signup date";}else{return "Quantity of posts";}
            }
        }

        public static function PeopleListFollowText($selector){
            if($_SESSION['lang']!="EN"){
                if($selector==0){return "Seguidos por ";}else{return "Seguidores de ";}
            }else{
                if($selector==0){return "Followed by ";}else{return "Followers of ";}
            }
        }

        public static function PeopleListSameUser($selector){
            if($_SESSION['lang']!="EN"){
                if($selector==0){return "Eres tú";}else{return "ERES TÚ";}
            }else{
                if($selector==0){return "It's you";}else{return "IT'S YOU ";}
            }
        }
    }


    class Twitter{

        public static function Form_RunTL_user(){
            if($_SESSION['lang']!="EN"){
                return "Ingresa el nombre de usuario de Twitter de quien deseas hacer repost:";
            }else{
                return "Type username of Twitter user you want to do repost";
            }
        }

        public static function Form_RunTL_cant(){
            if($_SESSION['lang']!="EN"){
                return "Ingresa la cantidad de entradas a visualizar:";
            }else{
                return "Type the cantity of posts you want to load";
            }
        }

        public static function Form_RunTL_button(){
            if($_SESSION['lang']!="EN"){
                return "Cargar";
            }else{
                return "Load";
            }
        }

        public static function Form_RunTL_Warnings($selector){
            if($_SESSION['lang']!="EN"){
                if($selector==0){echo "<br><p>Debes indicar un nombre de usuario</p>";}else{echo "<p>Debes indicar una cantidad de posts a cargar entre 1 y 25</p>";}
            }else{
                if($selector==0){echo "<br><p>You must indicate a username</p>";}else{echo "<p>You must indicate a number of posts to load between 1 and 25.</p>";}
            }
        }

        public static function EntryFields($selector){
            switch($selector){
                case 1:
                    if($_SESSION['lang']!="EN"){
                        return "Nombre:";
                    }else{
                        return "Name";
                    }
                break;

                case 2:
                    if($_SESSION['lang']!="EN"){
                        return "Nombre de usuario:";
                    }else{
                        return "Username:";
                    }
                break;
            }
        }

        public static function dialogText($field){
            if($field==0){
                if($_SESSION['lang']!="EN"){
                    return "Añade un título a tu repost de Twitter";
                }else{
                    return "Type a title to this new post based on Twitter post";
                }
            }else{
                if($_SESSION['lang']!="EN"){
                    return "Escribe un comentario respecto a la publicación de Twitter que has elegido.";
                }else{
                    return "Type a comment about the Twitter publication that you choose.";
                }
            }
        }

        public static function startButton(){
            if($_SESSION['lang']!="EN"){
                return "Hacer repost";
            }else{
                return "Do a repost";
            } 
        }

        public static function successPost(){
                if($_SESSION['lang']!="EN"){
                    return "Tu publicación con base en una entrada de Twitter ha sido publicada";
                }else{
                    return "Your entry about a Twitter post, has been published.";
                }            
        }

        public static function TwPostFrame(){
            if($_SESSION['lang']!="EN"){
                return "es";
            }else{
                return "en";
            } 
        }

        public static function TwLoad_Empty(){
            if($_SESSION['lang']!="EN"){
                echo "<p></p>No hay datos, verifica que el nombre de usuario esté escrito correctamente.";
            }else{
                echo "<p></p>There is no data, verify if you typed username correctly.";
            }
        }
    }
?>