<?php

include('session_m.php');



if(!isset($login_session)){

header('Location: managerlogin.php'); 

}



?>

<!DOCTYPE html>

<html>



  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    

    <title> Manager | v-Lounge </title>

    

    <link rel="stylesheet" href="add_food_items.css">

    

  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    


    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>



  </head>

  <body>





    <button onclick="topFunction()" id="myBtn" title="Go to top">

      <span class="fa fa-chevron-up"></span>

    </button>

  

  

    <script type="text/javascript">

      window.onscroll = function()

      {

        scrollFunction()

      };



      function scrollFunction(){

        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

          document.getElementById("myBtn").style.display = "block";

        } else {

          document.getElementById("myBtn").style.display = "none";

        }

      }



      function topFunction() {

        document.body.scrollTop = 0;

        document.documentElement.scrollTop = 0;

      }

    </script>



    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">

      <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">

      <span class="navbar-toggler-icon"></span>

      </button><a class="navbar-brand mr-auto" href="index.php"><img src="images/LogoImage.jpg" height="32" width="82"></a>



       <div class="collapse navbar-collapse" id="Navbar">

      <ul class="navbar-nav mr-auto">

   <li class="nav-item"><a class="nav-link" href="index.php"><span class="fa fa-home fa-lg"></span> home</a></li>

   <li class="nav-item"><a class="nav-link" href="aboutus.php"><span class="fa fa-info fa-lg"></span> about</a></li>

   <li class="nav-item"><a class="nav-link" href="contactus.php"><span class="fa fa-address-card fa-lg"></span> contact</a></li>

      </ul>



          <ul class="nav navbar-nav navbar-right">

            <li><a href="#"><span class="fa fa-user"></span> Welcome <?php echo $login_session; ?> </a></li>

            <li class="active"> <a href="managerlogin.php">MANAGER CONTROL PANEL</a></li>

            <li><a href="logout_m.php"><span class="fa fa-sign-out"></span> Log Out </a></li>

          </ul>

        </div>



      </div>

    </nav>









<div class="container">

    <div class="jumbotron">

     <h1>Hello Manager! </h1>

     <p>Manage all of your Canteen from here</p>



    </div>

    </div>

<div class="container">

    <div class="container">

    	<div class="col">

    		

    	</div>

    </div>



    

    	<div class="col-xs-3" style="text-align: center;">



    	<div class="list-group">

    		<a href="mycanteen.php" class="list-group-item ">My Canteen</a>

    		<a href="add_food_items.php" class="list-group-item active">Add Food Items</a>

    		<a href="edit_food_items.php" class="list-group-item ">Edit Food Items</a>

    		<a href="delete_food_items.php" class="list-group-item ">Delete Food Items</a>

    	</div>

    </div>

    





    

    <div class="col-xs-9">

      <div class="form-area" style="padding: 0px 100px 100px 100px;">

        <form action="add_food_items1.php" method="POST">

        <br style="clear: both">

          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> ADD NEW FOOD ITEM HERE </h3>



          <div class="form-group">

            <input type="text" class="form-control" id="name" name="name" placeholder="Your Food name" required="">

          </div>     



          <div class="form-group">

            <input type="text" class="form-control" id="price" name="price" placeholder="Your Food Price (INR)" required="">

          </div>



          <div class="form-group">

            <input type="text" class="form-control" id="description" name="description" placeholder="Your Food Description" required="">

          </div>



          <div class="form-group">

            <input type="text" class="form-control" id="images_path" name="images_path" placeholder="Your Food Image Path [images/<filename>.<extention>]" required="">

          </div>



          <div class="form-group">

          <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> ADD FOOD </button>    

      </div>

        </form>



        

        </div>

      

    </div>

</div>

      <footer class="footer">
    <div class="container">
      
      <div class="row">
        <div class="col-4 col-sm-3">
          <h4>About us</h4>
          <p>Complete online platform for canteen food ordering in college premises. Have your dish received in your hands without queues.</p>
        </div>
        <div class="col-3 col-sm-2">
          <h4>Links</h4>
          <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="col-5 col-sm-4">
          <h4>Our Address</h4>
          <address class="address">Vidyalankar Institute of Technology,<br>
            Vidyalankar Marg,<br>Wadala (E),<br>Mumbai-400 037<br>
            <i class="fa fa-phone"></i>:+9198765XXXXX<br>

          </address>
        </div>
        <div class="col-12 col-sm-3 text-center">
          <h4>Social Media</h4>
          
            <a href="mailto:"><i class="fa fa-envelope"></i></a>
          
          
            <a href="http://www.facebook.com/profile.php?id=">
              <i class="fa fa-facebook"></i></a>
          
          
            <a href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>

          
            <a href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
          
          
            <a href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
      </div>
      </div>
      </div>
      </footer>
      
      
      
      <div class="copyright">
      <div class="container">
      <div class="row justify-content-center">
        <div class="col-auto">
          <p class="p-small">
            © 2020 Vidyalankar Institute of Technology
          </p>
        </div>
      </div>
    </div>
    </div>

  </body>

</html>