<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>VermiWeb</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <!--ICONS-->
    <script src="https://kit.fontawesome.com/6ad1a3c168.js" crossorigin="anonymous"></script>
    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Mulish:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!--CSS FILE-->
    <link rel="stylesheet" href="index.css">
  </head>

  <body>
    <!-------------------------------------------------- NAVBAR AND TITLE SECTION ---------------------------------------------------------->
    <section id="title">
      
    <!--NAV BAR-->
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-style">
        <img src="images/vmwlogo.png" alt="logo.png" class="logo-style"><a href="index.php" class="navbar-brand">VermiWeb</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav ml-auto">
            <li class="nav-list active">
              <a class="nav-link links" href="#title">Home</a>
            </li>
            <li class="nav-list active">
              <a class="nav-link links" href="#testimonials">Vermicomposting</a>
            </li>
            <li class="nav-list active">
              <a class="nav-link links" href="#about">About Us</a>
            </li>
            <li class="nav-list active">
              <a class="nav-link links" href="#footer">Contact Us</a>
            </li>
            <button onclick="location.href='loginpage.php'" type="button" class="btn btn-outline-light btn-lg links-button">Log In</button>
          </ul>
        </div>
      </nav>

      <!--TITLE-->
      <div class="row">
        <div class="col-lg-6 col-m-12 col-sm-12 title-texts">
          <div>
            <h1 class="title-description">Building a better future with Vermicomposting</h1>
            <p class="title-subdescription">Vermicomposting: Turning Trash into Treasure, One Worm at a Time.</p>
          </div>
        </div>
        <div class="col-lg-6 col-m-12 col-sm-12">
          <img class="title-image" src="images/vermipic.png" alt="vermiworms.png">
        </div>
      </div>
    </section>

    <!------------------------------------------------ ABOUT VERMICOMPOSTING SECTION ------------------------------------------------------>
    <section id="testimonials">
      <h1 class="testimonials-header">Let's Change the World with Vermicomposting</h1>
      <div id="carousel-slide-1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/pov_one.jpg" alt="vermicomposting.jpg" class="vermione-img">
            <h2 class="testimonial-text">Vermicomposting is a method of composting that uses worms, typically red wigglers, to break down organic waste into nutrient-rich compost. The process is done in a container, called a worm bin, where the worms live and eat the organic waste. The worms' gut action, along with the microorganisms that live on the worms and in the bin, decompose the organic materials. The worms consume the organic matter and convert it into a nutrient-rich soil amendment, called vermicompost, which can be used in gardens, farms and other green spaces. Vermicomposting is an efficient way to process kitchen scraps, yard trimmings, and other organic waste into nutrient-rich compost that can be used to enrich soil and grow healthier plants.</h2>
            <h6 class="testimonial-author">Dr. Clive Edwards, professor of Environmental Microbiology and director of the Composting and Vermiculture Technology Center at Ohio State University</h6>
          </div>
          <div class="carousel-item">
            <img src="images/pov_two.webp" alt="vermicomposting.jpg" class="vermione-img">
            <h2 class="testimonial-texttwo">This method is suitable for small-scale and backyard composting, as well as for large-scale commercial composting operations. Vermicomposting is a relatively easy and low-maintenance process that can be done indoors or outdoors. It also helps to reduce the amount of waste sent to landfills, as well as reduces the amount of greenhouse gases produced by decomposing waste in landfills.</h2>
            <h6 class="testimonial-authortwo">Dr. Peter Bogdanov, a retired professor of Environmental Science and Engineering at the University of California, Los Angeles.</h6>
          </div>
        </div>
        <a class="carousel-control-prev" role="button" href="#carousel-slide-1" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" role="button" href="#carousel-slide-1" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <section id="about"></section>
    </section>


    <!-------------------------------------------------------------- ABOUT US SECTION ----------------------------------------------------->
    <section id="about">
      <div class="row">
        <div class="col-lg-6 section-col">
          <img class="about-image" src="images/about.png" alt="vermiteam.png">
        </div>
        <div class="col-lg-6">
          <div class="about-div">
            <h1 class="about-header">About Us</h1>
            <p class="about-body">The researchers held that vermicomposting is a potent and long-lasting method of reducing waste and enhancing soil health. They contend that we may create nutrient-rich compost from our kitchen scraps and yard garbage by using worms to decompose organic materials. This compost can be utilized to feed gardens, farms, and other green places. By making a commitment to vermicomposting, we can not only cut down on the amount of garbage we send to landfills but also improve the quality of the environment for coming generations.</p>
            <p class="about-body">In addition, the strong belief that harnessing the potential of vermicomposting not only benefits the environment but also ensures a sustainable future for everyone. The general health and well-being of our communities can be enhanced by enhancing our soil and producing healthier plants. Vermicomposting is an easy and efficient way to improve the environment and pave the way for a cleaner, greener, and more sustainable future for humanity. The researchers advised beginning slowly and committing to vermicomposting one worm bin at a time.</p>
            <p class="about-body last-body">"Vermicomposting is the ultimate recycling system. The worms do the work for you, turning kitchen scraps and yard waste into rich, fertile soil."― Unknown</p>
          </div>
        </div>
      </div>
    </section>

    <!-------------------------------------------------------------- FOOTER SECTION ------------------------------------------------------->
    <footer id="footer">
      <div class="row">
        <div class="col-lg-6 col-m-12 col-sm-12 footer-left">
          <h2 class="footer-header">
            <img src="images/vmwlogo.png" alt="logo.png" class="footer-logo"><a href="index.html" class="footer-brand">VermiWeb</a>
          </h2>
          <p class="footer-body">Let's Change the World with Vermicomposting</p>
          <p class="footer-body">Cavite, PH.</p>
          <p class="foot-text">©️ VermiWeb by VermiTeam 2023</p>
        </div>
        <div class="col-lg-6 col-m-12 col-sm-12 footer-right">
          <p class="footer-right-header">For Inquiries you may contact us at:</p>
          <p class="footer-email"><i class="fa-solid fa-envelope footer-envelope"></i>vermiteam3@gmail.com</p>
          <p class="footer-number"><i class="fa-solid fa-phone footer-envelope"></i>+639776958441</p>
          <div class="footer-icons">
            <a href="https://www.facebook.com/vermiteam" class="fa fa-facebook foot-icon-left"></a>
            <a href="https://twitter.com/VermiTeam03" class="fa fa-twitter foot-icon-left"></a>
            <a href="https://www.instagram.com/vermiteam03" class="fa fa-instagram foot-icon-left"></a>
          </div>
        </div>
      </div>
    </footer>

  </body>
</html>