<!DOCTYPE html>
<html lang="en">
<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");


?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style\style.css">
  <title>The Bird Cage</title>
  <link rel="icon" type="image/x-icon" href="..\Images\paper crane.png">
</head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1><span>T</span>he <span>B</span>ird <span>C</span>age</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="#hero" data-after="Home">Home</a></li>
            <li><a href="#services" data-after="Service">Services</a></li>
            <li><a href="homepage.php #about" data-after="About">About</a></li>
            <li><a href="profile.php" data-after="Profile">Profile</a></li>
            <li><a href="logout.php" data-after="Logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>game developer<span></span></h1>
        <h1>and digital artist <span></span></h1>
        <h1 style="font-size:6.8vw" ><b>C R A N E S</b> <span></span></h1>
        <a href="#projects" type="button" class="cta">Artist Portfolio</a>
      </div>
    </div>
  </section>
  <!-- End Hero Section  -->

   <!-- Services Section -->
<section id="services">
  <div class="services container">
    <div class="service-top">
      <h1 class="section-title">COMM<span>I</span>SSIONS</h1>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
    </div>
    <div class="service-bottom">
      <?php
      // database connection code
      $con = mysqli_connect('localhost', 'root', '', 'birdcage');

      // database insert SQL code
      $sql = "SELECT * FROM product";

      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
         ?>
          <div class="service-item">
            <?php echo '<img src="'.$row["img"]. '" />'?>
            <h2><?php echo $row["item_name"];?></h2>
            <p><?php echo $row["description"];?></p>
            <p style="font-size:2em">Price: $<?php echo $row["price"];?></p><br>
            <a href="add_to_cart.php?id=<?php echo $row["item_id"]; ?>" class="cta">Add to Cart</a>
          </div>
          <?php
        }
      } else {
        echo "0 results";
      }
      $con->close();
     ?>
    </div>
  </div>
  <a href="checkout.php" class="cta">Checkout</a>
</section>
<!-- End Services Section -->
 
  <!-- Projects Section -->
  <body class="other-pages">
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Cranes' <span>Portfolio</span></h1>
      </div>
      <div class="all-projects">
        <div class="project-item">
          <div class="project-info">
            <h1>Project 1</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="..\Images\img-1.jpg" alt="img-1">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 2</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="..\Images\img-2.jpg" alt="img-2">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 3</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="..\Images\img-3.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 4</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="..\Images\img-4.jpg" alt="img-4">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 5</h1>
            <h2>Coding is Love</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad, iusto cupiditate voluptatum impedit unde
              rem ipsa distinctio illum quae mollitia ut, accusantium eius odio ducimus illo neque atque libero non sunt
              harum? Ipsum repellat animi, fugit architecto voluptatum odit et!</p>
          </div>
          <div class="project-img">
            <img src="..\Images\img-5.jpg" alt="img-5">
          </div>
        </div>
      </div>
    </div>
  </section>
  </body>
  <!-- End Projects Section -->

  <!-- About Section -->
  <body class="other-pages">
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img"> 
          <img src="..\Images\about_img.png" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">About <span>me</span></h1>
        <h2>Front End Developer</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores, velit alias eius non illum beatae atque
          repellat ratione qui veritatis repudiandae adipisci maiores. At inventore necessitatibus deserunt
          exercitationem cumque earum omnis ipsum rem accusantium quis, quas quia, accusamus provident suscipit magni!
          Expedita sint ad dolore, commodi labore nihil velit earum ducimus nulla quae nostrum fugit aut, deserunt
          reprehenderit libero enim!</p>
        <a href="..\File\resume.pdf" class="cta" download="resume.pdf" target="_blank">Download Resume</a>
        <a href="contact.php" class="cta">Contact Me</a>
      </div>
    </div>
  </section>
  </body>
  <!-- End About Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <p>JANNA MARI ELEMEN</p>
    </div>
  </section>
  <!-- End Footer -->
  <script src="js/app.js"></script>
</body>

</html>