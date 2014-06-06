<?php
    session_start();
    
    $user = $_SESSION['user'];


    include("inc/header.php"); 
    include("config.php"); 
    //including config.php in our file

    

    if(!empty($_POST['game_id']) && !empty($_POST['score'])){
        // Now checking user name and password is entered or not.
        $game_id= mysqli_real_escape_string($conn, $_POST['game_id']);
        $user_id= $_SESSION['id'];
        $score = mysqli_real_escape_string($conn, $_POST['score']);
        $date = date('Y-m-d');
        
        


        $query = "INSERT INTO scores (game_id,user_id,score,date_added) VALUES ('".$game_id."','".$user_id."','".$score."','".$date."');";

        // Now inserting record in database.
        //$query = "INSERT INTO users (username,password,firstname,lastname) VALUES ('".$username."','".$password."','".$first_name."','".$last_name."');";
        $rs=$conn->query($query);
        if($rs === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        } else {
          $rows_returned = $rs->num_rows;
        }
        
        echo "<h3 class='text-center'>Thank You for adding your score.<br />";
        echo '<a href="/">Click Here</a> to head back to home base.</h3>';
        exit;
    } 
?>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="form-signup">
    <div id="header"><h2 class="sansserif">Add Your Score</h2></div>
    <p>Game Name:<br />
    <select name="game_id">
            <?php 
                $query = "SELECT * FROM games;";

                $rs=$conn->query($query);
                 
                if($rs === false) {
                  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
                  echo 'nope';
                } else {
                  $rows_returned = $rs->num_rows;
                }
                //echo '<div class="wrap games">';
                while($obj = $rs->fetch_object()) {
                    echo '<option value='.$obj->id.'">'.$obj->name.'</option>';
                }
                //echo '</div>';
            ?>
    </select>
</p>


        
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
        
    


    <p>Score:<br />
    <input type="text" name="score" size="20" placeholder="120380"></p>

    

    
   <input type="submit" value="Add Score" class="btn btn-large btn-primary">

   
</form>

<?php include('inc/footer.php'); ?>