<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BloodBank & Donor Management System</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/maincss.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
    </style>

</head>

<body>

    <!-- Navigation -->
<?php include('includes/header.php');?>

<?php include('includes/slider.php');?>

    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4">Welcome to BloodBank & Donor Management System</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100" style="width: auto;">
                    <div class="card-body">
                        <h4 class="card-title">The need for Blood Donation</h4>
                        <p class="card-text" style="padding-left:2%">The reason to donate is simple…it helps save lives. In fact, every two seconds of every day, someone needs blood. Since blood cannot be manufactured outside the body and has a limited shelf life, the supply must constantly be replenished by generous blood donors. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100" style="width: auto;">
                    <div class="card-body">
                        <h4 class="card-title">Blood Donation Tips</h4>
                        <p class="card-text" style="padding-left:2%">Before your blood donation:
                        Get plenty of sleep the night before you plan to donate.
                        Eat a healthy meal before your donation.
                        Avoid fatty foods, such as hamburgers, french fries or ice cream before donating.
                        Drink an extra 16 ounces (473 milliliters) of water and other fluids before the donation. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card" style="width: auto;">
                    <div class="card-body">
                    <h4 class="card-title">Who you could Help?</h4>
                    <p class="card-text" style="padding-left:2%">Your blood saves lives. Your blood donation is an amazing gift to people who need it in an emergency or for on-going medical treatment. 
We need nearly 5,000 people to give blood every day to meet the needs of hospitals and patients. We specifically need new black donors to provide blood donations for black patients with sickle cell disease. They need life-saving blood from black donors, which provides the closest match to their own. Find out how donated blood is used. </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="text-center">  
            <a href="become-donar.php"><button class="donor-btn">Become a Donor</button></a>
        </div>    

        <!-- Portfolio Section -->
        <h2>Blood Donor List:- </h2>

        <div class="row">
            <?php 
            $status=1;
            $sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 6";
            $query = $dbh -> prepare($sql);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            { ?>

            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top img-fluid" src="images/blood-donor.jpg" alt="" ></a>
                    <div class="card-block">
                        <h4 class="card-title"><a href="#"><?php echo htmlentities($result->FullName);?></a></h4>
                        <p class="card-text"><b>  Gender :</b> <?php echo htmlentities($result->Gender);?></p>
                        <p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup);?></p>
                    </div>
                </div>
            </div>

            <?php }} ?>
          
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-6">
                <h2>BLOOD GROUPS</h2>
                <p>  blood group of any human being will mainly fall in any one of the following groups.</p>
                <ul>
                    <li>A positive or A negative</li>
                    <li>B positive or B negative</li>
                    <li>O positive or O negative</li>
                    <li>AB positive or AB negative.</li>
                </ul>
                <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded float-end" src="images/blood-donor (1).jpg" alt="side-banner">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
            <h4>UNIVERSAL DONORS AND RECIPIENTS</h4>
                <p>
The most common blood type is O, followed by type A.

Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="become-donar.php">Become a Donor</a>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
  <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
