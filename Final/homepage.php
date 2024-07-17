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
      <p>Choose from the type of drawings the artist offers to secure a slot. The artist will reach out to you via email for the specifics of your commission.</p>
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
            <h2>Tale of Two Brothers</h2>
            <p>The dread-inspiring twin vampires wield unparalleled dominion over the village they call home, their menacing presence instilling such deep-seated fear that the villagers are compelled to obey their every command.</p>
          </div>
          <div class="project-img">
            <img src="..\Images\project001.png" alt="img-1">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 2</h1>
            <h2>Lady Innamorata</h2>
            <p>In the shadows of night, she prowls with an allure that bewitches and ensnares. Her charisma is a web, spun to entice and dominate. Men, drawn like moths to a flame, succumb to her seduction, unaware of the price: their souls, drained to extend her immortal life.</p>
          </div>
          <div class="project-img">
            <img src="..\Images\project002.png" alt="img-2">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 3</h1>
            <h2>Matthias Doyle</h2>
            <p>He came  from  a  lineage  of  demonic  blades  ,  recognized  to  be  the  most  powerful  in  his  kin  since  he  can  easily  morph  into  any  weapon  his  user  desires  .  High  ranking  demons  in  the  fourth  circle  of  hell  wielded  him  with  pride  ,  always  being  rewarded  with  victory  .  despite  all  that  ,  he  was  never  taken  care  of  and  this  caused  him  to  nearly  break  .  after  the  said  incident  ,  he  refuses  to  be  wielded  again  .  he  roams  the  land  amongst  humans  ,  teaching  himself  how  to  morph  into  other  species  .
            </p>
          </div>
          <div class="project-img">
            <img src="..\Images\project003.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 4</h1>
            <h2>The Burning Cathedral</h2>
            <p>This is a sketch. Driven mad by relentless devotion, the priest's fervor transformed into a consuming blaze of fanaticism. In a sacrificial frenzy, he set ablaze the sacred sanctuary he once worshipped in, offering its destruction as a twisted homage to his god.</p>
          </div>
          <div class="project-img">
            <img src="..\Images\project004.png" alt="img-4">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Project 5</h1>
            <h2>A Piece on Suffocation</h2>
            <p>In the depths of her creative turmoil, the struggling artist's pencil traced lines of suffocating despair onto the canvas. Each stroke captured the weight of her emotions, weaving a haunting self-portrait where shadows coiled around her like relentless chains, symbolizing the suffocation she felt in her darkest moments. Through art, she found solace in expressing the unspoken depths of her inner struggle.</p>
          </div>
          <div class="project-img">
            <img src="..\Images\project005.png" alt="img-5">
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
        <h1 class="section-title">The <span>Bird Cage</span></h1>
        <h2>An Artist's Online Store</h2>
        <p>The Birdhouse is an online store showcasing the artistic works of Cranes, an aspiring digital artist. Specializing in horror and fanart, the store features a curated selection of her original pieces alongside fanart. The store is also open to taking commissions.
        </p>
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