<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Success</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link href="<?php echo base_url()?>assets/css/success/success.css" rel="stylesheet">  
</head>
<body>
	<div class="container">
		<h1>Success </h1>
<hr>
		<div class="row">
			<ul>
				<li>
					<a href="<?php echo base_url()?>index.php/<?php echo $path_redirect ?>"><?php echo $message ?></a>
				</li>
				<!-- <li>
					<a href="<?php echo base_url()?>index.php/home">Home Page</a></li>
				</li> -->
				<!-- <li>
					<a href="<?php echo base_url()?>index.php/register">Student Registration</a></li>
				</li> -->
			</ul>

		</div>
	</div>
</body>
</html>