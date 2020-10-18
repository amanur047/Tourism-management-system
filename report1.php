<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>


<!DOCTYPE HTML>
<html>
<head>
<title>TMS  | Package List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
</head>
<body>
<?php include('includes/header.php');?>

<style>
			/*----- Thank You Page ----*/
			#thank-you {
				background-color: #f9f8f8;
			}
			#thank-you h2.successfull {
				text-align: center;
				margin: 2em 0;
				font-size: 26px;
				color: #fdb90b;
				text-shadow: 1px 1px 1px #666;
			}
			#thank-you span.p-title {
				text-align: center;
				margin: 1.5em 0;
				background-color: #fdb90b;
				color: #f9f8f8;
				font-size: 20px;
				padding: .3em .6em;
				display: inline-block;
			}
			#thank-you .separator {
				height: 10px;
			}
			#thank-you .background-white {
				background: #fff;
				border: 1px solid #fdb90b;
				padding: .5em;
			}
			#thank-you .your-data, #thank-you .your-bill {
				text-align: center;
			}
			#thank-you .your-data table{
				width: 100%;
				border-collapse: collapse;
				border-spacing: 0;
				border: 0;
			}
			#thank-you .your-data table tr td{
				padding: 2px;
				font-size: 12px;
				text-align: left;
				color: #666
			}
			#thank-you .your-bill p {
				text-align: right;
			}
			#thank-you .your-bill .invoice-print {
				color: #333;
				text-decoration: underline;
				font-size: 18px;
				font-weight: 600;
				font-family: 'Times New Roman';
				cursor: pointer;
			}
			#thank-you .invoice {
				position: relative;
				width: 800px;
				margin: 50px auto;
				text-align: left;
				padding: 50px 65px;
				box-shadow: 0px 0px 20px #ccc;
			}
			#thank-you .invoice-top img {
				max-width: 100%;
				height: 100px;
			}
			#thank-you .invoice-top .tagline h2.company-name{
				font-weight: bold;
				font-size: 28px;
				line-height: 1em;
				text-transform: none;
				margin: 0;
			}
			#thank-you .invoice-top .tagline p{
				text-align: left;
				color: #888;
				font-size: 14px;
				margin-bottom: 0;
				line-height: 19.6px;
			}
			#thank-you .invoice-top .qr {
				text-align: right;
			}
			#thank-you .invoice-middle .invoice-id {
				margin-top: 60px;
				margin-bottom: 40px;
			}
			#thank-you .invoice-middle h1{
				font-size: 50px;
				font-family: 'impact';
				color: #396E00;
				line-height: 50px;
			}
			#thank-you .invoice-middle .invoice-info table{
				width: auto;
				border-collapse: collapse;
				border-spacing: 0;
			}
			#thank-you .invoice-middle .invoice-info table tr td{
				padding: 1px 3px;
			}
			#thank-you .invoice-middle .invoice-bill-to p {
				text-align:left;
				margin-bottom: 2px;
				font-size: 14px;
				color: #000;
			}
			#thank-you .invoice-table .itemLists {
				width: 100%;
				border-collapse: collapse;
				border-spacing: 0;
				margin-top: 40px;
				font-size: 14px;
			}
			#thank-you .invoice-table .itemLists td,#thank-you .invoice-table .itemLists th{
				padding: 10px;
			}
			#thank-you .invoice-table .itemLists td p.ipnaid {
				font-size: 13px;
				color: #333;
				text-align: left;
				margin-bottom: 0px;
			}
			#thank-you .invoice-table .itemLists td p.ipnaid.ipname {
				font-weight: 600;
			}
			#thank-you .invoice-table .itemLists thead tr{
				border-bottom: 2px solid #aaa;
				color: #333;
				font-weight: 600;
			}
			#thank-you .invoice-table .itemLists tbody tr{
				border-bottom: 1px solid #ccc;
				color: #333;
				font-weight: 500;
			}
			#thank-you .invoice-table .itemTotal {
				width: 35%;
				border-collapse: collapse;
				border-spacing: 0;
				margin-top: 10px;
				font-size: 14px;
				float: right;
				color: #333;
			}
			#thank-you .invoice-table .itemTotal tr.subtotal {
				color: #396E00;
				border-top: 2px dotted #aaa;
				font-size: 16px;
			}
			#thank-you .invoice-table .itemTotal tr td{
				padding: 5px;
			}
			#thank-you .invoice-table .payment-info {
				color: #888;
				font-size: 12px;
				margin-top: 20px;
				width: 100%;
				font-weight: normal;
			}
			#thank-you .paid-stamp {
				max-width: 25%;
				display: block;
				margin: 0 auto;
				position: absolute;
				top: 215px;
				right: 71px;
				opacity: .5;
			}
			@media print {
				body * {
					visibility: hidden;
				}
				.invoice, .invoice * {
					visibility: visible;
				}
				.invoice {
					width: 100%;
					position: absolute;
					left: 0;
					top: 0;
				}
			}
		</style>
<div id="page-wrapper">
		<div class="row">
				<div class="col-lg-12">
						<h1 class="page-header"><i class="fa fa-rocket"></i> Report</h1>
						
						

							
							
							<?php


include('includes/config.php');
if(isset($_GET['bkid']))
{


$bkid=$_GET['bkid'];
$sql = "SELECT tblbooking.adult as adult,tblbooking.children as children,tblbooking.invoice_id as invoice_id,tblbooking.total as total,tblbooking.BookingId as bookid,tblbooking.PackageId as pkgid,tbltourpackages.PackageName as packagename,tblbooking.FromDate as fromdate,tblbooking.ToDate as todate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.RegDate as regdate,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblbooking join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where BookingId=:uemail";
$query = $dbh->prepare($sql);
$query -> bindParam(':uemail', $bkid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{

?>




							
							
							
							
								<div id="thank-you">
			<div class="your-bill">				
				<div class="background-white">
					<p><span class="invoice-print" onclick="window.print()"><i class="fa fa-print"></i> Print</span></p> 
					<div class="invoice">
						<div class="row invoice-top">
							<div class="col-md-3 col-sm-3 col-xs-3 logo">
								<img src="images/bus.png" />
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 tagline">
								<h2 class="company-name">Travel Agency</h2>
								<div class="separator"></div>
								<p class="company-address">Suite # 618, 87 BNS Center, Sector # 7, Uttara, Dhaka-1230</p>
								<p class="company-contact">+88 02 48954862 | info@travel.com</p>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3 qr">
								
							</div>
						</div>
						<div class="row invoice-middle">
							<div class="col-md-12 invoice-id">
								<center> <h3>Booking report</h3> </center>
								<hr/>
								
							</div>
							<div class="clearfix"></div>

							<div class="col-md-6 col-sm-6 col-xs-6 invoice-info">
								<table border="0">
								
								<tr><td>Ticket Number</td><td>:</td><td>#BK<?php echo htmlentities($result->bookid);?>-<?php echo htmlentities($result->invoice_id);?></td></tr>
									<tr><td>Issue Date</td><td>:</td><td><?php echo htmlentities($result->regdate);?></td></tr>
									<tr><td>Month:</td><td>:</td><td>
									<?php
echo date("M");
?>
									
									
									</td></tr>
									
									
								</table>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 invoice-bill-to">
								
																			<div id="calendar"></div>
																	
							</div>
						</div>
						<div class="row invoice-table">
							<div class="col-md-12">
								<table border="0" class="itemLists">
									<thead>
										<tr><th>Sl No</th><th>Package Name</th><th>Adult</th><th>Children</th><th>Total</th></tr>
									</thead>
									<tbody>
									
									
							
							
							
										  <tr>
											<td>1</td>
											
											<td><?php echo htmlentities($result->packagename);?></td>
											<td><?php echo htmlentities($result->adult);?></td>
											<td><?php echo htmlentities($result->children);?></td>
											<td><?php echo htmlentities($result->total);?></td>
											
											
											
											
										  </tr>
										  
							
							
						
									</tbody>
								</table>
								
								<div class="clearfix"></div>
								
								<div class="separator"></div>
								<div class="payment-info">
								<h5>	Total : <b><?php echo htmlentities($result->total);?></b> TK
									
									
									
									</h5>
									
								</div>
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</div>
				
							
			
<?php
}
}

}
?>				
										 
			
			 <script language = "JavaScript">
         function drawChart() {
           
            var data = google.visualization.arrayToDataTable([
               ['Year', 'Cost', 'profit'],
               ['2012',  900,      390],
               ['455',  1000,      400],
               ['2014',  1170,      440],
               ['2015',  1250,       480],
               ['2016',  1530,      540]
            ]);

            var options = {title: 'Salling rate (monthly)'};  

           
            var chart = new google.visualization.ColumnChart(document.getElementById('calendar'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>				
							
					
		
				</div>
		</div>
		<div class="row">
				
		</div>
</div>


<?php include('includes/footer.php');?>

<?php include('includes/signup.php');?>			

<?php include('includes/signin.php');?>			

<?php include('includes/write-us.php');?>			

</body>
</html>