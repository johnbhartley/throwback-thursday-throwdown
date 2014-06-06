<?php

    // grab the posted username and save it as $kitty
    $kitty = $_POST['kitty'];

    // include the config file
    include('../config.php');

    // set kitty to 0
    $kill_kitty = "UPDATE users SET kitty=0";
    mysql_query($kill_kitty);

    // set kitty to 1 for selected user
    $set_kitty = "UPDATE users SET kitty=1 WHERE username='".$kitty."'";
    mysql_query($set_kitty);

    // load the header
    include('header.php');

    echo '<h1>'.$kitty.' gets the kitty</h1>';
    echo '<br /><a class="button" href="javascript:history.go(-1)">Go Back a Page</a>';

    include('footer.php');

?>