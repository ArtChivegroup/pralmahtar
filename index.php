<?php 
session_start();
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <title>Press Indo News Portal | Home Page</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>
    
    <!-- Navigation -->
    <?php include('includes/header.php'); ?>
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row" style="margin-top: 4%">
            <!-- Blog Entries Column -->
            <div class="col-md-2 mt-4">
                <!-- Categories Widget -->
                <div class="card my-4 border-0">
                    <h5 class="card-header bg-white border-0">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    $query = mysqli_query($con, "select id, CategoryName from tblcategory");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <li class="mb-2">
                                        <a href="category.php?catid=<?php echo htmlentities($row['id']) ?>" class="text-secondary">
                                            <?php echo htmlentities($row['CategoryName']); ?>
                                            
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h4 class="widget-title mb-4">Today <span>Highlight</span></h4>
                <!-- Blog Post -->
                <div class="row">
                    <div class="owl-carousel owl-theme" id="slider">
                        <?php
                        $latest_posts_query = "SELECT * FROM tblposts WHERE Is_Active = 1 ORDER BY PostingDate DESC LIMIT 5";
                        $latest_posts_result = mysqli_query($con, $latest_posts_query);

                        while ($latest_post_row = mysqli_fetch_assoc($latest_posts_result)) {
                        ?>
                        <div class="card mb-4 border-0 position-relative" style="width: 100%; max-height: 400px; overflow: hidden;">
                            <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($latest_post_row['PostImage']); ?>" alt="<?php echo htmlentities($latest_post_row['PostTitle']); ?>" style="width: 100%; height: auto;">
                            <div class="card-body position-absolute bottom-0 w-100" style="background-color: rgba(0, 0, 0, 0.7);">
                                <p class="m-0">
                                    <!-- Category -->
                                    <a class="badge bg-success text-decoration-none link-light" href="#" style="color:#fff">Sports</a>
                                    <!-- Subcategory (Jika Ada) -->
                                    <a class="badge bg-warning text-decoration-none link-light" style="color:#fff">Sports</a>
                                </p>
                                <a href="news-details.php?nid=<?php echo htmlentities($latest_post_row['id']); ?>" class="card-title text-decoration-none text-white">
                                    <h5 class="card-title"><?php echo htmlentities($latest_post_row['PostTitle']); ?></h5>
                                </a>
                                <p class="m-0 text-white"><small> Posted on <?php echo htmlentities($latest_post_row['PostingDate']); ?></small></p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 8;
                    $offset = ($pageno - 1) * $no_of_records_per_page;
                    $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                    $result = mysqli_query($con, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);
                    $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-md-6">
                        <div class="card mb-4 border-0">
                            <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>" height="200px">
                            <div class="card-body">
                                <p class="m-0">
                                    <!-- Category -->
                                    <a class="badge bg-success text-decoration-none link-light" href="category.php?catid=<?php echo htmlentities($row['cid']) ?>" style="color:#fff">
                                        <?php echo htmlentities($row['category']); ?>
                                    </a>
                                    <!-- Subcategory -->
                                    <a class="badge bg-warning text-decoration-none link-light" style="color:#fff">
                                        <?php echo htmlentities($row['subcategory']); ?>
                                    </a>
                                </p>
                                <p class="m-0"><small> Posted on <?php echo htmlentities($row['postingdate']); ?></small></p>
                                <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="card-title text-decoration-none text-dark">
                                    <h5 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <a href="tel:+8801608445456">
                    <img src="images/ads.jpg" class="img-fluid">
                </a>
            </div>
            <!-- Sidebar Widgets Column -->
            <?php include('includes/sidebar.php'); ?>
        </div>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
    <script src="js/foot.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script>
        $('#slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            animateOut: 'fadeOut',
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    </script>
</body>
</html>
