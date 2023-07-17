<?php
session_start();
include("connection.php");
extract($_REQUEST);
if(isset($_SESSION['id']))
{
 $id=$_SESSION['id'];
 $vq=mysqli_query($con,"select * from tblvendor where fld_email='$id'");
 $vr=mysqli_fetch_array($vq);
 $vrid=$vr['fldvendor_id'];
}

if(!isset($_SESSION['id']))
{
	header("location:vendor_login.php?msg=Please Login To continue");
}
else
{
$query=mysqli_query($con,"select * from tblvendor   where fld_email='$id'");
if(mysqli_num_rows($query))
{   if(!file_exists("image/restaurant/".$id."/foodimages"))
	{
		$dir=mkdir("image/restaurant/".$id."/foodimages");
	}
	$row=mysqli_fetch_array($query);
    $v_id=$row['fldvendor_id'];
}
else
{

	header("location:index.php");


}
}


if(isset($add))
{   if(isset($_SESSION['id']))
	{
    $img_name=$_FILES['food_pic']['name'];
    if(!empty($chk))
	{
	$paymentmode=implode(",",$chk);
	if(mysqli_query($con,"insert into tbfood(fldvendor_id,foodname,cost,cuisines,paymentmode,fldimage) values

	('$v_id','$food_name','$cost','$cuisines','$paymentmode','$img_name')"))
	{
		move_uploaded_file($_FILES['food_pic']['tmp_name'],"image/restaurant/$id/foodimages/".$_FILES['food_pic']['name']);
	}
	else{
		echo "failed";
	}
  }
  else
  {
	  $paymessage="please select a payment mode";
  }
	}
	else
	{
		header("location:vendor_login.php");
	}
}

if(isset($logout))
{
	session_destroy();
	header("location:index.php");
}
if(isset($upd_account))
				{

					//echo $fn;
					//echo $emm;
					//echo $add;
					if(mysqlI_query($con,"update tblvendor set fld_name='$fn',fld_email='$emm',fld_address='$add',fld_mob='$mob',fld_password='$pwsd' where fld_email='$id'"))
				   {
						 header("location:infoUpdate.php");
					}
			  }
			  if(isset($upd_logo))
			  {
				  if(isset($_SESSION['id']))
				  {
				  $log_img=mysqli_query($con,"select * from tblvendor where fld_email='$id'");
                  $log_img_row=mysqli_fetch_array($log_img);
				  $old_logo=$log_img_row['fld_logo'];
				  $new_img_name=$_FILES['logo_pic']['name'];

				  if(mysqli_query($con,"update tblvendor set fld_logo='$new_img_name' where fld_email='$id'"))
				  {
					  unlink("image/restaurant/$id/$old_logo");
					  move_uploaded_file($_FILES['logo_pic']['tmp_name'],"image/restaurant/$id/".$_FILES['logo_pic']['name']);

					  header("location:update_food.php");

				  }
			  }
			  else
			  {
				  header("location:vendor_login.php?msg=Please Login To continue");
			  }
			  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>GRUB HUB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/font.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	 <style>
		ul li{}
		ul li a {color:white;padding:40px; }
		ul li a:hover {color:white;}
	 </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

    <a class="navbar-brand" href="index.php"><img src="img/logomealmingle.png" alt="logo" style="width:100px;height:70px;"></a>
    <?php
	if(!empty($id))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoration:none;"><i class="far fa-user"><?php if(isset($id)) { echo $vr['fld_name']; }?></i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Home

              </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="contact.php">Complain</a>
		</li>
		<li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="comparing_restaurant.php">Compare Price</a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="report.php">Sales Report</a>
        </li>
		<li class="nav-item">
		  <form method="post">
          <?php
			if(empty($_SESSION['id']))
			{
			?>
		   <button class="btn btn-outline-danger my-2 my-sm-0" name="login">Log In</button>&nbsp;&nbsp;&nbsp;
            <?php
			}
			else
			{
			?>

			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			</form>
        </li>


      </ul>

    </div>

</nav>

<br><br><br><br><br><br>

<div class="container">
       <!--tab heading-->
	<!--tab 1 starts-->
			<br><br><br><br>
			<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12">


	               <table class="table">
                 <thead>
                    <tr>
                        <th scope="col"></th>

                            <th scope="col">Total Report</th>
							<th scope="col"></th>

                     </tr>
				</thead>
				<tbody>

				 <tr>
				 		<th></th>
						<th>Items Name</th>
						<th>Order Status</th>
						<th>Price</th>
						<th>Time and Date</th>
						<th></th>
				 </tr>
				<?php
                $checkReport = mysqli_query($con,"SELECT * FROM `tblorder` INNER JOIN `tbfood` on tblorder.fld_food_id = tbfood.food_id WHERE tblorder.fldvendor_id=$v_id");
                if(mysqli_num_rows($checkReport)>0){
                    while($row = mysqli_fetch_array($checkReport)){

                    	$fld_payment = $row['fld_payment'];
                    	$timestamp = $row['timestamp'];
                    	$foodname = $row['foodname'];
                    	$fldstatus = $row['fldstatus'];

                    echo '<tr>
					<td></td>
						<td>'.$foodname.'</td>
						<td>'.$fldstatus.'</td>
						<td>'.$fld_payment.'</td>
						<td>'.$timestamp.'</td>
						<td></td>


                   </tr>';
		}
	}
		?>
                </tbody>
           </table>
			</div>
			</table>
		</div>
		<div>
			<h4><b>Total Amount</b></h4>
			<?php
	$query=mysqli_query($con,"Select tblvendor.*,SUM(tblorder.fld_payment) As Total from tblorder JOIN tblvendor ON tblorder.fldvendor_id = tblvendor.fldvendor_id WHERE tblvendor.fldvendor_id=$v_id GROUP BY tblorder.fldvendor_id ");
	    while($row=mysqli_fetch_array($query))
		{
	echo $row['Total'];
}
?>
		</div>
			 </div>


			<!-- Tabs end -->

	  </div>



</div>

</body>
</html>