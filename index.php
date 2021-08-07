<?php
session_start();
?>

<html>

  <head>
    
     <title> Home | v-Lounge </title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <link rel="stylesheet" href="index.css">
    
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
            <li><a href="#"><span class="fa fa-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
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
              
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-sign-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Manager Login</a></li>
             
            </ul>
            </li>
          </ul>

<?php
}
?>
       </div>

      </div>
    </nav>

     <div class="container">
      <div class="row row-content">
        <div class="col">
          <div id="mycarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="images/slide1.jpg" alt="slide1">
                
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/slide2.jpg" alt="slide2">
                
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/slide3.jpg" alt="slide3">
                
              </div>
              
            </div>
            <ol class="carousel-indicators">
                <li data-target="mycarousel" data-slide-to="0" class="active"></li>
                <li data-target="mycarousel" data-slide-to="1"></li>
                <li data-target="mycarousel" data-slide-to="2"></li>
              </ol>
              <a class="carousel-control-prev" href="#mycarousel" role="button" data-slode="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
                <button class="btn btn-danger btn-sm" id="carouselButton">
                  <span class="fa fa-pause"></span>
                </button>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="orderblock">
    <h2>Feeling Hungry?</h2>
    <center><a class="btn btn-success btn-lg" href="customerlogin.php" role="button" > Order Now </a></center>
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
 
 <script>
  $(document).ready(function() {
    $('#mycarousel').carousel({interval:2000});
    $('#carouselButton').click(function(){
    if($('#carouselButton').children('span').hasClass('fa-pause')){
      $('#mycarousel').carousel('pause');
      $('#carouselButton').children('span').removeClass('fa-pause');
      $('#carouselButton').children('span').addClass('fa-play');
      }
      else if($('#carouselButton').children('span').hasClass('fa-play')){
      $('#mycarousel').carousel('cycle');
      $('#carouselButton').children('span').removeClass('fa-play');
      $('#carouselButton').children('span').addClass('fa-pause');
      }
      });
      });
</script>
 
</body>
</html>