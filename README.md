# Current state
Running with almost all methods implemented. Still needs edit and delete writing/implementing

# Model
Currently consists of only one file which contains all database calls. May split this into various files if it seems more practical.

# View
AFIAK all necessary views are in place. Currently the login system echoes from the controller. Not MVC, I'm hoping someone can handle the front end stuff to beautify it a little.

# Controllers
Added a new controller called accounts.php. All it does at the moment is session_destroy() to recent the login. I think whoever takes on this project could refactor the login system and stick it in there.