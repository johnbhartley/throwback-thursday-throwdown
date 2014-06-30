<?php 

$class = 'home';
session_start();

    
//var_dump($_SESSION);

    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        include('inc/header.php');
        //echo "You are playing as ". $_SESSION['user'];
        $user = $_SESSION['user'];
        $user_id = $_SESSION['id'];
    ?>

    <?php 

        include("config.php"); 

        echo '<h3 class="text-center">Top Scores of The Week</h3>';

        

        $query = "SELECT * FROM scores 
                    INNER JOIN games 
                        ON scores.game_id=games.id 
                    INNER JOIN users 
                        ON scores.user_id=users.id
                        WHERE scores.game_id=7 ORDER BY scores.score DESC;";

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
            
            echo '<div class="game twelvecol columns text-center first">';
           
            //var_dump($obj);
            if($i === 1) {
                 echo '<h2>'.$obj->username.'</h2> <h4>'.$obj->score.'</h4>';
            } else {
                echo '<h4>'.$obj->username.'</h4> <p>'.$obj->score.'</p>';
            }
           
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