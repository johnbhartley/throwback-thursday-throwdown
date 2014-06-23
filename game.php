<?php 

$class = 'home';
//session_start();

//$game = $_GET['game_id'];

    
//var_dump($_SESSION);

    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        include('inc/header.php');
        //echo "You are playing as ". $_SESSION['user'];
        $user = $_SESSION['user'];
        $user_id = $_SESSION['id'];
    ?>

    <?php 

        include("config.php"); 

        echo '<h3>Latest Scores for '.$game.'</h3>';

        $query = "SELECT scores.*, games.*, users.*
                    FROM scores
                        JOIN games
                            ON games.id = scores.game_id
                        JOIN users
                            ON users.id = scores.user_id
                        
                    WHERE games.id = 2 ";

        //$query = "SELECT * FROM scores INNER JOIN games ON scores.game_id=games.id WHERE scores.game_id='".$game_id."' ORDER BY scores.score;";

        $rs = $conn->query($query);
         
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
    } 

?>