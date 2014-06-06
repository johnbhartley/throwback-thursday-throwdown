<?php
session_start();
    include("inc/header.php"); 
    include("config.php"); 
    //including config.php in our file

    if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['image'])){
        // Now checking user name and password is entered or not.
        $name= mysqli_real_escape_string($conn, $_POST['name']);
        $description= mysqli_real_escape_string($conn, $_POST['description']);
        $image = mysqli_real_escape_string($conn,$_POST['image']);
        
        


        $query = "INSERT INTO games (name,description,image) VALUES ('".$name."','".$description."','".$image."');";

        // Now inserting record in database.
        //$query = "INSERT INTO users (username,password,firstname,lastname) VALUES ('".$username."','".$password."','".$first_name."','".$last_name."');";
        $rs=$conn->query($query);
        if($rs === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        } else {
          $rows_returned = $rs->num_rows;
        }
        
        echo "Thank You for adding".$name;
        echo '<a href="login.php">Click Here</a> to login you account.';
        exit;
    } 
?>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="form-signup">
    <div id="header"><h2 class="sansserif">Add A Game</h2></div>
   <p>Game Name:<br />
    <input type="text" name="name" size="20" placeholder="Donkey Kong"></p>
    <p>Game Description:<br />
    <textarea name="description" placeholder="Barrels on barrels"></textarea></p>

    <p>Image URL:<br /><input type="text" name="image" size="20" placeholder="http://image"></p>

    

    
    <input type="submit" value="Sign Up" class="btn btn-large btn-primary">

    <
</form>

<?php include('inc/footer.php'); ?>