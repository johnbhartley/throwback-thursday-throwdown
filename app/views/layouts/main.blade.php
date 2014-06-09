<!DOCTYPE html>
<html lang="en">
<head>
	<title>Throwback Thursday Throwdown</title>
    
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <link rel="stylesheet" href="/inc/css/style.css" type="text/css" />

</head>

<body>

<!-- <div class="logged-in">Logged in as ericnkatz</div> -->

@section('navigation')
	<div class="wrap">
		<ul class="menu">
			<li><a href="/">Home</a></li>
			<li><a href="/register">Register</a></li>
			<li><a href="/login">Login</a></li>		
		</ul>
	</div>
@show


<div id="container" class="wrap home">
	@yield('content')

<!--
    <h3>Latest Scores</h3>
    <div class="wrap games">
    	<div class="game fourcol columns first">
    		<h4>Kung Fu</h4>
    		<p>7200</p>
    	</div>
    </div>
-->

</div>

<sript src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>