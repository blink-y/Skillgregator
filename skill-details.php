<?php

include 'server/connection.php';

if(isset($_GET['skill_id'])){
    $skill_id = $_GET['skill_id'];

    //skill details
    $stmt = $conn->prepare(
        "SELECT * FROM Skills WHERE skill_id = ?"
        )  or die ("Connection failed: " . mysqli_connect_error());
    $stmt->bind_param("i", $skill_id);
    $stmt->execute();
    $skill = $stmt->get_result();

    //educator
    $stmt = $conn->prepare(
        "SELECT e.*, u.username FROM Educators e 
        INNER JOIN Teaching t ON e.educator_id = t.educator_id 
        INNER JOIN Users u ON e.user_id = u.user_id 
        WHERE t.skill_id = ?"
        ) or die ("Connection failed: " . mysqli_connect_error());

    $stmt->bind_param("i", $skill_id);
    $stmt->execute();
    $educator = $stmt->get_result()->fetch_assoc();

    try {
        $stmt = $conn->prepare(
            "SELECT *
            FROM Teaching
            WHERE skill_id = ?"
        );
        $stmt->bind_param("i", $skill_id);
        $stmt->execute();
        $price = $stmt->get_result()->fetch_assoc();
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }

} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>skill-details</title>
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
            
            <!-- <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
        </ul>
        </div>
        </div>
      </nav>

    <!--Product Details-->
    <section class="container single-skill my-5 pt-5">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/imgs/logo.png" id="'mainImg"/>
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/item-1.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/item-1.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/item-1.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/item-1.jpg" width="100%" class="small-img">
                    </div>
                </div>
            </div>
            <?php while ($row = $skill->fetch_assoc()) { ?>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h3 class="py-3"><?php echo $row['skill_name']; ?></h3>
                        <h6 style="color: #111111c0">Instructor: <?php echo $educator['username']; ?></h6>
                        <h6 style="color: #111111c0">Price: $<?php echo $price['price']; ?></h6>
                        <h4 class="mt-3 mb-2">Skill Description</h4>
                        <span><?php echo $row['description']; ?></span>
                        <form method="POST" action ="cart.php">
                            <input type="hidden" name="skill_name" value="<?php echo $row['skill_name']; ?>">
                            <input type="hidden" name="skill_id" value="<?php echo $row['skill_id']; ?>">
                            <input type="hidden" name="instructor" value="<?php echo $educator['username']; ?>">
                            <input type="hidden" name="skill_category" value="<?php echo $row['category']; ?>">
                            <input type="hidden" name="price" value="<?php echo $price['price']; ?>">
                            <button class="buy-btn mt-5" type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                    </div>
            <?php } ?>
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