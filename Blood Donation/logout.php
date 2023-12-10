<?php
// php tag has been start to create the logout page
// session has been start from here
    session_start();
    // session unset command has been applied
    session_unset();
    // session destroy command has been applied to end the session file
    session_destroy();
    // header location has been applied to go the select page after successfully logout from the portal
    header( "location:index.html");
    // php tag end here
?>