<!DOCTYPE html>
<?php
session_start();
$sessId=session_id();
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'      =>     $_GET["id"],  
                     'item_name'     =>     $_POST["hidden_name"],  
                     'item_price'     =>     $_POST["hidden_price"],  
                     'item_quantity'    =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
				 echo '<script>window.location="orderforms.php"</script>'; 
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="orderforms.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'       =>     $_GET["id"],  
                'item_name'       =>     $_POST["hidden_name"],  
                'item_price'        =>     $_POST["hidden_price"],  
                'item_quantity'       =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
			echo '<script>window.location="orderforms.php"</script>'; 
      }  
 }  
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Camera</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="index.php" >Pixelooks</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="photo-list.php">Photo</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown" data-toggle="dropdown" href="#">Product<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        	<li><a href="camera-list.php">Camera</a></li>
                        	<li><a href="lens-list.php">Lens</a></li>
                        	<li><a href="servicefull.php">Service</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="articlehome.php">Article</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown" data-toggle="dropdown" href="#">Order<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        	<li><a href="orderforms.php">Order Product</a></li>
                        	<li><a href="paymentconfirmation.php">Payment Confirmation</a></li>
                        	
                        </ul>
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
                <h1 class="page-header">Product
                    <small>Pixelooks</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Camera</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- CIRCLE CONTENT SECTION -->
        <hr>
        <div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  <div class="row">
			  	<a href="photo-list.php">
				<div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Free Shipping" src="img/icon/icon1.jpg"></div>
				<div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
				  <h4>Photos</h4>
				</div>
				</a>
			  </div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  <div class="row">
			  	<a href="camera-list.php">
				<div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Free Shipping" src="img/icon/icon2.jpg"></div>
				<div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
				  <h4>Cameras</h4>
				</div>
				</a>
			  </div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  <div class="row">
			  	<a href="lens-list.php">
				<div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Free Shipping" src="img/icon/icon3.jpg"></div>
				<div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
				  <h4>Lensa</h4>
				</div>
				</a>
			  </div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  <div class="row">
			  	<a href="servicefull.php">
				<div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Free Shipping" src="img/icon/icon4.jpg"></div>
				<div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
				  <h4>Service</h4>
				</div>
				</a>
			  </div>
			</div>
		  </div>
       <hr>
        <!-- E N D CIRCLE -->
        <h2 class="text-center">Camera <small>Pixelooks</small></h2>
        <hr>

        <!-- S T A R T		Table Content -->
        <div class="container">
		  <div class="row text-center">
			
<?php
	require 'Database.php';
	require  'Camera.php';
	$camera = new Camera;
	$database = new Database;
	$database->query('SELECT * FROM photodb.camera ');
	$rows = $database->resultSet();


?>		  
		  <!-- Section 2 Table -->
		  <?php foreach($rows as $row): ?>
		   <form method="post" action="orderforms.php?action=add&id=<?php echo $row["productId"]; ?>">  
                <div class="col-sm-6 col-md-3 col-lg-3 col-xs-12">
					<div class="thumbnail"> <img src="<?php echo $row['fileName'];?>" alt="Thumbnail Image 1" class="img-responsive"/>
                        <div class="caption">
							<h4><?php echo $row["productName"]; ?></h4>
							    <p>IDR <?php echo $row["price"]; ?></p>
									<input type="text" name="quantity" class="form-control" value="1" />  
									<input type="hidden" name="hidden_name" value="<?php echo $row["productName"]; ?>" />  
									<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
									<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                         </div>
					</div>
				</div>
          </form>
		<?php endforeach; ?>		  
		  </div>
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



</body>

</html>