<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Order Confirmation</title>

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
                <h1 class="page-header">Order
                    <small>Pixelooks</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li><a href="orderforms.php">Order</a></li>
                    <li><a href="confirmationorder.php">Order Confirmation</a></li>
                    <li><a href="selectpaymentFix.php">Select Payment</a></li>
                    <li class="active">Confirmation Order</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        
        <!-- /.row -->

        <!-- Content Row -->
        <hr>
        <!-- E N D CIRCLE -->
        <h2 class="text-center">Payment Confirmation<small> Pixelooks</small></h2>
        <hr>
        <br>
        <div class="row">
        	<div class="col-md-2"></div>
        	<div class="col-md-8">
        		<div class="control-group form-group">
        			<div class="controls">
        				<label>Name of Bank Account</label>
        				<input type="text" class="form-control" placeholder="Enter your bank account name">
        			</div>
        		</div>
        	</div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
            	<div class="control-group form-group">
        			<div class="controls">
        				<label>Choose Your Bank</label>
        				<select class="form-control" id="sell">
        					<option>--Bank Options--</option>
        					<option>BRI</option>
        					<option>BCA</option>
        					<option>Mandiri</option>
        					<option>BNI</option>
        				</select>
        			</div>
        		</div>
            </div>
            <div class="col-md-4">
            	<div class="control-group form-group">
                   <div class="controls">
                      <label>Payment ID</label>
                      <input type="tel" class="form-control" placeholder="Enter your payment ID">
                      <p class="help-block"></p>
                   </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2"></div>
        	<div class="col-md-8">
        		<div class="control-group form-group">
        			<div class="controls">
        				<label>Bank Account Number</label>
        				<input type="text" class="form-control" placeholder="Enter your bank account number">
        			</div>
        		</div>
        	</div>
        </div>
        <!-- percobaan -->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5">
            	<div class="control-group form-group">
        			<div class="controls">
                      <label>File Name</label>
                      <input type="tel" class="form-control" placeholder="Enter your file name">
                      <p class="help-block"></p>
                   </div>
        		</div>
            </div>
            <div class="col-md-3">
            	<div class="control-group form-group">
                   <div class="controls">
        				<label>Evidence of Transfer</label>
        				<form action="/action_page.php">
							<input type="file" name="img" multiple>
						</form>
        			</div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-2"></div>
        	<div class="col-md-8">
        		<div class="control-group form-group">
        			<div class="controls">
        				<label>Your Command</label>
        				<textarea rows="10" cols="100" class="form-control" id="message" maxlength="999" style="resize:none" placeholder="Enter your command here"></textarea>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="row" align="center">
        	<div class="col-md-12">
        		<br>
        		<p><a href="#" class="btn btn-primary" role="button"> Confirmation Your Payment</a> </p>
        	</div>
			</div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
       
        <!-- /.row -->

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



</body>

</html>