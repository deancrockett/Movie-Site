<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Cinema Archives DataBase</title>
	<link rel="stylesheet" href="/app.css">
	<script src="/app.js"></script>
	<script>require('initialize');</script>
	<!-- Bootstrap Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Slick slideshow plugin -->
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<!-- Fonts by Google -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body id="page" class="index">

	<!-- <script>require('initialize');</script> -->

    <div id="popup" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>You're pushing my buttons.</p>
        </div>
    </div>


    <script>
        var modal= document.getElementById('popup');
        var btn= document.getElementById('start');
        var span= document.getElementsByClassName('close')[0];

        btn.onclick= function() {
            modal.style.display = "block";
        }

        span.onclick= function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
	      </button>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <div class="navbar-left">
			<form id="searchbar" role="form" alt="Search form" label="search" action='./search.php' method='get'>
				<input id="txtSearch" type="search" placeholder="Search..." alt="Search form" role="searchbox">
			</form>
	      </div>
	      <?php

	      	$email = $password = "";

	      	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  				$email = test_input($_POST["user-email"]);
  				$password = test_input($_POST['user-pass']);
			}
			function test_input($data) {
 	 			$data = trim($data);
  				$data = stripslashes($data);
  				$data = htmlspecialchars($data);
  				return $data;
			}

	      ?>
	      <div class='col-md-6 col-xs-12' id="login">
				<form class="form-inline" method='get'>
					<div class="form-group loginbox">
    					<label class="sr-only" for="user-email">Email address</label>
    					<input type="email" class="form-control" id="user-email" placeholder="Email">
  					</div>
  					<div class="form-group">
    					<label class="sr-only" for="user-pass">Password</label>
    					<input type="password" class="form-control" id="user-pass" placeholder="Password">
  					</div>
  					<button type="submit" class="btn btn-default">Sign in</button>
				</form>
			</div>

			<?php

			?>
	      <div class="navbar-right greeting">
			<h4 id="greeting">Hello, Jacob</h4>
	      </div>
	    </div>
	  </div>

	<div class="row">
	    <div class="col-md-12">
			<div class="splash">
				<img class="banner" src="Imgs/header.png">
			</div>
	    </div>
	</div>



	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h1>Popular Movies</h1>
				<div class="row">
					<div class="slideshow">
					    <div><img data-lazy="Imgs/goodfellas.jpg"></div>
					    <div><img data-lazy="Imgs/inception.jpg"></div>
					    <div><img data-lazy="Imgs/12angrymen.jpg"></div>
					    <div><img data-lazy="Imgs/forrestgump.jpg"></div>
					    <div><img data-lazy="Imgs/thedarkknight.jpg"></div>
					    <div><img data-lazy="Imgs/fightclub.jpg"></div>
					    <div><img data-lazy="Imgs/pulpfiction.jpg"></div>
					    <div><img data-lazy="Imgs/shawshank.jpg"></div>
					    <div><img data-lazy="Imgs/thegodfather.jpg"></div>
					</div>
				</div>

				
				<div class="row">
					<table class="table">
					    <thead>
					      <tr>
					        <th><h1>You May Like</h1></th>
					        <th>Title</th>
					        <th>Rating</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td><img src="Imgs/fightclub.jpg"></td>
					        <td>Fight Club</td>
					        <td>96%</td>
					      </tr>
					      <tr>
					        <td><img src="Imgs/shawshank.jpg"></td>
					        <td>The Shawshank Redemption</td>
					        <td>87%</td>
					      </tr>
					      <tr>
					        <td><img src="Imgs/pulpfiction.jpg"></td>
					        <td>Pulp Fiction</td>
					        <td>81%</td>
					      </tr>
					    </tbody>
					</table>
				</div>
			</div>
			<div class="col-md-3">
				<h3>Your Watch List</h3>
				<table class="table">
				    <thead>
				      <tr>
				        <th>Title</th>
				        <th></th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td>Fight Club</td>
				        <td></td>
				      </tr>
				      <tr>
				        <td>The Shawshank Redemption</td>
				        <td></td>
				      </tr>
				      <tr>
				        <td>Pulp Fiction</td>
				        <td></td>
				      </tr>
				    </tbody>
				</table>
			</div>
		</div>
 	</div>





	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.slideshow').slick({
				lazyLoad:'ondemand',
				infinite: true,
				speed: 300,
				slidesToShow: 4,
				slidesToScroll: 4,
				responsive: [
				{
				  breakpoint: 1024,
				  settings: {
				    slidesToShow: 3,
				    slidesToScroll: 3,
				  }
				},
				{
				  breakpoint: 600,
				  settings: {
				    slidesToShow: 2,
				    slidesToScroll: 2
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
				    slidesToShow: 1,
				    slidesToScroll: 1
				  }
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
				]
			});
		});
	</script>

</body>
</html>

