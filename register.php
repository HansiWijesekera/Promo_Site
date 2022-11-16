<?php
require 'dbconn.php';
session_start();
require 'header.php';

if (isset($_POST['submit'])) {
    $companyName = $_POST['companyName'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];
    $website = $_POST['website'];
    $email = $_POST['email'];

    $password = MD5($_POST['password']);
    $userName = $_POST['userName'];
    $userType = "2";

    $categoryName = $_POST['categoryName'];

    $currentDirectory = getcwd();
    $targetDir = "/Company/Picture/";
    $fileName = preg_replace('/\s+/', '_', $companyName . '_' . $_FILES['picture']['name']);
    $fileTmpName  = $_FILES['picture']['tmp_name'];
    //$targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $uploadPath = $currentDirectory . $targetDir . basename($fileName);
    move_uploaded_file($fileTmpName, $uploadPath);

    $selectQuery1 = "select categoryId from categories where categoryName = '$categoryName' ";
    $squery1  = mysqli_query($con, $selectQuery1);
    while (($result1 = mysqli_fetch_assoc($squery1))) {
        $categoryId = implode(array_slice($result1, 0));
    }

    $sql1 = "SELECT * FROM user WHERE userName='$userName'";
    $res1 = mysqli_query($con, $sql1);

    $sql2 = "SELECT * FROM company WHERE companyName = '$companyName'";
    $res2 = mysqli_query($con, $sql2);

    $query =
        "INSERT INTO user(userName,password,userType)
	     VALUES('$userName','$password','$userType')";


    if (mysqli_num_rows($res2) > 0) {
        echo " <script type='text/javascript'>alert('Company Name Already Registerd');location.href='register.php'</script>";
    } else {
        if (mysqli_num_rows($res1) > 0) {
            echo " <script type='text/javascript'>alert('Username Already Registerd');location.href='register.php'</script>";
        } else {
            $query = mysqli_query($con, $query);
            $userID = mysqli_insert_id($con);
            if ($companyName <> "") {
                $query1 = "INSERT INTO company (userId,companyName,address,contactNumber,picture,website,email,categoryId,registeredDate,status)
        	           VALUES('$userID','$companyName','$address','$contactNumber','$fileName','$website','$email','$categoryId',CURDATE(),'A')";
                if (mysqli_query($con, $query1)) {
                    $_SESSION['companyId'] = mysqli_insert_id($con);
                    echo " <script type='text/javascript'>alert('Company Added Succesfully');location.href='login.php'</script>";
                } else {
                    echo " <script type='text/javascript'>alert('Error In company Details');location.href='register.php'</script>";
                }
            } else {
            }
            echo " <script type='text/javascript'>alert('User Added Sucessfully Please Login');location.href='index.php'</script>";
        }
    }
}
?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        $(function() {
            $('#input1').on('keypress', function(e) {
                if (e.which == 32) {
                    alert('UserName can not include spacers');
                    return false;
                }
            });
        });
    </script>

</head>
<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <a class="get-a-quote" href="index.php">Go Back</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<br><br>
<div class="row d-flex justify-content-center">
    <div class="col-lg-7" style="padding: 10%;">
        <div class="card">
            <div class="card-header text-center">
                <h4>Register Here</h4>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="form-input py-2" style="padding-left: 20px;  border-radius: 5px;background-color: #f2f2f2;padding: 20px;">
                    <div class="form-group">
                        <label class="form-control-label">Enter company Name</label>
                        <input type="text" name="companyName" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Enter UserName for Company</label>
                        <input type="text" name="userName" class="form-control" id="input1" required />
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Enter Address</label>
                        <input type="text" name="address" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Enter Contact Number</label>
                        <input type="text" name="contactNumber" class="form-control" minlength="10" maxlength="10" required />
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Enter Picture</label>
                        <input type="file" name="picture" class="form-control" accept="image/jpg, image/jpeg, image/png, image/tif " id="someId" required />
                        <script>
                            var file = document.getElementById('someId');

                            file.onchange = function(e) {
                                var ext = this.value.match(/\.([^\.]+)$/)[1];
                                switch (ext) {
                                    case 'jpg':
                                    case 'jpeg':
                                    case 'png':
                                    case 'tif':
                                        break;
                                    default:
                                        alert('Not allowed file type please add JPEG,JPG or PNG file');
                                        this.value = '';
                                }
                            };
                        </script>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Enter Email</label>
                        <input type="email" name="email" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Enter Website</label>
                        <input type="text" name="website" class="form-control" />
                    </div>
                    <label class="form-control-label">Please Select Catrgory</label>
                    <div>
                        <?php
                        $queryX = "SELECT * FROM categories where status = 'A'";
                        $result = $con->query($queryX);
                        if (!empty($result) && $result->num_rows > 0) {
                            $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        }
                        ?>
                        <select name="categoryName" required>
                            <option>Select Category</option>
                            <?php
                            foreach ($options as $option) {
                            ?>
                                <option><?php echo $option['categoryName']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div><br>

            </form>
            <div class="form-group">
                <label class="form-control-label">Enter Password For User</label>
                <input type="password" name="password" class="form-control" id="password" required />
                <input type="checkbox" onclick="myFunction()">Show Password
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Register">
            </div>

        </div>
        </form>

    </div>
</div>
</div>
</body>

</html>
<?php
require 'footer.php';
?>