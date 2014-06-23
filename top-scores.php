<?php 

$class = 'home';
$game_id = $_GET['game'];

        include('inc/header.php');
        include("config.php"); 

        echo '<h3>Latest Scores</h3>';

        

        $query = "SELECT * FROM scores 
                    INNER JOIN games 
                        ON scores.game_id=games.id 
                    INNER JOIN users 
                        ON scores.user_id=users.id
                        WHERE scores.game_id=".$game_id." ORDER BY scores.score DESC;";

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
            
            echo '<h4>'.$obj->username.'</h4> <p>'.$obj->score.'</p>';
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

?>