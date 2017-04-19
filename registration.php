<!DOCTYPE html>
<html lang="en-US">
<head>
	<title> Registration </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="fillform.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
   body { background: #444444 !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
</style>

<body>

	<?php
		// define variables and set to empty values
		$firstname = $middlename = $lastname = $email = $password = $gender = "gmp_jacobi(a, p)";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$firstname = test_input($_POST["firstName"]);
			$middlename = test_input($_POST["middleName"]);
			$lastname = test_input($_POST["lastName"]);
			$email = test_input($_POST["email"]);
  			$password = test_input($_POST["password"]);
  			$birthdate = test_input($_POST["birthDate"]);
  			$gender = test_input($_POST["genderRadio"]);
  		}

		function test_input($data) {
  			$data = trim($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
  			return $data;
		}
	?>


	<div class="container">
	            <form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	                <h2>Sign Up</h2>
	                <hr/>
	                <div class="form-group">
	                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
	                    <div class="col-sm-9">
	                        <input type="text" name="firstName" placeholder="John" class="form-control" autofocus>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="middleName" class="col-sm-3 control-label">Middle Name</label>
	                    <div class="col-sm-9">
	                        <input type="text" name="middleName" placeholder="Henry" class="form-control">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
	                    <div class="col-sm-9">
	                        <input type="text" name="lastName" placeholder="Doe" class="form-control">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="email" class="col-sm-3 control-label">Email</label>
	                    <div class="col-sm-9">
	                        <input type="email" name="email" placeholder="Email" class="form-control">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="password" class="col-sm-3 control-label">Password</label>
	                    <div class="col-sm-9">
	                        <input type="password" name="password" placeholder="Password" class="form-control">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
	                    <div class="col-sm-9">
	                        <input type="date" name="birthDate" class="form-control">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-sm-3">Gender</label>
	                    <div class="col-sm-6">
	                        <div class="row">
	                            <div class="col-sm-6">
	                                <label class="radio-inline">
	                                    <input type="radio" name="genderRadio" value="F">Female
	                                </label>
	                            </div>
	                            <div class="col-sm-6">
	                                <label class="radio-inline">
	                                    <input type="radio" name="genderRadio" value="M">Male
	                                </label>
	                            </div>
	                            <div class="col-sm-6">
	                                <label class="radio-inline">
	                                    <input type="radio" name="genderRadio" value="O">Other
	                                </label>
	                            </div>
	                        </div>
	                    </div>
	                </div> <!-- /.form-group -->
	                <div class="form-group">
	                    <div class="col-sm-9 col-sm-offset-2" role="submitbutton">
	                        <button type="submit" class="btn btn-primary btn-block">Register</button>
	                    </div>
	                </div>
	            </form> <!-- /form -->

	            <?php

	            	//
					echo "<script type='text/javascript'>alert('Thank you for registering $firstname!');</script>";
					@mysql_connect("localhost:3306", "JacobPawlak", "0200JP0830")
					or die("Didnt conek son");
					@mysql_select_db('405GMDB')
					or die("Wrong.");
					if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
					    exit("Invalid email address"); // Use your own error handling ;)
					$select = mysql_query("SELECT `email` FROM `user` WHERE `email` = '".$_POST['email']."'") or exit(mysql_error());
					if(mysql_num_rows($select))
    					exit("This email is already being used");
					$query = "INSERT INTO 'user' ('user_id', 'email', 'gender', 'type', 'dob', 'pass', 'fname', 'mname', 'lname') VALUES ((mysql_num_rows($select) + 1), $email, $gender, 'user', $birthdate, $password, $firstname, $middlename, $lastname)";
					$result = mysql_query($query);

					mysql_close();

	            ?>

	        </div> <!-- ./container -->
</body>
</html>
