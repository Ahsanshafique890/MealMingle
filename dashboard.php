
<?php
session_start();
include("connection.php");
extract($_REQUEST);
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

.container1 {
  position: center;
  width: 1110px;
  height: 4500px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
  /* margin-left:350px; */
}
.container2 {
  position: center;
  width: 400px;
  height: 350px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
  margin-left:350px;
}
.container3 {
  position: center;
  width: 1110px;
  height: 1050px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
  /* margin-left:350px; */
}
.container4 {
  position: center;
  width: 1110px;
  height: 1600px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
  /* margin-left:350px; */
}
.container5 {
  position: center;
  width: 1110px;
  height: 750px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
  /* margin-left:350px; */
}
.inputs {
  text-align: left;
  margin-top: 30px;
}

.label, input, .button2 {
  display: block;
  width: 100%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
}

.label {
  margin-bottom: 4px;
}

.label:nth-of-type(2) {
  margin-top: 12px;
}

input::placeholder {
  color: gray;
}

input {
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 50px;
  font-size: 14px;
  border-radius: 10px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}

.button2 {
  margin-top: 20px;
  background: #1DA1F2;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}

.button2:hover {
  box-shadow: none;
}
img{
	border-radius: 10%;
}

.container6 {
  position: center;
  width: 550px;
  height: 230px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
  /* margin-left:350px; */
}
.inputs, select {
  text-align: left;
  margin-top: 30px;

}

.label, input, select {
  display: block;
  width: 100%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
}

.label {
  margin-bottom: 4px;
}

.label:nth-of-type(2) {
  margin-top: 12px;
}

input::placeholder {
  color: gray;
}

input, select {
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 50px;
  font-size: 14px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}
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


<body style="background-image: url('img/Background2.jpg'); background-repeat: no-repeat;  background-size:cover;">


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

    <a class="navbar-brand" href="index.php"><img src="img/logomealmingle.png" alt="logo" style="width:70px;height:50px;"></a>
    <?php
	if(!empty($admin_username))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoratio:none;"><i class="far fa-user"> &nbsp Admin</i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Complain</a>
		</li>

		<li class="nav-item mb-auto mt-auto">
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
	   <ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:#ED2553;border-radius:10px 10px 10px 10px;" role="tablist">
          <li class="nav-item">
             <a class="nav-link active" style="color:#8dc6fc;" id="viewitem-tab" data-toggle="tab" href="#viewitem" role="tab" aria-controls="viewitem" aria-selected="true">View Food Items</a>
          </li>
          <li class="nav-item">
              <a class="nav-link"  style="color:#8dc6fc;" id="manageaccount-tab" data-toggle="tab" href="#manageaccount" role="tab" aria-controls="manageaccount" aria-selected="false">Account Settings</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" style="color:#8dc6fc;"  id="ManageVendors-tab" data-toggle="tab" href="#ManageVendors" role="tab" aria-controls="ManageVendors" aria-selected="false">Manage Vendors</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" style="color:#8dc6fc;" id="orderstatus-tab" data-toggle="tab" href="#orderstatus" role="tab" aria-controls="orderstatus" aria-selected="false">Order status</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" style="color:#8dc6fc;"  id="SalesReport-tab" data-toggle="tab" href="#SalesReport" role="tab" aria-controls="SalesReport" aria-selected="false">Sales Report</a>
          </li>
		  <li class="nav-item">
              <a class="nav-link" style="color:#8dc6fc;"  id="CompareMenu-tab" data-toggle="tab" href="#CompareMenu" role="tab" aria-controls="CompareMenu" aria-selected="false">Compare Menu</a>
          </li>


       </ul>
	   <br><br>
	<!--tab 1 starts-->
	   <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="viewitem" role="tabpanel" aria-labelledby="viewitem-tab">
                 <div class="container1">
	               <table class="table">
                 <thead>
                    <tr>
                        <th scope="col">Hotel_Id</th>
                            <th scope="col">Food View</th>
                            <th scope="col">Food Cuisines</th>
                            <th scope="col">Hotel Name</th>
                            <th scope="col">Food Id</th>

                            <th scope="col">Remove Vendor</th>
                     </tr>
                 </thead>
				 <tbody>
	<?php
	$query=mysqli_query($con,"select tblvendor.fldvendor_id,tblvendor.fld_name,tblvendor.fld_email,tbfood.food_id,tbfood.foodname,tbfood.cuisines,tbfood.fldimage from  tblvendor right join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id");
	    while($row=mysqli_fetch_array($query))
		{

	?>

                    <tr>
                        <th scope="row"><?php echo $row['fldvendor_id'];?></th>
						<td><img src="image/restaurant/<?php echo $row['fld_email']."/foodimages/" .$row['fldimage'];?>" height="50px" width="100px">
						<br><?php echo $row['foodname'];?>
						</td>
						<td><?php echo $row['cuisines'];?></td>
                        <td><?php echo $row['fld_name'];?></td>
                        <td><?php echo $row['food_id'];?></td>




						<form method="post">
                        <td><a href=""><button type="submit" value="<?php echo $row['food_id']; ?>" name="delete"  class="btn btn-danger">Remove </button></td>
                        </form>
                   </tr>
		<?php
		}
		?>
                </tbody>
           </table>

	 </div>

		   <span style="color:green; text-align:centre;"><?php if(isset($success)) { echo $success; }?></span>


      	    </div>

<!--tab 1 ends-->


			<!--tab 2 starts-->
            <div class="tab-pane fade" id="manageaccount" role="tabpanel" aria-labelledby="manageaccount-tab">
			<div class="container2">
			    <form method="post" enctype="multipart/form-data">
				<div class="input2">
                    <div class="form-group">
                      <label for="name" class="label2">Name</label>
                      <input type="text" class="input2 form-control" id="username" value="<?php if(isset($user)){ echo $user;}?>"  name="name" readonly="readonly"/>
                    </div>



                   <div class="form-group">
                      <label for="pwd" class="label2">Password:</label>
                     <input type="password" name="password" class="input2 form-control" value="<?php if(isset($pass)){ echo $pass;}?>" id="pwd" required/>
                   </div>



                  <button type="submit" name="update" class="button2 btn btn-primary" style="background:#ED2553; border:1px solid #ED2553;" >Update</button>
                  <div class="footer" style="color:red;"><?php if(isset($ermsg)) { echo $ermsg; }?><?php if(isset($ermsg2)) { echo $ermsg2; }?></div>
				  </div>
				</form>
	</div>
			</div>
			<!--tab 2 ends-->
			 <div class="tab-pane fade show" id="ManageVendors" role="tabpanel" aria-labelledby="ManageVendors-tab">
			    <div class="container3">
	               <table class="table">
                 <thead>
                    <tr>
                        <th scope="col"></th>
                            <th scope="col">Hotel Id/vendor Id</th>
                            <th scope="col">Name</th>


                            <th scope="col">Address</th>
                            <th scope="col">Remove Vendor</th>
                     </tr>
                 </thead>
				 <tbody>
	<?php
	$query=mysqli_query($con,"select  * from tblvendor");
	    while($row=mysqli_fetch_array($query))
		{

	?>

                    <tr>

						<td><img src="image/restaurant/<?php echo $row['fld_email']."/" .$row['fld_logo'];?>" height="50px" width="100px"></td>
                        <th scope="row"><?php echo $row['fldvendor_id'];?></th>
						<td><?php echo $row['fld_name'];?></td>
						<td><?php echo $row['fld_address'];?></td>

						<form method="post">
                        <td><a href="#"  style="text-decoration:none; color:white;" onclick="delRecord(<?php echo $row['fldvendor_id']; ?>)"><button type="button" class="btn btn-danger">Remove Vendor</a></a></td>
                        </form>
                   </tr>
		<?php
		}
		?>
                </tbody>
           </table>

	 </div>
			 </div>
			 <!--tab 4-->
			 <div class="tab-pane fade" id="orderstatus" role="tabpanel" aria-labelledby="orderstatus-tab">
				 <div class="container4">
               <table class="table">
			   <th>Order Id</th>
			   <th>Food Id</th>
			   <th>Customer Email Id</th>
			   <th>order Status</th>
			   <tbody>
			   <?php
			   $rr=mysqli_query($con,"select * from tblorder");
			   while($rrr=mysqli_fetch_array($rr))
			   {
				   $stat=$rrr['fldstatus'];
				   $foodid=$rrr['fld_food_id'];
				   $r_f=mysqli_query($con,"select * from tbfood where food_id='$foodid'");
				   $r_ff=mysqli_fetch_array($r_f);

			   ?>
			   <tr>
			   <td><?php echo $rrr['fld_order_id']; ?></td>
			   <td><a href="searchfood.php?food_id=<?php echo $rrr['fld_food_id']; ?>"><?php echo $rrr['fld_food_id']; ?></td>
			   <td><?php echo $rrr['fld_email_id']; ?></td>
			   <?php
			   if($stat=="cancelled" || $stat=="Out Of Stock")
			   {
			   ?>
			   <td><i style="color:orange;" class="fas fa-exclamation-triangle"></i>&nbsp;<span style="color:red;"><?php echo $rrr['fldstatus']; ?></span></td>
			   <?php
			   }
			   else

			   {
			   ?>
			   <td><span style="color:green;"><?php echo $rrr['fldstatus']; ?></span></td>
			   <?php
			   }
			   ?>

			   </tr>
			   <?php
			   }
			   ?>
			   </tbody>
			   </table>
			   </div>
			</div>
			 <!-- Tab 5 -->

			 <div class="tab-pane fade show" id="SalesReport" role="tabpanel" aria-labelledby="SalesReport-tab">
			    <div class="container5">
	               <table class="table">
                 <thead>
                    <tr>
                        <th scope="col"></th>
                            <th scope="col">Hotel Id/vendor Id</th>
                            <th scope="col">Name</th>


                            <th scope="col">Address</th>
                            <th scope="col">Total Sales</th>
                     </tr>
                 </thead>
				 <tbody>
	<?php
	$query=mysqli_query($con,"Select tblvendor.*,SUM(tblorder.fld_payment) As Total from tblorder JOIN tblvendor ON tblorder.fldvendor_id = tblvendor.fldvendor_id GROUP BY tblorder.fldvendor_id");
	    while($row=mysqli_fetch_array($query))
		{

	?>

                    <tr>

						<td><img src="image/restaurant/<?php echo $row['fld_email']."/" .$row['fld_logo'];?>" height="50px" width="100px"></td>
                        <th scope="row"><?php echo $row['fldvendor_id'];?></th>
						<td><?php echo $row['fld_name'];?></td>
						<td><?php echo $row['fld_address'];?></td>
                        <td><?php echo $row['Total'];?></td>
                   </tr>
		<?php
		}
		?>
                </tbody>
           </table>

	 </div>
			 </div>


			<!-- Tab 6 -->


			<div class="tab-pane fade show" id="CompareMenu" role="tabpanel" aria-labelledby="CompareMenu-tab">
			    <div class="container">


				<form action="comparing_resturant.php" method="get" class="form-inline">

				<table class = "table">


				<tbody>
				<tr>
				<td>
				<div class="container6 form-group">
					<div class="input">
                      <label for="resturant1">Resturant 1 &nbsp &nbsp &nbsp</label>&nbsp<br>
                      &nbsp<select id="fldvendor" name="fldvendor" class="form-control"  title="Select First Resturant" required="required">
					  <option value="" disabled selected>Select your Restaurant</option>
						<?php
                            $Resturant_1 = mysqli_query($con,"SELECT * FROM `tblvendor`");
                            if(mysqli_num_rows($Resturant_1)>0){
                                while($row = mysqli_fetch_array($Resturant_1)){
                                       $fldvendor_id = $row['fldvendor_id'];
                                        $fld_name = $row['fld_name'];
                      echo '<option value="'.$fldvendor_id.'">'.$fld_name.'</option>';
                  }
              }
              ?>
              </select>
			  </div>
                    </div>
				</td>
				<td>


				<div class="container6 form-group">
				<div class="input">
                      <label for="resturant2">Resturant 2 &nbsp &nbsp &nbsp</label>&nbsp<br>
                      &nbsp<select id="fldvendor_2" name="fldvendor_2" class="form-control"  title="Select Second Resturant" required="required" >
					  <option value="" disabled selected>Select your Restaurant</option>
						<?php
                            $Resturant_1 = mysqli_query($con,"SELECT * FROM `tblvendor`");
                            if(mysqli_num_rows($Resturant_1)>0){
                                while($row = mysqli_fetch_array($Resturant_1)){
                                       $fldvendor_id = $row['fldvendor_id'];
                                        $fld_name = $row['fld_name'];
                      echo '<option value="'.$fldvendor_id.'">'.$fld_name.'</option>';
                  }
              }
              ?>
              </select>
			</div>
                    </div>
				</td></tr>

					</tbody>
                    </table>

                  <button  type="submit" name="Search" style="background:#ED2553; border:1px solid #ED2553;" class="button3 btn btn-primary">Compare</button>

			 </form>

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