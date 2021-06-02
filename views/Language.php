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


    }

    class PostPage{
        public static function title(){
            if($_SESSION['lang']!="EN"){
                echo "Entrada: ";
            }else{
                echo "Post: ";
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










/*
    if($_SESSION['lang']!="EN"){
        echo "Perfil: ";
    }else{
        echo "Profile: ";
    }
    */
?>