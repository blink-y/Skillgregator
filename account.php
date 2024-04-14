<?php

include 'server/connection.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit();
}

if(isset($_GET['logout'])){
    if (isset($_SESSION['logged_in'])) {
        
        unset($_SESSION['logged_in']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);

        unset($_SESSION['user_type']);
        header('Location: login.php');
        exit();
    }
}

if(isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['ConfirmPassword'];

    if ($password !== $confirmPassword) {
        header('Location: account.php?error=Passwords do not match');
    } else if (strlen($password) < 8) {
        header('Location: account.php?error=Password must be at least 8 characters');
    } else {
        $stmt = $conn->prepare("UPDATE Users SET password = ? WHERE email = ?") or die("Connection failed: " . mysqli_connect_error());
        $stmt->bind_param("ss", md5($password), $_SESSION['email']);
        if ($stmt->execute()) {
            header('Location: account.php?message=Password changed successfully');
        } else {
            header('Location: account.php?error=Password change failed. Please try again later.');
        }
    }
}

if(isset($_POST['change_lg_sl'])) {
    $learning_goals = $_POST['LearningGoals'];
    $skill_level = $_POST['skill-lvl'];

    $stmt = $conn->prepare("SELECT * FROM Learners WHERE user_id = ?") or die("Connection failed: " . mysqli_connect_error());
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO Learners (user_id, learning_goals, current_skill_level) VALUES (?, ?, ?)") or die("Connection failed: " . mysqli_connect_error());
        $stmt->bind_param("iss", $_SESSION['user_id'], $learning_goals, $skill_level);
        if ($stmt->execute()) {
            header('Location: account.php?message=Learning goals and skill level updated successfully');
        } else {
            header('Location: account.php?error=Learning goals and skill level update failed. Please try again later.');
        }
    } else {
        $stmt = $conn->prepare("UPDATE Learners SET learning_goals = ?, current_skill_level = ? WHERE user_id = ?") or die("Connection failed: " . mysqli_connect_error());
        $stmt->bind_param("ssi", $learning_goals, $skill_level, $_SESSION['user_id']);
        if ($stmt->execute()) {
            header('Location: account.php?message=Learning goals and skill level updated successfully');
        } else {
            header('Location: account.php?error=Learning goals and skill level update failed. Please try again later.');
        }
    }
}
if(isset($_POST['add_ed_ex'])) {
    $ed_background = $_POST['EdBackground'];
    $experiences = $_POST['Experiences'];

    $stmt = $conn->prepare("SELECT * FROM Educators WHERE user_id = ?") or die("Connection failed: " . mysqli_connect_error());
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO Educators (user_id, education_background, experience) VALUES (?, ?, ?)") or die("Connection failed: " . mysqli_connect_error());
        $stmt->bind_param("iss", $_SESSION['user_id'], $ed_background, $experiences);
        if ($stmt->execute()) {
            header('Location: account.php?message=Educational background and experiences updated successfully');
        } else {
            header('Location: account.php?error=Educational background and experiences update failed. Please try again later.');
        }
    } else {
        $stmt = $conn->prepare("UPDATE Educators SET education_background = ?, experience = ? WHERE user_id = ?") or die("Connection failed: " . mysqli_connect_error());
        $stmt->bind_param("ssi", $ed_background, $experiences, $_SESSION['user_id']);
        if ($stmt->execute()) {
            header('Location: account.php?message=Educational background and experiences updated successfully');
        } else {
            header('Location: account.php?error=Educational background and experiences update failed. Please try again later.');
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
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

      <!--Account-->
    </head>
    <body>
          <section class="my-5 py-5">
            <div class="row container mx-auto">
                <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                    <h3 class="font-weight-bold">Account Info</h3>
                    <hr class="mr-auto">
                    <div class="account-info">
                        <p>Name: <span> <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?> </span></p>
                        <p>Email: <span> <?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?> </span></p>
                        <p>User Type: <span><?php echo $_SESSION['user_type'];?></span></p>
                        <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <form id="account-form" method="POST" action="account.php">
                        <h3>Change Password</h3>
                        <hr class="mx-auto">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="account-password" name="password" placeholder="password" required/>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="account-confirm-password" name="ConfirmPassword" placeholder="Confirm Password" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Change Password" class="btn" id="change-pass-btn" name="change_password"/>
                        </div>
                        <p class="text-center" style="color: red"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                        <p class="text-center" style="color: green"><?php if(isset($_GET['message'])){echo $_GET['message'];}?></p>
                    </form>
                </div>
            </div>
            <!-- Need to Add functionality -->
            <div>
            <?php
                // Only Visible to Learners
                if ($_SESSION['user_type'] == 'learner') {
                    //FIXME: Formatting
                    echo '
                    <form id="account-form-learner" method="POST" action="account.php">
                        <h3>Change Learning Goals</h3>
                        <hr class="mx-auto">
                        <div class="h-50 w-70 mr-20 text-align: center">
                            <input type="text" class="h-50 w-50" id="account-learning-goals" name="LearningGoals" placeholder="Learning goals" style="margin-bottom: 20px;" required/>
                            <h3>Current Skill Level</h3>
                            <hr class="mx-auto">
                            <div class="custom-btn">
                                <label>
                                    <input type="radio" id="beginner-btn" name="skill-lvl" value="Beginner" checked>
                                    Beginner
                                </label>
                                <label>
                                    <input type="radio" id="novice-btn" name="skill-lvl" value="Novice">
                                    Novice
                                </label>
                                <label>
                                    <input type="radio" id="intermediate-btn" name="skill-lvl" value="Intermediate">
                                    Intermediate
                                </label>
                                <label>
                                    <input type="radio" id="advanced-btn" name="skill-lvl" value="Advanced">
                                    Advanced
                                </label>
                            </div>
                            <input type="submit" value="Save Changes" class="btn" id="change-lg-sk-btn" name="change_lg_sl" style="margin-top: 10px; margin-bottom: 20px;">
                        </div>
                    </form>';
                    
                } else if($_SESSION['user_type'] == 'educator'){
                    //Only Visible to Educators
                    echo '
                    <form id="account-form-educator" method="POST" action="account.php">
                        <h3>Add Educational Background</h3>
                        <hr class="mx-auto">
                        <div class="h-50 w-70 mr-20 text-align: center">
                            <input type="text" class="h-50 w-50" id="account-ed-background" name="EdBackground" placeholder="Enter Educational Background" style="margin-bottom: 20px;" required/> 
                        </div>
                        <h3>Add Experiences</h3>
                        <hr class="mx-auto">
                        <div class="h-50 w-70 mr-20 text-align: center">
                            <input type="text" class="h-50 w-50" id="account-experiences" name="Experiences" placeholder="Enter Experiences" style="margin-bottom: 20px;" required/>
                        </div>
                        <input type="submit" value="Save Changes" class="btn" id="add-ed-ex" name="add_ed_ex" style="margin-top: 10px; margin-bottom: 20px;">
                    </form>';
                }
            ?>
            </div>
          </section>
    </body>
    </html>


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