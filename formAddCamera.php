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

    <title>Add Camera</title>

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
                        <a href="http://localhost/pixelooks/formAddArticle.php">Article</a>
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
                <h2 align="center"><strong>Add Camera</strong></h2><hr><br>
					<?php	require 'Database.php';
							require 'camera.php';
							$database = new Database;
							$camera = new Camera;
							$database->query('SELECT * FROM photodb.camera ');
							$rows = $database->resultSet();
							//print_r($rows);
							$error=false;
							$errorMessage='';
							$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
							if(isset($_POST['delete']))
							{
								$delete_id= $_POST['delete_id'];
								$camera->erase($delete_id);
								
							}
							if(isset($_POST['edit']))
							{
								$edit_id= $_POST['edit_id'];
								
								
							}
							if($post['add'])//IF PRESS ADD
							{
								if (empty($post['productId']) || empty($post['productName'])||empty($post['brand'])||empty($post['valuePixel'])||empty($post['shutterSpeed'])||empty($post['resolution']))
								{//if empty
									$error = true;
									$errorMessage="You need to fill the forms completely";
								}
								else
								{
																			
									$productId = $post['productId'];
									$productName = $post['productName'];
									$brand = $post['brand'];
									$valuePixel = $post['valuePixel'];
									$shutterSpeed=$post['shutterSpeed'];
									$resolution=$post['resolution'];
									$camera->add($productId,$productName,$brand,$valuePixel,$shutterSpeed,$resolution);
								}
								
								
							}
					?>
               <form method="post" class="form-container" action="<?php $_SERVER['PHP_SELF'];?>">
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Camera ID</h4>
                            <input  name="productId" id="productId" autocomplete="off" type="text" class="form-control" placeholder="Enter product ID">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Camera Name</h4>
                            <input  autocomplete="off" name="productName" id="productName" type="text" class="form-control" placeholder="Enter product name">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Camera Brand</h4>
                            <input  autocomplete="off" name="brand" id="brand" type="text" class="form-control" placeholder="Enter camera brand">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Value Pixel</h4>
                            <input  autocomplete="off" name="valuePixel" name="valuePixel" type="text" class="form-control" placeholder="Enter value pixel">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Shutter Speed</h4>
                            <input  autocomplete="off" name="shutterSpeed" id="shutteSpeed"type="text" class="form-control" placeholder="Enter shutter speed">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <h4>Resolution</h4>
                            <input type="text" name="resolution" id="resolution" class="form-control" placeholder="Enter resolution">
                        </div>
                    </div>
                    <br>
                    
                    
                    
                    <!-- For success/fail messages -->
                    
                    <input name="add" id="add" type="submit" class="btn btn-default btn-primary center-block" value="Add Product"><br>
                    
                </form>
            </div>

        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        
        <!-- /.row -->
		<br>
        <hr>
		<div >
		<!-- To Show all record -->
			<table class="table table-bordered">
			<!-- The head -->
				<thead>
					<tr>
						<th>Product Id  </th>
						<th>Product Name   </th>
						<th>Brand    </th>
						<th>Value Pixel    </th>
						<th>Shutter Speed   </th>
						<th>Resolution</th>
						<th>Edit/Delete</th>
					</tr>
				</thead>
				<!-- The body -->
				
				 <tbody>
				 <?php foreach($rows as $row): ?>
					<tr>
							<td><?php echo $row['productId']?></td>
							<td><?php echo $row['productName']?></td>
							<td><?php echo $row['brand']?></td>
							<td><?php echo $row['valuePixel']?></td>
							<td><?php echo $row['shutterSpeed']?></td>
							<td><?php echo $row['resolution']?></td>
							<td>
								<form method="post" action="formEditCamera.php">
									<input type="hidden" name="edit_id" value="<?php echo $row['productId'];?>">
									<input class="btn btn-primary" type="submit" name="edit" value="Edit">
									
								</form><form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
									<input type="hidden" name="delete_id" value="<?php echo $row['productId'];?>">
									<input class="btn btn-primary" type="submit" name="delete" value="Delete">					
								</form>
							</td>
						<br/>						
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>

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
