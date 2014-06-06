<?php
    
    $database = "throwback";  // the name of the database.
    $server = "localhost";  // server to connect to.
    $db_user = "root";  // mysql username to access the database with.
    $db_pass = "root";  // mysql password to access the database with.
    //$table = "users";    // the table that this script will set up and use.
    //$link = mysql_connect($server, $db_user, $db_pass);
    //mysql_select_db($database,$link);
    $conn = new mysqli($server, $db_user, $db_pass, $database);

    // check connection
    if ($conn->connect_error) {
      trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
    }

?>