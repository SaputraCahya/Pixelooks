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

    <title>Cart List</title>

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
                        <a href="http://localhost/pixelooks/cartList.php">Cart</a>
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
			<?php
			require 'Database.php';
			require 'order.php';
			$database = new Database;
			$database2 = new Database;
			$database3 = new Database;
			
			
			$database->query('SELECT * FROM photodb.cart,photodb.camera WHERE photodb.cart.productId=photodb.camera.productId');
			$database->execute();
			$rows=$database->resultSet();
			
			$database2->query('SELECT * FROM photodb.cart,photodb.photo WHERE photodb.cart.productId=photodb.photo.productId');
			$database2->execute();
			$records=$database2->resultSet();
			$database3->query('SELECT * FROM photodb.cart,photodb.lens WHERE photodb.cart.productId=photodb.lens.productId');
			$database3->execute();
			$records2=$database3->resultSet();
			
			?>
			<!-- The head -->
				<thead>
					<tr>
						<th>SessionId  </th>
						<th>Quantity   </th>
						<th>Product Id  </th>
						<th>Product Name    </th>
						
					</tr>
				</thead>
				<!-- The body -->
				
				 <tbody>
				 <?php foreach($rows as $row): ?>
					<tr>
							<td><?php echo $row['sessionId']?></td>
							<td><?php echo $row['qty']?></td>
							<td><?php echo $row['productId']?></td>
							<td><?php echo $row['productName']?></td>
							
							
						<br/>						
					</tr>
				<?php endforeach; ?>
				<?php foreach($records as $record): ?>
					<tr>
							<td><?php echo $record['sessionId']?></td>
							<td><?php echo $record['qty']?></td>
							<td><?php echo $record['productId']?></td>
							<td><?php echo $record['productName']?></td>
							
							
						<br/>						
					</tr>
				<?php endforeach; ?>
				<?php foreach($records2 as $row): ?>
					<tr>
							<td><?php echo $row['sessionId']?></td>
							<td><?php echo $row['qty']?></td>
							<td><?php echo $row['productId']?></td>
							<td><?php echo $row['productName']?></td>
							
							
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
