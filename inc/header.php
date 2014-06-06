<?php 

$prefix = ''; 
session_start();

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    
    <title>Untitled Document</title>
    
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <link rel="stylesheet" href="<?php echo $prefix; ?>/inc/css/style.css" type="text/css" />

</head>

<body>
<?php if($_SESSION) {
	echo '<div class="logged-in">Logged in as '.$_SESSION['user'].'</div>';
} ?>

<div class="wrap">
	<ul class="menu">
		<li><a href="<?php echo $prefix; ?>/">Home</a></li>
		<?php
			if($_SESSION['user'] === 'john') {
				echo '<li><a href="'.$prefix.'/add-game.php">Add A Game</a></li>';
			}
		?>
		
		
		<?php if(!$_SESSION) {
			echo '<li><a href="'.$prefix.'/signup.php">Register</a></li>';
			echo '<li><a href="'.$prefix.'/login.php">Login</a></li>';
		} else {
			echo '<li><a href="'.$prefix.'/report-score.php">Report Score</a></li>';
			echo '<li><a href="'.$prefix.'/logout.php">Logout</a></li>';
		} ?>
		
	</ul>
</div>
<div id="container" class="wrap <?php echo $class; ?>">

