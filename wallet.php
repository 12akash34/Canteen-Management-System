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
    
    <title> Wallet | v-Lounge </title>
    
    <link rel="stylesheet" href="wallet.css">
    
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
   <li class="nav-item active"><a class="nav-link" href="index.php"><span class="fa fa-home fa-lg"></span> home</a></li>
   <li class="nav-item"><a class="nav-link" href="aboutus.php"><span class="fa fa-info fa-lg"></span> about</a></li>
   <li class="nav-item"><a class="nav-link" href="contactus.php"><span class="fa fa-address-card fa-lg"></span> contact</a></li>
      </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="fa fa-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="mycanteen.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="fa fa-sign-out"></span> Log Out </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="fa fa-user"></span> Welcome <?php 
            $username=$_SESSION['login_user2'];
            echo $username; ?> </a></li>
            <li><a href="foodlist.php"><span class="fa fa-cutlery"></span> Food Zone </a></li>
            <li><a href="cart.php"><span class="fa fa-shopping-cart"></span> Cart
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
    
  $gtotal = 0;
    foreach($_SESSION["cart"] as $keys => $values)
      {
        
        $price =  $values["food_price"];
     $quantity = $values["food_quantity"]; 
     $total = ($values["food_quantity"] * $values["food_price"]);
     $gtotal = $gtotal + $total;}
    ?>
    
    <header class="jumbotron"><h2> WALLET </h2></header>
      <div class="container">
        <div class="row justify-content-center">
           
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> YOUR ORDER </h3>


  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>

        <th> Balance </th>
       
        <th> Order Price </th>
      </tr>
    </thead>


  <tbody>
    <tr>
     
      
      <td><?php
    //Be sure to include the Wallet class in your script
    require_once 'wallet_class/Wallet.php';

    $frontWallet	= new Wallet();

    //Now you are ready to use your wallet, just supply the relevant parameters
    try{

        $table1			= 'wallet_in'; 						//can't be NULL
        $table2			= 'wallet_out'; 					//can't be NULL
        $where_values	= array('username'=>"$username"); 			//For For more than one items use array('userId'=>'2','code'=>'Txn_4545');
        $fields_values  = array('amount');					//Focus on the amount field use array('amount');

        $results		=	$frontWallet->walletBalance($table1,$table2, $where_values, $fields_values);

        //Read
        //If you have your Currency loaded do this:-
        $currency	=	'₹'; //Load this
        echo($currency.' '.$results);

    }
    catch (WalletException $e)
    {
        echo "Wallet error : ".$e->getMessage();
    }

    //Yeah you did it!!! ?></td>
      <td><?php 
      
      echo "$gtotal"; ?></td>
    </tr>
  </tbody>
  
  </table>
    <br>

        
       
        <a href="bill.php"><button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> PAY 
        
        </button></a>
  
      </div>
      </div>
      
      
          <div class="container">
      <div class="row justify-content-center">
 
          <h3 style="margin-bottom: 20px; text-align: center; font-size: 25px;"> YOUR WALLET TOP UP </h3>


<?php




// Storing Session
$sql = "SELECT * FROM wallet_in WHERE username='$username' ORDER BY time";
$result = mysqli_query($conn,$sql);


if(mysqli_num_rows($result) > 0)
{

  ?>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
       <th> Code </th>
        <th> Top-Up amount </th>
        
        <th> Time </th>
        
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td><?php echo $row["code"]; ?></td>
      <td><?php echo $row["amount"]; ?></td>
      
      <td><?php echo $row["time"]; ?></td>
    </tr>
  </tbody>
  
  <?php } ?>
  </table>
    <br>


  <?php } else { ?>

  <h4><center>0 RESULTS</center> </h4>

  <?php } ?>

        
        </div>
        
        <div class="row justify-content-center">
 
          <h3 style="margin-bottom: 20px; text-align: center; font-size: 25px;"> YOUR WALLET DEDUCTION </h3>


<?php




// Storing Session
$sql = "SELECT * FROM wallet_out WHERE username='$username' ORDER BY time";
$result = mysqli_query($conn,$sql);


if(mysqli_num_rows($result) > 0)
{

  ?>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
      
        <th> Code </th>
          <th> Amount Deducted </th>
        <th> Time </th>
        
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
       <td><?php echo $row["code"]; ?></td>
      <td><?php echo $row["amount"]; ?></td>
     
      <td><?php echo $row["time"]; ?></td>
    </tr>
  </tbody>
  
  <?php } ?>
  </table>
    <br>


  <?php } else { ?>

  <h4><center>0 RESULTS</center> </h4>

  <?php } ?>

        
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