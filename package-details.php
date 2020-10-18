<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Package Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">

<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		 new WOW().init();
	</script>
<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
					</script>
	  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>				
</head>
<body>

<?php include('includes/header.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> TMS -Package Details</h1>
	</div>
</div>

<div class="selectroom">
	<div class="container">	
		  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$pid=intval($_GET['pkgid']);
$sql = "SELECT * from tbltourpackages where PackageId=:pid ORDER BY PackageId DESC";
$query = $dbh->prepare($sql);
$query -> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	

$pk = $result->PackageName;
 $dd = $result->d_from;
 $cost = $result->cost;
?>


		<div class="selectroom_top">
			<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
				<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="" style="height:200px;" >
			</div>
			<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
				<h2><?php echo htmlentities($result->PackageName);?></h2>
				<p class="dow">#PKG-<?php echo htmlentities($result->PackageId);?></p>
				<p><b>Package Type :</b> <?php echo htmlentities($result->PackageType);?></p>
				<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
					<p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
					<p><b>Departure Date</b> <?php echo htmlentities($result->d_from);?></p>
					
					<p><b>Return Date</b> <?php echo htmlentities($result->d_to);?></p>
					<div class="ban-bottom">
				
			</div>
						<div class="clearfix"></div>
				<div class="grand">
					<p>Price</p>
					<h3>BDT.<?php echo htmlentities($result->PackagePrice);?></h3>
				</div>
			</div>
			
			<div class="row">
			
			<div class="col-md-6">
			
			<label class="inputLabel" style="color:green;font-size:30px;">Include <hr/></label>
			
			<?php
			
			
			  $include = explode(",",$result->PackageFetures);
			  $nmbr = count($include);
			  
			  for($i = 0; $i<$nmbr; $i++){
				 
                ?>

				<div class="custom-control custom-checkbox">
				  <input type="checkbox" class="custom-control-input" id="defaultCheckedDisabled2" style="background-color:green;" checked disabled>
				  <label class="custom-control-label" for="defaultCheckedDisabled2"><?php echo $include[$i];?></label>
				</div>

            <?php				
				  
			  }
			  
			?>
				
				
			</div>
			
			<div class="col-md-6">
			
				
			<label class="inputLabel" style="bgcolor:green;font-size:30px;">Exclude <hr/></label>
			
			<?php
			
			
			  $include = explode(",",$result->exclude);
			  $nmbr = count($include);
			  
			  for($i = 0; $i<$nmbr; $i++){
				 
                ?>

				<div class="custom-control custom-checkbox">
				  <input type="checkbox" class="custom-control-input" id="defaultCheckedDisabled2" style="color:red;" 
				  disabled>
				  <label class="custom-control-label" for="defaultCheckedDisabled2"><?php echo $include[$i];?></label>
				</div>

            <?php				
				  
			  }
			  
			?>
			</div>
				
			</div>
			
			
		<center><b style="color:green;font-size:30px;">Package Details</b> </center><hr/>
				<pre><p style="padding-top: 1%"><?php echo htmlentities($result->PackageDetails);?> </p> </pre>
				<div class="clearfix"></div>
		</div>
		<div class="selectroom_top">
			
			
			<form name="book" method="post" action="report.php">
			
			<h2>pricing</h2><hr/>
			
			Price
			<div class="grand">
			
			
		
					<h3 style="color:green;">BDT.<input type="text" name="price" id="price" value="<?php echo htmlentities($result->PackagePrice);?>" class="form-control" value="" readonly >
					<input type="hidden" name="price1" id="price1" value="<?php echo htmlentities($result->PackagePrice);?>" class="form-control" value="" readonly >
					
					</h3>
				</div>
			<div class="form-group">
				<label>  Adult </label> 
					<input type="number" id="adult" name="adult" onclick="myFunction()" onkeyup="myFunction()" class="form-control"/>
					<input type="hidden"  name="pk" value="<?php echo $pk;?>" class="form-control"/>
					<input type="hidden"  name="dd" value="<?php echo $dd;?>" class="form-control"/>
					<input type="hidden"  name="cost" value="<?php echo $cost;?>" class="form-control"/>
					<input type="hidden"  name="pkgid" value="<?php echo $pid;?>" class="form-control"/>
					
             </div>			
			
			<div class="form-group">
			<label>  Children </label> 
			<input type="number" name="children" id="children" onclick="myFunction()" onkeyup="myFunction()" class="form-control" />
			</div>
			
			
			
				
				
			<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
			
			
				<ul>
				
				
				<li class="spe">
						<center> <h2> <b> Payment Area </b> </h2> <hr/>  </center> 
					</li>
					
					
					<li class="spe">
						<label class="inputLabel"><b style="color:red;font-size:30px;"> Please sent the due amount <span  id="show" style="color:green;" >  </span> to Our Agent Number. Our Bkash Agent Number is <b style="color:green;"> ( 01718825371). </b>  <small> ( After payment put your account number and transaction id below ) </small></b>   </label>
						<img src="images/bkash.png" style="width:100%;height:500px;"/>
					</li>
					<li class="spe">
						<label class="inputLabel">Bkash Account Number</label>
						<input class="form-control" type="text" name="acc" required="">
					</li>
					
					<li class="spe">
						<label class="inputLabel">Bkash Transaction Id</label>
						<input class="form-control" type="text" name="tnx" required="">
					</li>
					<li class="spe">
						<label class="inputLabel">Comment</label>
						<input class="special" type="text" name="comment" required="">
					</li>
					<?php if($_SESSION['login'])
					{?>
						<li class="spe" align="center">
					<button type="submit" name="submit2" class="btn-primary btn">Book</button>
						</li>
						<?php } else {?>
							<li class="sigi" align="center" style="margin-top: 1%">
							<a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn" > Book</a></li>
							<?php } ?>
					<div class="clearfix"></div>
				</ul>
			</div>
			
		</div>
		</form>
<?php }} ?>


	</div>
</div>

<script>

function myFunction() {
	
	var price1 = document.getElementById('price1').value;
	var price = document.getElementById('price').value;
	var adult = document.getElementById('adult').value;
	var children = document.getElementById('children').value;
	
	var total  = (adult*price1) + (children* (price1/2));
	
	document.getElementById('price').value = total;
	
	document.getElementById('show').innerHTML = total;
	
}


</script>

<?php include('includes/footer.php');?>

<?php include('includes/signup.php');?>			

<?php include('includes/signin.php');?>			


<?php include('includes/write-us.php');?>
</body>
</html>