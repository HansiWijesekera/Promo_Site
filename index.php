<?php
require 'dbconn.php';
session_start();
require 'header.php';


?>

<html>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <a class="get-a-quote" href="login.php">Post Yours</a>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Promotions LK</h2>
          <p data-aos="fade-up" data-aos-delay="100">Discover thousands of new promotions</p>

          <form action="search.php" class="form-search d-flex align-items-stretch mb-2" data-aos="fade-up" data-aos-delay="200">
            <input type="text" name="text" class="form-control" placeholder="Search Here">
            <button type="submit" name="submit-search" class="btn btn-primary btn-sm">Search</button>
          </form>


        </div>
      </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services align-items-center">
      <div class="container">
        <div class="row gy-4">
          
          <?php
          $sql = "SELECT * FROM categories where status = 'A'";
          $resultset = mysqli_query($con, $sql) or die("database error:" . mysqli_error($con));
          while ($record = mysqli_fetch_assoc($resultset)) {
          ?>
            <div class="col-lg-3 col-md-6 service-item d-flex" data-aos="fade-up" style="padding-left: 4%;">
              <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
              <div>
                <a href="viewPromo.php?id=<?php echo $record['categoryId']; ?>">
                  <h4 class="title"><?php echo $record['categoryName']; ?>
                </a></h4>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section><!-- End Featured Services Section -->


    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <span>Leatest Promotions</span>
          <h2>Leatest Promotions</h2>
        </div>
        <div class="row gy-4">
          <?php
          $sql = "SELECT * FROM promotions inner join company on company.companyId = promotions.companyId
           where promotions.expireDate > CURDATE() AND company.status = 'A' order by promotions.promoId DESC LIMIT 15 ";
          $resultset = mysqli_query($con, $sql) or die("database error:" . mysqli_error($con));
          while ($record = mysqli_fetch_assoc($resultset)) {
          ?>
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
              <div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" style="padding-left: 4%;">
                  <div class="card" style="width: 320px; height: 310px;">
                    <div class="card-img" style="text-align: center;">
                      <img src="<?php echo 'Promotions/' . basename($record['photo']); ?>" class="img-fluid" onclick="window.open(this.src)">
                    </div>
                    <h3 style="cursor: pointer;" onclick="window.open('companyPromo.php?id=<?php echo $record['companyId']; ?>')"><?php echo $record['title']; ?><br><img src="<?php echo 'Company/Picture/' . basename($record['picture']); ?>" style="width: 20px; height: 20px;  border-radius: 50%;" /><?php echo "  " . $record['companyName']; ?> </h3>
                    <p> <a style="cursor: pointer;" href="<?php echo "//" . $record['link']; ?>"><?php echo $record['link']; ?></a><br><?php echo $record['contactNumber']; ?></p>
                  </div>
                </div><!-- End Card Item -->
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  </main><!-- End #main -->


</body>

</html>
<?php
require 'footer.php';
?>