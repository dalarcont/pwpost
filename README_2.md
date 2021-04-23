# PWPost
  PWPost!
  (ProgramaciónWeb Post)
  
  WebApp for Blogging or Twitter behavior.
  
  Presented as final project of TS5C4 - Programación Web subject
  
  Purposed by the teacher.
  
  Universidad Tecnológica de Pereira
  
  This project is only for academical purposes to show the teacher how much we learn during the semester.
  -

    Explaining how it works, but with this requirements:
    
      Webserver
    
      PHP Processor (maybe already integrated in webserver)
    
      Email SMTP server
    
      mySQL or mariaDB (maybe already integrated in webserver) with the DB structure that we provide. (Ask me)
      
   Always keep this in mind:
      Every button that will results in an action will call first a controller, and that controller will call at least 1 procedure and 1 view...
      The pattern will not broken...
      Some controllers can calls 2 or more controllers or procedures and views, but they respects the integrity of each one.
      The unique responsability resides in controller, controller will adapt or transform the collected data from procedures to send to the views...
      We can't put loggin view parameters in 'delete entry' view parameters... Unless the controller adapts it.
      
      Resume:
      Click in a function -> calls a Controller
        Controller (treat as 'main controller') -> maybe call other controller; call procedure(s); call view(s);
          Controller calls other controller, procedure and/or view but isn't too much related to what the main app wants to do?
            main controller must adapt the data to communicate properly with the other controllers and views that isn't related too.
  
  -
    FOR UNLOGGED USERS:

    Unlogged users can:

        Create a profile
        Try to recover a profile that already exists since they have the signup email address as proof of authority over the account
        See an entry
        See a profile
        And... nothing more than see what a beauty is the project
    -
        *CREATING A PROFILE*
    
        In the main page, the user can clicks to 'Crear perfil', and it runs a controller that invokes a dialog where the user will able to provide it's full name, it's email address, it's username by it's own choice, and finally a password.
        After provide that data, the dialog enables the 'Registrarme' button, user can click it.
        After clicks that, system will call again the same controller that we said previously but saying to it that we need to sign-up the user and not to show the form. 
        In that process, the controller pull the data from the form and sends it to a model/procedure where will be processed in a database, if  was so success, model/procedure returns a 'true' or 'correct', but if was useless returns a 'false' or 'incorrect'. 
        
        But we are sure that it works if the requirements are properly installed.
        After receive a 'true', controller will close the form dialog, and shows a pop-up saying the user's full name following a sentence indicating that the user was signup successfully. In second plane, the controller will send an email with a code that will be required for the first login to verify the user's authority over the email address provided.
        The user will close that pop-up. And the page will reload to clean any formdata that there are.
        
        
        *RECOVERING A PROFILE*
        
        In the main page, the user can clicks to 'Recuperar perfil', and it runs a controller that invokes a dialog where the user will able to provide it's signup email address.
        After provide that address, the user can click the button 'Continuar', and the controller will act same as the previous process that we said.
        The controller for the account recovery process will send the address to a procedure to verify if exists.
        If exists, procedure will remove the actual password of the associated account to the address, and set a temporal password provided by the controller.
        If after that the procedure returns 'true', the controller will send an email with the temporal password that be needed to login again.
        In the first login after a recovery procedure, user will login with it's username and the temporal password, so, the system detects that the password is for one single use, and will require to user to set a new personal password. 
        After send the new personal password, the respective procedure file, will remove the temporal password and set the new personal password, if it was correct, the controller will shows a message and send the browser's location to index page where the user can login normally.
        
        *SEE AN ENTRY*
        
        If a user have a link to any post of any user, the public and anyone can access to see the entry.
        
        *SEE PROFILE*
        
        If a user have a link to any profile, the public and anyone can access to see the profile and it's entries.

  -
    FOR LOGGED USERS:

    Logged users can:

        See desktop page.
        See profile
        See an entry
        Post a new entry
        Edit entry
        Repost entry
        Apply privacy to an entry
        Delete entry
        Delete profile
        And... nothing more than see what a beauty is the project
    -
        *DESKTOP PAGE*
    
        In the main page
        
        *PROFILE*
    
        If the logged user is in the desktop or seeing another profile and clicks on the profile's username of an entry, it will gives a new page with showing the entire profile of the respective user that is looking for. But, if decides to see his own profile, then, will see all of his profile, the difference between see another user profile and the own profile it's that when you are seeing the own profile, system will show all of the entries included the private. Marking an entry as private it will don't show to the public, only shows to the owner.
        
        *SEE ENTRY*
    
        If the logged user is in the desktop or seeing another profile and clicks on the publication date of an entry (included it's own entries), it will gives a new page with showing only the specific entry.
        
        *POST NEW ENTRY*
    
        In the main page, the user will see always a green button 'Nueva entrada', the button will stay at bottom of the navigation links located at the top center. And according to the scrolling, the button will be moved to the page's right down corner.
        If the user clicks that button, a controller will display a dialog where the user types entry's title, and the content. Once complete the dialog, can click at 'Publicar', the controller invokes the respective procedure file, when the procedure returns 'true', the controller close the new entry dialog and reload the page to see that entry.
        
        *EDIT ENTRY*

        Staying at desktop page, or the logged user profile, the entries that the logged user is the owner, these can be modified, the user will click on the blue icon 'Edit', the system calls a controller where will invoke an entry editing dialog, in that dialog will show the selected entry to edit, it's title and content, but able to modify, the user make the changes that needed, then clicks on 'Publicar', this acts like the ' *post new entry* ' procedure but the parameters sent to the procedure file will be different. After procedure returns 'true', the controller close the dialog and changes the title and content in the objective without a reloading. That procedure keeps the unique post ID, the publication date, but add a legend 'Edited X times / Last entry edition date before the actual / Original publication date: ' on the center of the entry's top, that contents the times the entry did suffer an edition and the last edition date._
        
        *REPOST ENTRY*
    
        _In development_
        Staying at desktop page, or the logged user profile, the entries that the logged user is the owner, these can be reposted, the user will click on the white icon 'Repost', the system calls a controller where will invoke an entry editing dialog, in that dialog will show an area to write the entry title, and area to write a comment, finally an area showing the entry that the user wants to repost.
        System will let publish a repost if title and content have more than 5 characters writed.
        If in the moment that the user does a repost the entry is 'public', the entry will show the attached post, but in next times the system loads that repost its attachated post was set to 'privacy' or 'deleted', will be appear a text under the post content saying something like 'The attached post isn't available', but there is not a way to know if the attached post was hiden or deleted, then the user knows what to do with its repost...
        
        *APPLY PRIVACY TO AN ENTRY* 
    
        At the right-up side of each entry, the user will see a yellow button with the following ocurrency:
        If is to set privacy to a post (i.e. to set entry visibility only for its owner and nobody else): user will see yellow button with a red padlock inside.
        If is to unset privacy i.e. to set public and visible for anyone: user will see yellow button with a blue padlock inside.
        System will know what button was clicked, system will take the UID of the post then verify if the user that wants to hide the post is the owner of the same.
        System does that verification procedure for second time to prevent an ID suplantation, the first verification take place when the post is being loaded, if the logged user is the owner of that post, system will show Edit/Hide/Unhide/Delete options.
        After verirication procedure, will show a message to ask/request confirmation to hide/unhide entry, after user approval, system will change in DB a post property to let know that post was set to hide/unhide, then the system will apply some changes in the view, like we explain following:
        If the post is HIDE and user clicks UNHIDE = Change yellow button with open blue padlock TO same yellow button but with a closed red padlock.
        If the post is UNHIDE and user clicks HIDE = Change yellow button with closed red padlock TO same yellow button but with a open blue padlock.
        
        *DELETE ENTRY*
    
        At the right-up side of each entry, the user will see a red button.
        If user wants to delete an entry, will click that button, system will show a message to ask/request a confirmation, after that, system will check the authority over that post of the user that wants to delete the entry. 
        If it was ok, system will use the UID of the post and will DELETE with no way to undo that. After system confirms the delete procedure, system will remove the post from the HTML. That's all.
        
        *DELETE PROFILE*
      
        _In development_
        When a logged user clicks on 'Perfil' will goes to its profile and will see a red button 'Dar de baja al perfil', if user clicks that button, the next things will be happen:
        Systems shows a dialog requesting for the user email and password, that email and password MUST BE THE SAME AS THE USER WROTE TO SIGNUP IN THE PLATFORM.
        User will click 'Validar', if validation procedure was ok, that button will be removed and a new button take its place, the button 'Confirmo mi baja de la plataforma', if user clicks that button, system will remove any associated data with the user's UID (like its posts, the follow records).
        If user doesnt clicks 'Confirmo mi baja de la plataforma', system will operate normally.