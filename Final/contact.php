<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style\style.css">
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
            <li><a href="homepage.php" data-after="Home">Home</a></li>
            <li><a href="homepage.php #services" data-after="Service">Services</a></li>
            <li><a href="homepage.php #about" data-after="About">About</a></li>
            <li><a href="profile.php" data-after="Profile">Profile</a></li>
            <li><a href="logout.php" data-after="Logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

  <!-- Contact Us -->
<div class="container">
  <section id="contact">
    <div class="contact-box">
    <h1 class="section-title">CONTACT <span>ME</span></h1>
      <form class="contact-form">
        <div class="form-group">
          <div class="half-input">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
          </div>
          <div class="half-input">
            <br><label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
          </div>
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea id="message" name="message" required rows="10" cols="500"></textarea>
        </div>
        <button class="cta" type="submit">Send Message</button>
      </form>
      <div class="social-links">
  <a href="https://www.facebook.com" target="_blank" class="social-btn">
    <button>Facebook</button>
  </a>
  <a href="https://www.instagram.com" target="_blank" class="social-btn">
    <button>Instagram</button>
  </a>
  <a href="https://www.youtube.com" target="_blank" class="social-btn">
    <button>YouTube</button>
  </a>
  <a href="https://www.twitter.com" target="_blank" class="social-btn">
    <button>Twitter</button>
  </a>
</div>
        </a>
      </div>
    </div>
  </section>
</div>

</body>
</html>