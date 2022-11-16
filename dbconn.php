<?php
$host = 'localhost';
$user = 'u546448204_test';
$password = 'Afsl@123';
$database = 'u546448204_promo';

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
?>
    <script>
        alert("Connection Unsuccessful!!!");
    </script>
<?php
}
error_reporting(0);
?>