# postit
  PostIt!
  WebApp for Blogging or Twitter behavior.
  Presented as final project of TS5C4 - Programación Web subject
  Purposed by the teacher.
  Universidad Tecnológica de Pereira

  This project is only for academical purposes to show the teacher how much we learn during the semester.
  -
  
  The project is going get bigger since was purposed because I'm student of the previous mentioned subject, and I develop websites empirically.
  But I think that I'm doing that in a good way...
  I don't know if my classmates knows how to programming websites and webapps. When i heard the teacher saying how will be the final project and publish the instructions I already have an idea.
  
  I think that I can pass this subject without seeing it all the time of the semester...
  
  I'm developing the project to the best of my ability.
  To present it as request to validation to pass the subject.
  I'm not interested on repeat class about things that I already know.
  -
  
  Pattern used: MVC (Model-View-Controller) but in this project the folders have a pattern like:
    Model = Procedures
    View = Views
    Controller = Controllers
    
  -
  
  Technologies used:
    FrontEnd: HTML + CSS + JS + jQuery + BOOTSTRAP
    
    BackEnd: PHP + mySQL
  
  
  Explaining the directory composition:
  -
    Folder 'components': Have icons, pictures and scripts made strictly by me for the website
    Folder 'controllers': Have the files called by a user's request in the website, as interventor between procedures and views
    Folder 'css': Have the files that apply styles on the website and include the files used by many frameworks and plugins.
    Folder 'plugins': Have the JS Core files used by many JS Frameworks that isn't made by me but i need to use them.
    Folder 'procedures': Have the files that the controller use to pull and push data on the DB or advanced procedures that the controller can't host.
    Folder 'views': Have the files that manage the user interface and graphical answer in the website. 
      ! - Some views have methods to modify a little things in the UI depending on the controller's answer and instructions to the views.
    File 'Desktop': Acts like a Dashboard, is the page that the user see after a correct login procedure.
    File 'index': Is the first page that the user see. Nobody can pass this page without a login.
    File 'profile': Is the page made to see a user's profile and it's content. Isn't necessary to be logged to use this page.
    File 'viewPost': Is the page made to see an specific post/entry. Isn't necessary to be logged to use this page.
  -
  
  
