<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css"/>
<body style="background-color: #F0EDCF;">

    <!--Navigation-Bar-->
    <nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top" style="background-color: #111111">
        <div class="container">
            <a href="index.html">
                <img class="logo" src="assets/imgs/logo.png" />
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto">
            
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="Skills.html">Skills</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="cart.html">Cart</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="account.html">Account</a>
            </li>
            
            <!-- <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            <li class="nav-item">
              <a class="nav-link" href="login.html">Login</a>
            </li>
        </ul>
        </div>
        </div>
      </nav>

      <!--Cart-->
      <section class="cart container mt-5 mb-5 pt-5 pb-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Cart</h2>
            <hr>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Sub Total</th>
            </tr>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/item-1.jpg">
                        <div>
                            <p>Skill Name</p>
                            <small><span>$</span>Price</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number" value="1"/>
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price">Price</span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/item-1.jpg">
                        <div>
                            <p>Skill Name</p>
                            <small><span>$</span>Price</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number" value="1"/>
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price">Price</span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/item-1.jpg">
                        <div>
                            <p>Skill Name</p>
                            <small><span>$</span>Price</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number" value="1"/>
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price">Price</span>
                </td>
            </tr><tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/item-1.jpg">
                        <div>
                            <p>Skill Name</p>
                            <small><span>$</span>Price</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number" value="1"/>
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price">Price</span>
                </td>
            </tr>
        </table>
        <div class="cart-total">
            <table>
                <tr>
                    <td>
                        Subtotal
                    </td>
                    <td>
                        $ Total
                    </td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>$ Total</td>
                </tr>
            </table>
        </div>

        <div class="checkout-container">
            <button class="checkout-btn">Checkout</button>
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