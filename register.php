<?php

include 'server/connection.php';
session_start();

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $userType = $_POST['user-type'];

    if ($password !== $confirmPassword) {
        header('Location: register.php?error=Passwords do not match');
    } else if (strlen($password) < 8) {
        header('Location: register.php?error=Password must be at least 8 characters');
    } else {
        // Check for existing user
        $stmt = $conn->prepare("SELECT count(*) FROM Users WHERE username = ? OR email = ?") or die("Connection failed: " . mysqli_connect_error());
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->bind_result($num_rows);
        $stmt->store_result();
        $stmt->fetch();
        if ($num_rows > 0) {
            header('Location: register.php?error=Username or email already exists');

        } else {
            $stmt = $conn->prepare("INSERT INTO Users (username, email, password, user_type) VALUES (?, ?, ?, ?)") or die("Connection failed: " . mysqli_connect_error());
            $stmt->bind_param("ssss", $username, $email, md5($password), $userType);
            
            if($stmt->execute()){
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $stmt->insert_id;
                $_SESSION['email'] = $email;
                $_SESSION['user_type'] = $userType;
                $_SESSION['logged_in'] = true;

                if ($userType == 'educator') {
                    $stmt = $conn->prepare("INSERT INTO Educators (user_id, full_name) VALUES (?,?)") or die("Connection failed: " . mysqli_connect_error());
                    $stmt->bind_param("is", $_SESSION['user_id'], $fullname);
                    $stmt->execute();
                } else if ($userType == 'learner'){
                    $stmt = $conn->prepare("INSERT INTO Learners (user_id, full_name) VALUES (?,?)") or die("Connection failed: " . mysqli_connect_error());
                    $stmt->bind_param("is", $_SESSION['user_id'], $fullname);
                    $stmt->execute();
                } else {
                    header('Location: register.php?error=Invalid user type');
                }

                header('Location: account.php?success=Registration successful');
            } else {
                header('Location: register.php?error=Registration failed. Please try again in an eternity.');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

    <!--Register-->
      <section class="my-5 py-5">
        <div class="contaienr text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="reg-form" method="POST" action="register.php">
                <p style="color: red"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="reg-username" name="username" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <label>Full name</label>
                    <input type="text" class="form-control" id="reg-fullname" name="fullname" placeholder="Full Name" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="reg-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="reg-password" name="password" placeholder="Password" required>
                </div> 
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="reg-confirm-password" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <label>User Type</label>
                    <div class="custom-btn">
                        <label>
                            <input type="radio" id="learner-btn" name="user-type" value="learner" checked>
                            Learner
                        </label>
                        <label>
                            <input type="radio" id="educator-btn" name="user-type" value="educator">
                            Educator
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="reg-btn" name="register" value="Register">
                </div>
                <div class="form-group">
                    <a id="reg-url" class="btn" href="login.html"> Do you have an account? Login</a>
                </form>
                </div>
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