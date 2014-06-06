<?php 

$class = 'home';
session_start();

    
//var_dump($_SESSION);

    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        include('inc/header.php');
        echo "You are playing as ". $_SESSION['user'];
        $user = $_SESSION['user'];
        $user_id = $_SESSION['id'];
    ?>

    <?php 

        include("config.php"); 

        echo '<h3>Latest Scores</h3>';

        

        $query = "SELECT * FROM scores INNER JOIN games ON scores.game_id=games.id WHERE scores.user_id='".$user_id."' ORDER BY games.name;";

        $rs=$conn->query($query);
         
        if($rs === false) {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
          echo 'nope';
        } else {
          $rows_returned = $rs->num_rows;
        }
        echo '<div class="wrap games">';
        $i = 1;
        while($obj = $rs->fetch_object()) {
            if(($i+2) % 3 == 0) {
                echo '<div class="game fourcol columns first">';
            } elseif($i % 3 == 0) {
                echo '<div class="game fourcol columns last">';
            } else {
                echo '<div class="game fourcol columns">';
            }
            //var_dump($obj);
            
            echo '<h4>'.$obj->name.'</h4>';
            //echo '<p>'.$obj->description.'</p>';
            echo '<p>'.$obj->score.'</p>';
            //echo '<p>'.$obj->user_id.'</p>';
            //echo '<img src="'.$obj->image.'" alt="'.$obj->name.'" />';
            echo '</div>';
            $i++;
        }
        echo '</div>';

        


        // Free the resources associated with the result set
        // This is done automatically at the end of the script
        //mysql_free_result($result);

    ?>

    <?php 
        include('inc/footer.php');
        // if session user is not set, tell that mofo to log in
    } else {
        header("location:login.php");    
    }

?>