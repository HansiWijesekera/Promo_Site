<?php
require 'dbconn.php';
session_start();
require 'header.php';
$search = $_GET['text'];

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
        <section id="service" class="services pt-0">
            <div class="container" data-aos="fade-up" style="padding-top: 120px;">
                <div class="row gy-4">

                    <?php

                    $sql = "SELECT * FROM promotions inner join company on company.companyId = promotions.companyId
                 where promotions.expireDate > CURDATE() AND company.status = 'A' and (promotions.title like '%$search%' or company.companyName like '%$search%')  order by promotions.promoId ";
                    $result = mysqli_query($con, $sql);
                    $queryResultCount = mysqli_num_rows($result);

                    //echo "There are" . $queryResultCount . " results!";

                    if ($queryResultCount > 0) {
                        while ($queryResult = mysqli_fetch_assoc($result)) { ?>
                            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
                                <div>
                                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" style="padding-left: 4%;">
                                        <div class="card" style="width: 320px; height: 310px;">
                                            <div class="card-img" style="text-align: center;">
                                                <img src="<?php echo 'Promotions/' . basename($queryResult['photo']); ?>" class="img-fluid" onclick="window.open(this.src)" class="img-fluid">
                                            </div>
                                            <h3 style="cursor: pointer;" onclick="window.open('companyPromo.php?id=<?php echo $queryResult['companyId']; ?>')"><?php echo $queryResult['title']; ?><br><img src="<?php echo 'Company/Picture/' . basename($queryResult['picture']); ?>" style="width: 20px; height: 20px;  border-radius: 50%;" /><?php echo "  " . $queryResult['companyName']; ?> </h3>
                                            <p> <a style="cursor: pointer;" href="<?php echo "//" . $queryResult['link']; ?>"><?php echo $queryResult['link']; ?></a><br><?php echo $queryResult['contactNumber']; ?></p>
                                        </div>
                                    </div><!-- End Card Item -->
                                </div>
                            </div>

                    <?php  }
                    } else {
                        echo "There Are No Results Matching Your Search";
                    }

                    ?>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
</body>

</html>
<?php
require 'footer.php';
?>