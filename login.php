<?php 

session_start(); // let the session begin

include("config.php"); //including config.php in our file
include('inc/header.php');

if(isset($_POST) && !empty($_POST)) {
    


    $username = $_POST['username']; //Storing username in $username variable.
    $password = md5($_POST['password']); //Storing password in $password variable.
    //echo $username;
    //echo $password;

    // // $query = sprintf("SELECT firstname, lastname, address, age FROM friends 
    // //     WHERE firstname='%s' AND lastname='%s'",
    // //     mysql_real_escape_string($firstname),
    // //     mysql_real_escape_string($lastname));

    //$check = "SELECT * from users where username = 'admin' and password = '21232f297a57a5a743894a0e4a801fc3';";
    $query = "SELECT * FROM users
        WHERE username='".$username."' AND password='".$password."'";
        
    // //$match = "select id from $table where username = '".$username."' and password = '".$password."';"; 
    // $qry = mysql_query($check);
    // $num_rows = mysql_num_rows($qry); 

    //$sql='SELECT col1, col2, col3 FROM table1 WHERE condition';
     
    $rs=$conn->query($query);
     
    if($rs === false) {
      trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
      $rows_returned = $rs->num_rows;
    }

    if ($rows_returned <= 0) { 

        
        
        // if the user doesn't exist, throw this up
        echo "Sorry, there is no username $username with the specified password.";
        echo "Try again";
        echo $match;
        if($qry) {
            echo 'q suck';
        }
        echo '<br />'.$qry;
        echo '<br />'.$num_rows;

        $message  = 'Invalid query: ' . mysql_error() . "\n";
            $message .= 'Whole query: ' . $query;
            die($message);
    
    } else {



        $_SESSION['user']= $_POST["username"]; //set session username to posted username
        $current_user = $_SESSION['user']; //keep username as variable

        $user_query = "SELECT id FROM users
            WHERE username='".$username."'";
            
        // //$match = "select id from $table where username = '".$username."' and password = '".$password."';"; 
        // $qry = mysql_query($check);
        // $num_rows = mysql_num_rows($qry); 

        //$sql='SELECT col1, col2, col3 FROM table1 WHERE condition';
         
        $user_result=$conn->query($user_query);
         
        if($user_result === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        } else {
          $rows_returned = $user_result->num_rows;
        }

        while($obj = $rs->fetch_object()) {
            
            $_SESSION['id'] = $obj->id;
            
        }

        // run an update to make user active
        //$activate = "UPDATE users SET is_active=1 WHERE username='".$current_user."'";
        
        //mysql_query($activate);
        //echo 'congrats';
        
        echo '<h3 class="text-center">You are now logged in as '.$current_user.'. Click <a href="/">here</a> to head to the main page.</h3>';    
    
        

        session_write_close();
        
    
    }



    

    } else { ?>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form-signin" id = "login_form" >
        <h2 class="form-signin-heading text-center">Gamer Login</h2>
        <input type="text" name="username" size="20" placeholder="Username">
        <input type="password" name="password" size="20" placeholder="Password"></br><br />
        <input type="submit" value="Log In" class="btn btn-large btn-primary">
        <p class="text-center"><a href="signup.php" class="text-center">Sign Up</a> </p>       
        </form>

    <?php } 

include('inc/footer.php');

?>