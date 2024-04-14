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

      <!--Home-->
      <section id="home">
        <div class="container">
            <h5>Welcome to</h5>
            <h1>Skillgregator</h1>
            <p><span>"Skillgregator, the epitome of human progress and empowerment, stands as a shining beacon in the realm of skill acquisition and personal growth. It is a sanctuary where dreams are nurtured, passions are ignited, and the uncharted territories of human potential are explored. Skillgregator is not merely a platform; it is an extraordinary catalyst that has revolutionized the way we learn and develop ourselves.
                    At its core, Skillgregator thrives on the profound belief that every person possesses a unique gift waiting to be discovered. It celebrates the diversity of human potential, enabling individuals to weave their own narratives of success and fulfillment. By providing an expansive repertoire of easy-to-learn skills, Skillgregator empowers individuals to transcend their limitations, break free from self-imposed boundaries, and embark on a transformative journey of self-discovery.
            "</span><span style="font-weight: 400; font-style: italic;">- said literally no one ever</span></p>
            <a href="Skills.php"><button style="width: 150px">Explore Skills</button></a>
        </div>
      </section>


      <!--Recommendation-->
      <section id="recom">
        <h1 class="recom-title">Recommendations</h1>
        <hr class="m-4">
        <div class="row p-0 m-0 justify-content-center d-flex">
        <?php include 'server/get_explore_skills.php'; ?>
        <?php while($row = $recom_skills->fetch_assoc()): ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="<?php echo "skill-details.php?skill_id=".$row['skill_id'];?>">
                    <img class="img-fluid" src="assets/imgs/item-1.jpg" alt="Image 1"/>
                    <p class="text-center mt-2" style="color: black"><?php echo $row['skill_name']?></p>
                </a>
            </div>
           
        <?php endwhile ?>
        </div>
      </section>

      <!--Explore-->
      <section id="new" class="w-100">
        <div class="title">
            <h1>Explore</h1>
            <h5>Find out your new passion</h5>
            <hr class="m-4">
        </div>

        <div class="row p-0 m-0">
        <?php include 'server/get_explore_skills.php'; ?>
        <?php while($row = $explore_skills->fetch_assoc()): ?>
                <div class="one col-lg-4 col-md-6 col-sm-12 p-0">
                    <img class="img-fluig" src="assets/imgs/item-1.jpg"/>
                    <div class="details">
                        <h2> <?php echo $row['category']; ?> </h2>
                        <a href="<?php echo "skill-category.php?category=".$row['category'];?>"><button class="text-uppercase" style="width:150px">Learn more</button></a>
                    </div>
                </div>
        <?php endwhile ?>
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