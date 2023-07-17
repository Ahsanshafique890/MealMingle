<?php
session_start();
include("connection.php");
extract($_REQUEST);
    if(isset($_SESSION['id']))
{
	header("location:food.php");
}

	if(isset($register))
     {
	$sql=mysqli_query($con,"select * from tblvendor where fld_email='$email'");
    if(mysqli_num_rows($sql))
	{
	  $email_error="This Email Id is laready registered with us";
	}
	else
	{
	$logo=$_FILES['logo']['name'];
	$sql=mysqli_query($con,"insert into tblvendor
	(fld_name	,fld_email,fld_password,fld_mob,fld_phone,fld_address,fld_logo)
       	values('$r_name','$email','$pswd','$mob','$phone','$address','$logo')");

    if($sql)
	{
	mkdir("image/restaurant");
	mkdir("image/restaurant/$email");

	move_uploaded_file($_FILES['logo']['tmp_name'],"image/restaurant/$email/".$_FILES['logo']['name']);
	}
	$_SESSION['id']=$email;

	header("location:food.php");

	}
  }



?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
    <title>Restaurant Registration </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

		<style>
		ul li{list-style:none;}
		ul li a {color:black;text-decoration:none; }
		ul li a:hover {color:black; text-decoration:none;}

    .container1 {
  position: center;
  width: 750px;
  height: 900px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
  margin-left:23px;
}
img {
  height: 150px;
  width: 230px;
  background-image: url("MealMingle.png");
  margin: auto;
  border-radius: 10%;
  /* box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white; */
  display: block;
  margin-left: auto;
  margin-right: auto;

}

.inputs {
  text-align: left;
  margin-top: 30px;
}

.label, input {
  display: block;
  width: 100%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
}
button{
  display: block;
  width: 200px;
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

button {
  margin-top: 20px;
  background: #1DA1F2;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}

button:hover {
  box-shadow: none;
}
		</style>
</head>
<body style="background-image: url('img/Background2.jpg'); background-repeat: no-repeat;  background-size:cover;">

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:rgba(0, 0, 0, 0.7";>

    <a class="navbar-brand" href="index.php"><img src="img/logomealmingle.png" alt="logo" style="width:120px;height:60px;"></span></a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav ml-auto mb-auto mt-auto">

		<li class="nav-item mb-auto mt-auto"><!--hotel search-->
		     <a href="#" class="nav-link"><form class="mb-auto mt-auto" method="post"><input type="text" name="search_hotel" id="search_hotel" placeholder="Search Restaurant" class="form-control " /></form></a>
		  </li>
          <li class="nav-item mb-auto mt-auto">
		     <a href="#" class="nav-link"><form  class="mb-auto mt-auto" method="post"><input type="text" name="search_text" id="search_text" placeholder="Search by Food Name " class="form-control " /></form></a>
		  </li>
		  <li class="nav-item mb-auto mt-auto active ">
          <a class="nav-link" href="index.php">Home

              </a>
        </li>

        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="contact.php">Complain</a>
        </li>

        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="comparing_restaurant.php">Compare Price</a>
        </li>

      </ul>

    </div>

</nav>

         <!--Background-->

         <div class="view" style="background-image: url('C:\xampp\htdocs\GrubHUB\image\restaurant\vendor2@gmail.com'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!--bg end-->

<br><br><br><br>

<div class="middle" style="margin:auto; border:1px solid #F8F9FA;  width:800px;">
       <!-- <ul class="nav nav-tabs nabbar_inverse" id="myTab" style=" background:#ED2553;border-radius:10px 10px 10px 10px;" role="tablist">
          <li class="nav-item">
             <a class="nav-link active" style="color:#BDDEFD;" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="true">Register</a>
          </li>
		  <li class="nav-item">
             <a class="nav-link " id="login-tab" style="color:#BDDEFD;" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Log In</a>
          </li>
       </ul> -->
       <h1 style="color: #ED2553; text-align:center;">Register to Food Heaven!</h1>
	   <br><br>
	   <!--tab 1 starsts-->
	   <div class="tab-content" id="myTabContent">
	       <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="home-tab">
			    <div class="footer" style="color:red;"><?php if(isset($loginmsg)){ echo $loginmsg;}?></div>
          <div class="container1">
          <div class="brand-logo"><img src="MealMingle.png" ></div>
			    <form action="" method="post" enctype="multipart/form-data">
          <div class="input">
                      <div class="form-group">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control" id="name" value="<?php if(isset($r_name)) { echo $r_name;}?>" placeholder="Please Enter Restaurant Name" name="r_name" required/>
                      </div>
	                  <div class="form-group">
                          <label for="name">Email Id:</label>
                          <input type="email" class="form-control" id="email" value="<?php if(isset($email)) { echo $email;}?>" placeholder="Please Enter Email" name="email" required/>
                          <span style="color:red;"><?php if(isset($email_error)){ echo $email_error;} ?></span>
	                  </div>
	                 <div class="form-group">
                         <label for="pswd">Password:</label>
                         <input type="password" class="form-control" id="pswd" placeholder="Please Enter Password" name="pswd" required/>
                     </div>
                     <div class="form-group">
                         <label for="mob">Mobile:</label>
                         <input type="tel" class="form-control"  value="<?php if(isset($mob)) { echo $mob;}?>"id="mob" placeholder="03XXXXXXXXX" name="mob" required/>
                     </div>
	                 <div class="form-group">
                          <label for="phone">Phone:</label>
                          <input type="tel" class="form-control" id="phone" value="<?php if(isset($phone)) { echo $phone;}?>" placeholder="0XX-XXXXXXX" pattern="[0-9]{3}-[0-9]{7}" name="phone" required>
                     </div>
	                 <div class="form-group">
                          <label for="add">Address:</label>
                          <input type="text" class="form-control" id="add" placeholder="Please Enter Address" value="<?php if(isset($address)) { echo $address;}?>" name="address" required>
                     </div>
	                 <div class="form-group">
                          <input type="file"  name="logo" required>Upload Logo
                     </div>
                     <button type="submit" id="register" name="register" class="btn btn-outline-primary">Register</button>
                     </div>
                </form>
</div>
				<br>
			</div>
			<!-- <div class="tab-pane fade show" id="login" role="tabpanel" aria-labelledby="home-tab">
			   <a href="vendor_login.php"><button type="button" style="padding:10px;  width:200px; margin-top:30%; margin-left:40%; margin:0px auto;" class="btn btn-outline-primary" name="login" value="Log In" style="text-align:center;">Log In</button></a>
			   <br><br><br> <br><br><br> <br><br><br><br><br><br> <br><br><br> <br><br><br>
			</div> -->
	   </div>
	</div>
	<br>
	 <?php
			include("footer.php");
			?>
</body>
</html>