<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Admin CSS -->
    <link href="css/admin.css" rel="stylesheet" type="text/css">
<?php
 //start session
session_start();
	
?>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" >Pixelooks</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                  
					<li>
                        <a href="http://localhost/pixelooks/registerAdmin.php">Register</a>
                    </li>
					
                 </ul>
                  
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    

        <!-- Content Row -->
        <div class="container-fluid bg img-center img-responsive">
        	<div class="row">
        		<div class="col-md-4 col-sm4 col-xs-12"></div>
        		<div class="col-md-4 col-sm4 col-xs-12">
        			<!-- FORM START -->
					
					<?php	
					//include Database object and Admin object
							require 'Database.php';
							require 'Admin.php';
							$database = new Database;
							$admin = new AdminModel;
							$database->query('SELECT * FROM photodb.admin ');
							$rows = $database->resultSet();
							//print_r($rows);
							$error=false;
							$errorMessage='';
							$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
							if($post['loginAdmin'])
							{
								if (empty($post['username']) || empty($post['password']))
								{//if empty
									$error = true;
									$errorMessage="Invalid username or password";
								}
								else{
								
									$username = $post['username'];
									$password = md5($post['password']);
									$admin->login($username,$password);
								}		
							}
							
					?>
        			<form method="post" class="form-container" action="<?php $_SERVER['PHP_SELF'];?>">
        			<h3 align="center">Pixel&#8734;ks Login Admin</h3><br>
        				<div class="form-group">
        					<h4>Username</h4>
        					<input type="text"  autocomplete="off" name="username" class="form-control fa-border" id="username" placeholder="Enter your username">
        				</div>
        				<div class="form-group">
        					<h4>Password</h4>
        					<input type="password"  autocomplete="off" name="password" class="form-control" id="password" placeholder="Enter your password">
        				</div><br>
						
        				<input type="submit" name="loginAdmin" id="loginAdmin"  class="btn btn-primary" value="Log In"><h4></h4></button><br>
						<?php if ($error==true)
						{?>
							<div class="alert alert-danger alert-dismissable">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
							<strong id="warn" > <?php echo $errorMessage ; ?></strong>
							</div>
						<?php 
						} ?>
        			</form>
        			<!-- FORM END -->
        		</div>
        		<div class="col-md-4 col-sm4 col-xs-12"></div>
        	</div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        
        <!-- /.row -->
		

        <!-- Footer -->
        

    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



</body>

</html>
