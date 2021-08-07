<?php

session_start();

require 'connection.php';

$conn = Connect();

if(!isset($_SESSION['login_user2'])){

header("location: customerlogin.php"); 

}

?>



<html>



  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    

    <title> Cart | v-Lounge </title>

    

    <link rel="stylesheet" href="cart.css">

    

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



<?php

if(isset($_SESSION['login_user1'])){



?>





          <ul class="nav navbar-nav navbar-right">

            <li><a href="#"><span class="fa fa-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>

            <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>

            <li><a href="logout_m.php"><span class="fa fa-sign-out"></span> Log Out </a></li>

          </ul>

<?php

}

else if (isset($_SESSION['login_user2'])) {

  ?>

           <ul class="nav navbar-nav navbar-right">

            <li><a href="#"><span class="fa fa-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>

            <li><a href="foodlist.php"><span class="fa fa-cutlery"></span> Food Zone </a></li>

            <li class="active" ><a href="foodlist.php"><span class="fa fa-shopping-cart"></span> Cart

             (<?php

              if(isset($_SESSION["cart"])){

              $count = count($_SESSION["cart"]); 

              echo "$count"; 

            }

              else

                echo "0";

              ?>)

              </a></li>

            <li><a href="logout_u.php"><span class="fa fa-sign-out"></span> Log Out </a></li>

          </ul>

  <?php        

}

else {



  ?>



<ul class="nav navbar-nav navbar-right">

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span> Sign Up <span class="caret"></span> </a>

                <ul class="dropdown-menu">

              <li> <a href="customersignup.php"> User Sign-up</a></li>

              <li> <a href="managersignup.php"> Manager Sign-up</a></li>

              <li> <a href="#"> Admin Sign-up</a></li>

            </ul>

            </li>



            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-sign-in"></span> Login <span class="caret"></span></a>

              <ul class="dropdown-menu">

              <li> <a href="customerlogin.php"> User Login</a></li>

              <li> <a href="managerlogin.php"> Manager Login</a></li>

              <li> <a href="#"> Admin Login</a></li>

            </ul>

            </li>

          </ul>



<?php

}

?>





        </div>



      </div>

    </nav>



    

<?php

if(!empty($_SESSION["cart"]))

{

  ?>

  <div class="container">

      <div class="jumbotron">

        <h1>Your Shopping Cart</h1>

        

      </div>

      

    </div>

    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >

<table class="table table-striped">

  <thead class="thead-dark">

<tr>

<th width="40%">Food Name</th>

<th width="10%">Quantity</th>

<th width="20%">Price Details</th>

<th width="15%">Order Total</th>

<th width="5%">Action</th>

</tr>

</thead>





<?php  



$total = 0;

foreach($_SESSION["cart"] as $keys => $values)

{

?>

<tr>

<td><?php echo $values["food_name"]; ?></td>

<td><?php echo $values["food_quantity"] ?></td>

<td>&#8377; <?php echo $values["food_price"]; ?></td>

<td>&#8377; <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>

<td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger">Remove</span></a></td>

</tr>

<?php 

$total = $total + ($values["food_quantity"] * $values["food_price"]);

}

?>

<tr>

<td colspan="3" align="right">Total</td>

<td align="right">&#8377; <?php echo number_format($total, 2); ?></td>

<td></td>

</tr>

</table>

<?php

  echo '<a href="cart.php?action=empty"><button class="btn btn-danger"><span class="fa fa-trash"></span> Empty Cart</button></a>&nbsp;<a href="foodlist.php"><button class="btn btn-warning">Continue Shopping</button></a>&nbsp;<a href="payment.php"><button class="btn btn-success pull-right"><span class="fa fa-share-alt"></span> Check Out</button></a>';

?>

</div>

<br><br><br><br><br><br><br>

<?php

}

if(empty($_SESSION["cart"]))

{

  ?>

  <div class="container">

      <div class="jumbotron">

        <h1>Your Shopping Cart</h1>

        <h2><a href="foodlist.php">Add more.</a></h2>
        <h2><a href="cart.php">Check Out.</a></h2>

        

      </div>

      

    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <?php

}

?>




<?php





if(isset($_POST["add"]))

{

if(isset($_SESSION["cart"]))

{

$item_array_id = array_column($_SESSION["cart"], "food_id");

if(!in_array($_GET["id"], $item_array_id))

{

$count = count($_SESSION["cart"]);



$item_array = array(

'food_id' => $_GET["id"],

'food_name' => $_POST["hidden_name"],

'food_price' => $_POST["hidden_price"],

'R_ID' => $_POST["hidden_RID"],

'food_quantity' => $_POST["quantity"]

);

$_SESSION["cart"][$count] = $item_array;

echo '<script>window.location="cart.php"</script>';

}

else

{

echo '<script>alert("Products already added to cart")</script>';

echo '<script>window.location="cart.php"</script>';

}

}

else

{

$item_array = array(

'food_id' => $_GET["id"],

'food_name' => $_POST["hidden_name"],

'food_price' => $_POST["hidden_price"],

'R_ID' => $_POST["hidden_RID"],

'food_quantity' => $_POST["quantity"]

);

$_SESSION["cart"][0] = $item_array;

}

}

if(isset($_GET["action"]))

{

if($_GET["action"] == "delete")

{

foreach($_SESSION["cart"] as $keys => $values)

{

if($values["food_id"] == $_GET["id"])

{

unset($_SESSION["cart"][$keys]);

echo '<script>alert("Food has been removed")</script>';

echo '<script>window.location="cart.php"</script>';

}

}

}

}



if(isset($_GET["action"]))

{

if($_GET["action"] == "empty")

{

foreach($_SESSION["cart"] as $keys => $values)

{



unset($_SESSION["cart"]);

echo '<script>alert("Cart is made empty!")</script>';

echo '<script>window.location="cart.php"</script>';



}

}

}





?>

<?php



?>

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