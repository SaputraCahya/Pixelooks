<!DOCTYPE html>
<?php
//start session


session_start();
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Camera</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- SCRIPT -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
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
                <a class="navbar-brand" href="index.html" >Pixelooks Admin</a>
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
                        <a href="http://localhost/pixelooks/formAddPhoto.php">Photo</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown" data-toggle="dropdown" href="#">Product<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        	<li><a href="http://localhost/pixelooks/formAddCamera.php">Camera</a></li>
                        	<li><a href="http://localhost/pixelooks/formAddLens.php">Lens</a></li>
                        	<li><a href="http://localhost/pixelooks/formAddService.php">Service</a></li>
                        </ul>
                    </li>
                    <li>
                         <a href="http://localhost/pixelooks/articlehome.php">Article</a>
                    </li>
					<li>
                        <a href="http://localhost/pixelooks/logout.php">Log Out</a>
                    </li>
                 </ul>
                  
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
			<?php
				if(isset($_SESSION['is_logged_in'])){


			?>
				<h2>Welcome, <?php echo $_SESSION['user_data']['adminName']?></h2>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
           <div class="col-lg-4"></div>
            <div class="col-md-4">
               <hr>
                <h2 align="center"><strong>Edit Photo</strong></h2><hr><br>
					<?php	require 'Database.php';
							require 'service.php';
							$database = new Database;
							$service = new Service;
							$database->query('SELECT * FROM photodb.service ');
							$rows = $database->resultSet();
							//print_r($rows);
							
							$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
							
							$id=$post['edit_id'];
							
							$current_id=$service->getProductId($id);
							$current_name=$service->getProductName($id);
							$current_price=$service->getPrice($id);
							$current_days=$service->getDays($id);
							$current_photo=$service->getNoOfImages($id);
							$current_edit=$service->getEditPhoto($id);
							$current_mu=$service->getFreeMakeUp($id);
							
							
							if(isset($_GET['edit']))
							{
								$current_id=$_GET['edit_id'];
								$productName = $_GET['productName'];
								$price = $_GET['price'];
								$days= $_GET['days'];
								$noOfImages = $_GET['noOfImages'];
								$editPhoto	= $_GET['editPhoto'];
								$freeMakeUp = $_GET['freeMakeUp'];
								$service->edit($current_id,$productName,$price,$days,$noOfImages,$editPhoto,$freeMakeUp);
							}
							
							
							
					?>
               <form method="get" class="form-container" action="<?php $_SERVER['PHP_SELF'];?>">
            
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Service Id</h4>
							<input type="hidden" name="edit_id" value="<?php echo $current_id;?>">
							 <p><?php echo $current_id;?></p>
                        </div>
                    </div>
					 <div class="control-group form-group">
                        <div class="controls">
                            <h4>Service Name</h4>
                            <input  autocomplete="off" name="productName" id="productName" type="text" class="form-control" placeholder="<?php echo $current_name; ?>">
                        </div>
                    </div>
					<div class="control-group form-group">
                        <div class="controls">
                            <h4>Price</h4>
                            <input  autocomplete="off" name="price" id="price" type="text" class="form-control" placeholder="<?php echo $current_price; ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Service Days</h4>
                            <input  autocomplete="off" name="days" id="days" type="text" class="form-control" placeholder="<?php echo $current_days; ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Number of Photo</h4>
                            <input  autocomplete="off" name="noOfImages" id="noOfImages" type="text" class="form-control" placeholder="<?php echo $current_photo; ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Number Edit Photo</h4>
                            <input  autocomplete="off" name="editPhoto" id="editPhoto" type="text" class="form-control" placeholder="<?php echo $current_edit; ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Number Free Make Up</h4>
                            <input type="text" name="freeMakeUp" id="freeMakeUp" class="form-control" placeholder="<?php echo $current_mu; ?>">
                        </div>
                    </div>
                    <br>
                    
 
                    <div class="form-group">
							<input type="submit" name="edit" class="btn btn-success btn-lg btn=block" value="Go Edit">
					</div>
                    
                    
                    <!-- For success/fail messages -->
                    
                   
                    
                </form>
            </div>

        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        
        <!-- /.row -->
		<br>
        <hr>
		

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p align="center">Copyright &copy; Pixelooks</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


<?php
}
?>
</body>

</html>
