<?php
session_start();
    include("inc/header.php"); 
    include("config.php"); 
    //including config.php in our file

    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])){
        // Now checking user name and password is entered or not.
        $first_name= $_POST['firstname'];
        $last_name= $_POST['lastname'];
        $username = $_POST['username'];
        $email= $_POST['email'];
        //$txt = $username;
        $password = md5($_POST['password']);
        //$mail = mysql_real_escape_string($_POST['email']);
        
        // $check = "SELECT * from users where username = '".$user."'";
        // $qry = mysql_query($check);
        // $num_rows = mysql_num_rows($qry); 

        // if($num_rows > 0){
        // // Here we are checking if username is already exist or not.

        //     echo "The username you have entered is already exist. Please try another username.";
        //     echo '<a href="signup.php">Try Again</a>';
        //     exit;

        // }

        $query = "INSERT INTO users (username,password,firstname,lastname,email) VALUES ('".$username."','".$password."','".$first_name."','".$last_name."', '".$email."');";

        // Now inserting record in database.
        //$query = "INSERT INTO users (username,password,firstname,lastname) VALUES ('".$username."','".$password."','".$first_name."','".$last_name."');";
        $rs=$conn->query($query);
        if($rs === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        } else {
          $rows_returned = $rs->num_rows;
        }
        
        echo "<h3 class='text-center'>Thank You for Registration.";
        echo '<a href="login.php">Click Here</a> to login you account.</h3>';
        exit;
    } 
?>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="form-signup">
    <div id="header"><h2 class="sansserif">Create an account</h2></div>
    <table>
    <tr>
    <td>First Name:</td>
    <td> <input type="text" name="firstname" size="20" placeholder="First name"></td>
    </tr>

    <tr>
    <td>Last Name:</td>
    <td> <input type="text" name="lastname" size="20" placeholder="Last name"></td>
    </tr>

    <tr>
    <td>Username:</td>
    <td> <input type="text" name="username" size="20" placeholder="User name"></td>
    </tr>

    <tr>
    <td>Password:</td>
    <td><input type="password" name="password" size="20" placeholder="Password"></td>
    </tr>
    <tr>
    <td>Email:</td>
    <td> <input type="text" name="email" size="20" placeholder="Email"></td>
    </tr>

    
   
    </table>
     <p><input type="submit" value="Sign Up" class="btn btn-large btn-primary"></p>
</form>

<?php include('inc/footer.php'); ?>