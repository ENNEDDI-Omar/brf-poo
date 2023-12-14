<?php
require __DIR__ .'/../../controller/auth/login.php';

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
  <link rel="stylesheet" href="../../assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
:<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">

					<form action="../../controller/auth/login.php" method="post">
					<label for="chk" aria-hidden="true">Log In</label>
					<input type="email" name="Email" placeholder="Email" required="">
					<input type="password" name="Password" placeholder="Password" required="">
					<button type="submit" name="submit-in" >Log In</button>
				</form>
			</div>

		
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
