<?php
 session_start();

 if( !empty($_SESSION['cart'] && isset($_POST['checkout']))){

 } else {
        header("Location: index.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css"/>
<body style="background-color: #F0EDCF;">

    <!--Navigation-Bar-->
    <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top" style="background-color: #111111">
        <div class="container">
            <a href="index.php">
                <img class="logo" src="assets/imgs/logo.png" />
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto">
            
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="Skills.php">Skills</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Cart</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="account.php">Account</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
        </ul>
        </div>
        </div>
      </nav>

      <!--Checkout-->
      <section class="my-5 py-5">
        <div class="contaienr text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Checkout</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" action="server/place_order.php" method="POST">
                <div class="form-group checkout-small-element">
                    <label>Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Phone</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required>
                </div> 
                <div class="form-group checkout-small-element">
                    <label>City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required>
                </div>
                <div class="form-group checkout-large-element">
                    <label>Adress</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required>
                </div>
            
                <div class="form-group checkout-btn-container">
                    <p> Total Amount: $ <?php echo $_SESSION['total']; ?></p>
                    <input type="submit" class="btn" id="checkout-btn" value="Place Order" name="place_order">
                </div>
            </form>
        </div>

      </section>

      <!--footer-->
      <footer class="mt-5 py-5" style="background-color: #111111">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img class="logo" src="assets/imgs/logo.png"/>
                <p class="pt-3" style="color: #fff">One stop for all the skills you want to master</p>
              </div>
              <div class="footer-one col-lg-3 col-md-6 col-sm-12 " style="color: #fff">
                  <h5 class="pb-2">Featured</h5>
                  <ul class="text-uppercase">
                      <li><a href='#'>Explore</a></li>
                      <li><a href='#'>Skills</a></li>
                      <li><a href='#'>Contact us</a></li>
                      
                  </ul>
              </div>
              <div class="footer-one col-lg-3 col-md-6 col-sm-12" style="color: #F0EDCF">
                  <h5 class="pb-2">Contact Us</h5> 
                  <div>
                      <h6 class="text-uppercase">Address</h6>
                      <p>Sessame Street</p>
                  </div>
                  <div>
                      <h6 class="text-uppercase">Phone</h6>
                      <p>911</p>
                  </div>
                  <div>
                      <h6 class="text-uppercase">Email</h6>
                      <p>customerservice@Skillgregator.com</p>
                  </div>
              </div> 


          </div>
      </footer>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>