<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	// code for cancel
if(isset($_REQUEST['bkid']))
	{
$bid=intval($_GET['bkid']);
$status=2;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE  BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
}


if(isset($_REQUEST['bckid']))
	{
$bcid=intval($_GET['bckid']);
$status=1;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status WHERE BookingId=:bcid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':bcid',$bcid, PDO::PARAM_STR);
$query -> execute();
$msg="Booking Confirm successfully";
}




	?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin manage Bookings</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>	
				</div>


				
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Manage Bookings</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="agile-tables">
					<div class="w3l-table-info">
					
					
					<form action="" method="post">
					<label>  From </label>
					<input type="date" name="from" />
					<label>  To </label>
					<input type="date" name="to" />
					
					<input type="submit" name="search" value="Search"  class="btn btn-primary" />
					
					</form>
					
					
					
					<?php
					
					if(isset($_POST["search"])){
						
						$from = $_POST["from"];
						$to = $_POST["to"];
					
					?>
					
					
					
					  <h2>Accounts</h2>
					    <table id="table">
						<thead>
						  <tr>
						  <th>Booikn id</th>
							
							
							<th>Order Date </th>
							<th>Cost</th>
							<th>Total</th>
							<th>Profit <?php echo $from; ?> </th>
							
							
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT * from tblbooking where RegDate between '$from' and '$to' and status = 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
	
	$t = 0;
foreach($results as $result)
{				?>		
						  <tr>
							<td>#BK-<?php echo htmlentities($result->bookid); ?> </td>
							
							
							<td><?php echo htmlentities($result->RegDate);?> </td>
								
								<td><?php echo htmlentities($result->cost);?></td>
								<td><?php echo htmlentities($result->total);?></td>
								<td><?php 
								
								$p = $result->total - $result->cost;
								$t = $t + $p;
								echo htmlentities($p);
								
								?></td>

								


						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					  
					  
					  <center>  <h2> Total Profit : <?php echo $t; ?> </h2> </center> 
					</div>
				  </table>

					<?php } 
					
					else {
						
						
						
						$from = $_POST["from"];
						$to = $_POST["to"];
					
					?>
					
					
					
					  <h2>Accounts</h2>
					    <table id="table">
						<thead>
						  <tr>
						  <th>Booikn id</th>
							
							
							<th>Order Date </th>
							<th>Cost</th>
							<th>Total</th>
							<th>Profit </th>
							
							
						  </tr>
						</thead>
						<tbody>
<?php $sql = "SELECT tblbooking.cost as cost,tblbooking.BookingId as bookid,tblbooking.adult as adult,tblbooking.children as children,tblbooking.acc_number as acc_number,tblbooking.tnx_id as tnx_id,tblbooking.total  as total,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tbltourpackages.PackageName as pckname,tblbooking.PackageId as pid,tblbooking.FromDate as fdate,tblbooking.RegDate as RegDate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblusers join  tblbooking on  tblbooking.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where  status = 1 order by  bookid desc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
	
	$t = 0;
foreach($results as $result)
{				?>		
						  <tr>
							<td>#BK-<?php echo htmlentities($result->bookid);?></td>
							
							
							<td><?php 
							echo htmlentities($result->RegDate);?> </td>
								
								<td><?php echo htmlentities($result->cost);?></td>
								<td><?php echo htmlentities($result->total);?></td>
								<td><?php 
								
								$p = $result->total - $result->cost;
								$t = $t + $p;
								echo htmlentities($p);
								
								?></td>

								


						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					  
					  
					  <center>  <h2> Total Profit : <?php echo $t; ?> </h2> </center> 
					</div>
				  </table>

					<?php } 
					
					?>
			</div>
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
						<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>