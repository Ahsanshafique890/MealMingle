
<?php
session_start();
include("connection.php");
extract($_REQUEST);
if(isset($_GET['fldvendor'])  && isset($_GET['fldvendor_2'])) {
   $fldvendor = $_GET['fldvendor'];
   $fldvendor_2 = $_GET['fldvendor_2'];
   }
if(!isset($_SESSION['admin']))
{
	header("location:admin.php");

}
else
{
	$admin_username=$_SESSION['admin'];
}
if(isset($logout))
{
	unset ($_SESSION['admin']);
	setcookie('logout','loggedout successfully',time() +5);
	header("location:admin.php");
}
if(isset($delete))
{
	header("location:deletefood.php?id=$delete");
}
if(isset($deleteVendor))
{
	header("location:deleteVendor.php?Vendorid=$deleteVendor");
}
$admin_info=mysqli_query($con,"select * from tbadmin where fld_username='$admin_username'");
$row_admin=mysqli_fetch_array($admin_info);
$user= $row_admin['fld_username'];
$pass= $row_admin['fld_password'];

//update
if(isset($update))
{
if(mysqli_query($con,"update tbadmin set fld_password='$password'"))
{
	//$_SESSION['pas_update_success']="Password Updated Successfully Login with New Password";
    unset ($_SESSION['admin']);
	header("location:admin_info_update.php");
}
else
{
	echo "failed";
}

}
?>
<html>
  <head>
     <title>Admin control panel</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		 <style>
		ul li{}
		ul li a {color:black;}
		ul li a:hover {color:black; font-weight:bold;}
		ul li {list-style:none;}

ul li a:hover{text-decoration:none;}
#social-fb,#social-tw,#social-gp,#social-em{color:blue;}
#social-fb:hover{color:#4267B2;}
#social-tw:hover{color:#1DA1F2;}
#social-gp:hover{color:#D0463B;}
#social-em:hover{color:#D0463B;}
	 </style>
	 <script>
			function delRecord(id)
			{
				//alert(id);

				var x=confirm("You want to delete this record? All Food Items Of that Vendor Will Also Be Deleted");
				if(x== true)
				{

					//document.getElementById("#result").innerHTML="success";
				  window.location.href='deleteVendor.php?Vendorid=' +id;
				}
				else
				{
					window.location.href='#';
				}

			}
		</script>

  </head>


	<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

    <a class="navbar-brand" href="index.php"><img src="img/logomealmingle.png" alt="logo" style="width:70px;height:50px;"></a>
    <?php
	if(!empty($admin_username))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoratio:none;"><i class="far fa-user">Admin</i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

	<li class="nav-item mb-auto mt-auto ">
          <a class="nav-link" href="index.php">Home

              </a>
        </li>

       <!-- <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="services.php">Services</a>
        </li> -->
        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="contact.php">Complain</a>
        </li>
        <li class="nav-item mb-auto mt-auto active">
          <a class="nav-link" href="comparing_restaurant.php">Compare Price</a>
        </li>
		<?php
		if(isset($_SESSION['admin']))
		{
			?>
			<li class="nav-item">
            <a class="nav-link" href="">
		      <form method="post">
			    <button type="submit" name="logout" class="btn btn-outline-success">Log Out</button>
			  </form>
		    </a>
            </li>
			<?php
		}

		?>
      </ul>

    </div>

</nav>
<!--navbar ends-->
<br><br><br><br>
<!--details section-->

<div class="container">
       <!--tab heading-->
	<!--tab 1 starts-->
			<br><br><br><br>
			<div class="row">

			<div class="col-lg-6 col-md-6 col-sm-6">


	               <table class="table">
                 <thead>
                    <tr>
                        <th scope="col"></th>

                            <th scope="col">Resturant 1</th>
							<th scope="col"></th>

                     </tr>
				</thead>
				<tbody>

				 <tr>
				 		<th></th>
						<th>Items</th>
						<th>Price</th>
						<th></th>
				 </tr>
				<?php
				$query1=mysqli_query($con,"SELECT * FROM `tbfood` where fldvendor_id=$fldvendor");
					while($rowdata1=mysqli_fetch_array($query1))
					{
					?>
                    <tr>
					<td></td>
						<td><?php echo $rowdata1['foodname'];?></td>

						<td><?php echo $rowdata1['cost'];?></td>
						<td></td>


                   </tr>
		<?php
		}
		?>
                </tbody>
           </table>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6">

		   <table class="table">
                 <thead>
                    <tr>
                        <th scope="col"></th>

                            <th scope="col">Resturant 2</th>
							<th scope="col"></th>

                     </tr>
				</thead>
				<tbody>

				 <tr>
				 		<th></th>
						<th>Items</th>
						<th>Price</th>
						<th></th>
				 </tr>
				<?php
				$query1=mysqli_query($con,"SELECT * FROM `tbfood` where fldvendor_id=$fldvendor_2");
					while($rowdata1=mysqli_fetch_array($query1))
					{
					?>
                    <tr>
					<td></td>
						<td><?php echo $rowdata1['foodname'];?></td>

						<td><?php echo $rowdata1['cost'];?></td>
						<td></td>


                   </tr>
		<?php
		}
		?>
                </tbody>
           </table>
		</div>
		</div>
	 </div>
			 </div>


			<!-- Tabs end -->

	  </div>
	</div>
	<br><br><br>
 <?php
			include("footer.php");
			?>


</body>

</html>