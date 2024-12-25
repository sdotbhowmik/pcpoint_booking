<?php include_once('admin/includes/config.php');

if(isset($_POST['submit'])){

$fname=$_POST['name'];
$emailid=$_POST['email'];
$phonenumber=$_POST['phonenumber'];
$bookingdate=$_POST['bookingdate'];
$bookingtime=$_POST['bookingtime'];
$noadults=$_POST['noadults'];
$nochildrens=$_POST['nochildrens'];
$bno=mt_rand(100000000,9999999999);
//Code for Insertion
$query=mysqli_query($con,"insert into tblbookings(bookingNo,fullName,emailId,phoneNumber,bookingDate,bookingTime,noAdults,noChildrens) values('$bno','$fname','$emailid','$phonenumber','$bookingdate','$bookingtime','$noadults','$nochildrens')");
if($query){
echo '<script>alert("Your order sent successfully. Booking number is "+"'.$bno.'")</script>';
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAF PC POINT - Appointment Booking Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	
	<!-- Calendar -->
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<!-- Time-script-CSS -->
	<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
	<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #f5f5f5;
        }
        .navbar-brand {
            font-weight: bold;
            color: #bb2d3b;
        }
        .nav-link {
            position: relative;
        }
        .nav-link:hover::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 6px;
            background-color: #bb2d3b;
        }
        .hero {
            background: linear-gradient(135deg, #7d65d8, #9ba8ff);
            color: white;
            text-align: center;
            padding: 40px 20px;
        }

        /* Transparent Cards with visible edges */
        .location-card {
            border: 2px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.6); /* Semi-transparent background */
            margin-bottom: 30px; /* Distance between cards */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .location-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .location-card h5 {
            color: #157347;
        }

        .location-card p {
            color: #555;
        }

        .location-card .btn {
            background-color: #157347;
            color: white;
            border: none;
        }

        .location-card .btn:hover {
            background-color: #157347;
        }

        /* Footer Styling */
        footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">CAF PC-POINT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="partners.php">Partners</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Brances</a></li>
                    <li class="nav-item"><a class="nav-link" href="book.php">Book Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://app.titan.email/login/" target="_blank">Web Mail</a></li>
                    <li class="nav-item"><a class="btn btn-danger" href="admin/index.php" target="_blank">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Locations Section -->
    <div class="container py-5">
        <h2 class="text-center mb-4 text-danger">Our Partners</h2>

        <!-- Repeat for each location -->
        <div class="location-card">
            <h5>A1. ROME (Head Office)</h5>
            <p><i class="fa fa-map-marker-alt"></i> Via di S. Croce in Gerusalemme, 99, 00185 Roma, RM, Italy</p>
            <p><i class="fa fa-phone"></i> +390698382211</p>
            <p>Working Hours: <span class="text-muted">Mon-Fri 9:00 AM - 5:00 PM</span></p>
            <div class="row">
                <div class="col-md-8">
                    <img src="https://via.placeholder.com/300x150" class="img-fluid rounded" alt="Map placeholder">
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <button class="btn btn-primary w-100">More Details</button>
                </div>
            </div>
        </div>
        <div class="location-card">
            <h5>A2. ROME (Head Office)</h5>
            <p><i class="fa fa-map-marker-alt"></i> Via di S. Croce in Gerusalemme, 99, 00185 Roma, RM, Italy</p>
            <p><i class="fa fa-phone"></i> +390698382211</p>
            <p>Working Hours: <span class="text-muted">Mon-Fri 9:00 AM - 5:00 PM</span></p>
            <div class="row">
                <div class="col-md-8">
                    <img src="https://via.placeholder.com/300x150" class="img-fluid rounded" alt="Map placeholder">
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <button class="btn btn-primary w-100">More Details</button>
                </div>
            </div>
        </div>
        <div class="location-card">
            <h5>A3. ROME (Head Office)</h5>
            <p><i class="fa fa-map-marker-alt"></i> Via di S. Croce in Gerusalemme, 99, 00185 Roma, RM, Italy</p>
            <p><i class="fa fa-phone"></i> +390698382211</p>
            <p>Working Hours: <span class="text-muted">Mon-Fri 9:00 AM - 5:00 PM</span></p>
            <div class="row">
                <div class="col-md-8">
                    <img src="https://via.placeholder.com/300x150" class="img-fluid rounded" alt="Map placeholder">
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <button class="btn btn-primary w-100">More Details</button>
                </div>
            </div>
        </div>

        <!-- Repeat for other locations (A3, A4, A5, etc.) -->
        <!-- You can continue this pattern for other locations -->
        
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2025 CAF PC POINT | VIA FLAVIO STILICONE 11, 00175 ROMA.</p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
