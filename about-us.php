<!--  Author Name: MOCH DIMAS ALMAHTAR.
                        GigHub Link: -
                        Facebook Link:https://www.facebook.com/ALMACTAR
                        Youtube Link: https://www.youtube.com/@ARTCHIVEIP
                        contact me at dimasalmactar12@gmail.com  
                        Visit My Website : dmz.artchive.me --><?php
include('includes/config.php');

?>
<!--  Author Name: MOCH DIMAS ALMAHTAR.
                        GigHub Link: -
                        Facebook Link:https://www.facebook.com/ALMACTAR
                        Youtube Link: https://www.youtube.com/@ARTCHIVEIP
                        contact me at dimasalmactar12@gmail.com  
                        Visit My Website : dmz.artchive.me -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <<!--  Author Name: MOCH DIMAS ALMAHTAR.
                        GigHub Link: -
                        Facebook Link:https://www.facebook.com/ALMACTAR
                        Youtube Link: https://www.youtube.com/@ARTCHIVEIP
                        contact me at dimasalmactar12@gmail.com  
                        Visit My Website : dmz.artchive.me -->
    <title>Live News Portal | About us</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="css/icons.css">
</head>

<body>
    <!--  Author Name: MOCH DIMAS ALMAHTAR.
                        GigHub Link: -
                        Facebook Link:https://www.facebook.com/ALMACTAR
                        Youtube Link: https://www.youtube.com/@ARTCHIVEIP
                        contact me at dimasalmactar12@gmail.com  
                        Visit My Website : dmz.artchive.me -->
    <!-- Navigation -->
    <?php include('includes/header.php');?>
    <!-- Page Content -->
    <div class="container">

        <?php 
$pagetype='aboutus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
        <h1 class="mt-5 mb-3 text-center"><?php echo htmlentities($row['PageTitle'])?>

        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">About</li>
        </ol>

        <!-- Intro Content -->
        <div class="row">

            <div class="col-lg-12">

                <p><?php echo $row['Description'];?></p>
            </div>
        </div>
        <!-- /.row -->
        <?php } ?>


        <div class="col-md-12"><a href="tel:+8801608445456">
                <img src="images/ads.jpg" class="img-fluid"></a>

        </div>

    </div>



    <!-- /.container -->

    <!-- Footer -->
    <?php include('includes/footer.php');?>
    <!--  Author Name: MOCH DIMAS ALMAHTAR.
                        GigHub Link: -
                        Facebook Link:https://www.facebook.com/ALMACTAR
                        Youtube Link: https://www.youtube.com/@ARTCHIVEIP
                        contact me at dimasalmactar12@gmail.com  
                        Visit My Website : dmz.artchive.me -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>