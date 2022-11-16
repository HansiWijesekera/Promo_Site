<?php
require 'dbconn.php';
session_start();
require 'header.php';
$id = $_GET['id'];

$query = "SELECT * from company where companyId ='$id' ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_row($result);
$companyName = $row[2];
$address = $row[3];
$number = $row[4];
$picture = $row[5];
$web = $row[6];
$email = $row[7];

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
                    <a class="get-a-quote" href="index.php">Go Back</a>
                    <a class="get-a-quote" href="login.php">Post Yours</a>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">
        <section id="hero" class="hero d-flex align-items-center">
            <div class="container">
                <div class="row gy-4 d-flex justify-content-between">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h3 data-aos="fade-up" style="font-size: 220%;">
                            <img src="<?php echo 'Company/Picture/' . basename($picture); ?>" style="width: 100px; height: 100px;  border-radius: 50%;" /><br><br><?php echo "  " . $companyName; ?>
                        </h3>
                        <h6 data-aos="fade-up" data-aos-delay="100"><i class="bi bi-geo-alt-fill"></i><?php echo "  " . $address; ?>
                            <br><i class="bi bi-telephone-fill"></i></i> <?php echo "  " . $number; ?>
                            <br><i class="bi bi-envelope"></i> <?php echo "  " . $email; ?>
                            <br><i class="bi bi-browser-chrome"></i> <?php echo "  " . $web; ?></a>
                        </h6>
                    </div>
                </div>
        </section><!-- End Hero Section -->
        <!-- 
    <section id="featured-services" class="featured-services align-items-center">
      <div class="container">
        <div class="row gy-4">
          <?php
            // $sql = "SELECT * FROM subcategory where mainCatId =  $id ";
            // $resultset = mysqli_query($con, $sql) or die("database error:" . mysqli_error($con));
            // while ($record = mysqli_fetch_assoc($resultset)) {
            ?>
            <div class="col-lg-2 col-md-6 service-item d-flex" data-aos="fade-up">
              <div><i class="fa-hash"></i></div>
              <div>
                <a href="viewPromo.php?id=<?php // echo $record['categoryId']; 
                                            ?>">
                  <h4 class="title">#<?php // echo $record['description']; 
                                        ?>
                  </h4>
                </a>
              </div>
            </div>
          <?php //} 
            ?>
        </div>
      </div>
    </section>End Featured Services Section -->

        <!-- ======= Services Section ======= -->
        <section id="service" class="services pt-0">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <span>Offers And Promotions</span>
                    <h2>Offers And Promotions</h2>
                </div>
                <div class="row gy-4">
                    <?php
                    $sql = "SELECT * FROM promotions inner join company on company.companyId = promotions.companyId
                    where promotions.expireDate > CURDATE() AND company.status = 'A' and company.companyId = $id ";
                    $resultset = mysqli_query($con, $sql) or die("database error:" . mysqli_error($con));
                    while ($record = mysqli_fetch_assoc($resultset)) {
                    ?>
                        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                            <div>
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" style="padding-left: 4%;">
                                    <div class=" card" style="width: 320px; height: 310px;">
                                    <div class="card-img" style="text-align: center;">
                                        <img src="<?php echo 'Promotions/' . basename($record['photo']); ?>" class="img-fluid" onclick="window.open(this.src)" class="img-fluid">
                                    </div>
                                    <h3 style="cursor: pointer;"><?php echo $record['title']; ?></h3>
                                    <p> <a style="cursor: pointer;" href="<?php echo "//" . $record['link']; ?>"><?php echo $record['link']; ?></a>
                                        <br><?php echo $record['contactNumber']; ?>
                                    </p>
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