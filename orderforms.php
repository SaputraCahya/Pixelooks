<!DOCTYPE html>

<?php
session_start();
$sessId=session_id();
	require 'Database.php';
	require  'Camera.php';
	require 'Photo.php';
	require 'Lens.php';
	require 'order.php';
	require 'Receiver.php';
	$order= new Order;
	$receiver = new Receiver;
	$lens = new Lens;
	$photo= new Photo;
	$camera = new Camera;
	$database = new Database;
	$database->query('SELECT * FROM photodb.camera ');
	$database->query('SELECT * FROM photodb.lens ');
	$database->query('SELECT * FROM photodb.photo ');
	$rows = $database->resultSet();	



	
//actions for buttons
if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
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
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
			echo '<script>window.location="orderforms.php"</script>'; 
      }  
 } 
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
					$order->deleteCart($values['item_id']);
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="orderforms.php"</script>';  
                }  
           }  
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

    <title>Order</title>

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
                <a class="navbar-brand" href="index.html" >Pixelooks</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">About</a>
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
                    <li class="active">Order</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3> 
			<form method="get">  				
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
						 
						  
						  //retrive data in shopping cart
                          if(!empty(isset($_SESSION["shopping_cart"])))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               { 
								
									
									
										
									
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?> </td> 
                               <td>IDR <?php echo $values["item_price"]; ?></td>  
							   <?php $subtotalinit=($values["item_quantity"] * $values["item_price"]) ?>
                               <td>IDR <?php echo number_format($subtotalinit, 2); ?></td> 
							   <?php
								$qty=$values['item_quantity'];
								$id=$values['item_id'];
								$order->insertCart($sessId,$qty,$id);
								?>
                               <td><a href="orderforms.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  	$subtotal=0;
									$subtotal=$subtotal+$subtotalinit;
                                    $total = $total + $subtotal;  ?>
									<tr> 
						
                          </tr> 
						  <?php
                               }  
                          ?>  
									<td colspan="3" align="right">Total</td>  
									<td align="right">IDR <?php echo number_format($total, 2); ?></td>  
									<td></td> 
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
		   </form>
        <hr>
        <!-- E N D CIRCLE -->
        <h2 class="text-center">Order Product<small> Pixelooks</small></h2>
        <hr>
        <br>
		<form method="post" class="form-container" action="<?php $_SERVER['PHP_SELF'];?>">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
            	<div class="control-group form-group">
                   <div class="controls">
                      <label>Full Name</label>
                      <input name="receiverName" id="receiverName" type="text" class="form-control" placeholder="Enter your full name">
                      <p class="help-block"></p>
                   </div>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="control-group form-group">
                   <div class="controls">
                      <label>Phone Number</label>
                      <input name="phoneNumber" id="phoneNumber" type="tel" class="form-control" placeholder="Enter your phone number">
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
        				<label>Email Address</label>
        				<input name="emailReceiver" id="emailReceiver" type="text" class="form-control" placeholder="Enter your email address">
        			</div>
        		</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-2"></div>
        	<div class="col-md-8">
        		<div class="control-group form-group">
        			<div class="controls">
        				<label>Address</label>
        				<input name="addressReceiver" id="addressReceiver" type="text" class="form-control" placeholder="Enter your address">
        			</div>
        		</div>
        	</div>
        </div>
		 <div class="row">
        	<div class="col-md-2"></div>
        	<div class="col-md-8">
        		<div class="control-group form-group">
        			<div class="controls">
        				<label>Postal Code</label>
        				<input name="postalCode" id="postalCode" type="text" class="form-control" placeholder="Enter your postal code">
        			</div>
        		</div>
        	</div>
        </div>
		<div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
            	<div class="control-group form-group">
                   <div class="controls">
                      <label>Province</label>
                      <input name="province" id="province" type="text" class="form-control" placeholder="">
                      <p class="help-block"></p>
                   </div>
                </div>
            </div>    
        </div>
		</div>     
        <div class="row">
        	<div class="col-md-2"></div>
				<div class="col-md-5"></div>
					<div class="col-md-2">
					<form method="post" action="orderforms.php?action=edit&id=<?php echo $row["receiverId"]; ?>">
								
						<input type="hidden" name="edit_id" value="<?php echo $row['receiverId'];?>">
						<input name="submit" id="submit" class="btn btn-default btn-primary center-block" type="submit" class="form-control" value="Order Now">
					</form>
					</div>
        		</div>
        	</div>
        </div>
		</form>
		<?php
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		if($post['submit'])
		{
			
			$receiverName = $post['receiverName'];
			$address = $post['addressReceiver'];			
			$phone = $post['phoneNumber'];
			$province = $post['province'];
			$email = $post['emailReceiver'];
			$postalCode=$post['postalCode'];
			
			
			$receiver->add($receiverName,$address,$phone,$province,$email,$postalCode,$sessId);
			
			$receiver->getId($receiverName); 
			$database5 = new Database;
			$database5->query("SELECT * FROM photodb.receiver WHERE receiverName = :receiverName");
			$database5->bind(':receiverName',$receiverName);
			$database5->execute();
			$row=$database->single();	
			echo '<script>window.location.orderforms.php"</script>'; 
		?>
		
        <hr>
        <br>
		<div style="clear:both"></div>
		<h2 class="text-center">Receiver Info<small> Pixelooks</small></h2>
		<form method="post" >
		
        <div class="row">
           
            <div class="col-md-12" align="center">
            	<div class="control-group form-group">
                   <div class="controls">
                      <p>Dear <h2><?php echo $receiverName;?></h2> </p>				 
					  <p>Your address : </p>	
					  <h2><?php echo $address ;?>
					  <?php echo $province ;?></h2>
					  <p>Your phone number : </p>
					  <?php echo $phone ;?>
                   </div>
                </div>
            </div>
		</div>
			
	
		<div class="row">
      
            <div class="col-md-6" align="center">
            	<div class="control-group form-group">
                   <div class="controls">
                     <a href="editorder.php" align="center" class="btn btn-info" role="button">Edit Order</a>
                   </div>
                </div>
            </div>
            <div class="col-md-6" align="center">
            	<div class="control-group form-group">
                   <div class="controls">
                     <a href="checkout.php"  class="btn btn-info" role="button">Check Out</a>
                   </div>
                </div>
            </div>
        </div>	
		
		</div>
		<?php
			
		
		}
		
		?>
		
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
       
        <!-- /.row -->
		
		
        
		
		
     

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