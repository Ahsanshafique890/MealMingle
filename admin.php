<?php
session_start();
include("connection.php");
extract($_REQUEST);
  if(isset($login))
  {
	$sql=mysqli_query($con,"select * from tbadmin where fld_username='$username' && fld_password='$pswd' ");
    if(mysqli_num_rows($sql))
	{
	 $_SESSION['admin']=$username;

	header('location:dashboard.php');

	}
	else
	{
	$admin_login_error="Invalid Username or Password";
	}
  }

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
    <title>Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<style>
		ul li{list-style:none;}
		ul li a {color:black; text-decoration:none;}
		ul li a:hover {color:black; text-decoration:none;}

    body{
  margin: 0;
  width: 100vw;
  height: 100vh;
}
    .container1 {
  position: center;
  width: 320px;
  height: 530px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
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

.label, input, button {
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
  border-radius: 50px;
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
          <a class="nav-link" href="contact.php">Complain</a>
        </li>
        <li class="nav-item mb-auto mt-auto">
          <a class="nav-link" href="comparing_restaurant.php">Compare price</a>
        </li>

      </ul>

    </div>

</nav>
<br><br><br><br><br><br>
<h1 style="color: #ED2553; text-align:center;">Welcome! Admin</h1>
<div class="middle" style="  padding:40px; margin:0px auto; width:400px;">
       <!-- <ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:#ED2553;border-radius:10px 10px 10px 10px;" role="tablist">
          <li class="nav-item">
             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Home</a>
          </li>

               <a class="nav-link" id="profile-tab" style="color:white;"    aria-controls="profile" aria-selected="false">Welcome Admin</a>

       </ul> -->
	   <div class="tab-content" id="myTabContent">
	   <!--login Section-- starts-->
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
			    <div class="footer" style="color:red;"><?php if(isset($loginmsg)){ echo $loginmsg;}?></div>
          <div class="container1">
          <div class="brand-logo"><img src="MealMingle.png" ></div>
			  <form method="post" enctype="multipart/form-data">
        <div class="input">
                    <div class="form-group">
                      <label for="email" class="label">Enter Username:</label>
                      <input type="text" class="form-control" name="username" id="email" required/>
                    </div>
                   <div class="form-group">
                      <label for="pwd" class="label">Password:</label>
                     <input type="password" name="pswd" class="form-control" id="pwd" required/>
                   </div><br>

                  <button type="submit" name="login" style="background:#ED2553; border:1px solid #ED2553;" class="btn btn-primary">Login</button><br><br>
                  <button type="reset" name="undo" style="background:#ED2553; border:1px solid #ED2553;" class="btn btn-primary">Clear Form</button>
                  <div class="footer" style="color:red;"><?php if(isset($admin_login_error)) { echo $admin_login_error; }?></div>
                  <div class="footer" style="color:green;"><?php if(isset($_SESSION['pas_update_success'])) { echo $_SESSION['pas_update_success']; }?></div>
                  </div>
                </form>
       </div>
			</div>
			<!--login Section-- ends-->



      </div>
	  </div>
	   <br><br><br><br><br><br><br>
	    <?php
			include("footer.php");
			?>
</body>
</html>
