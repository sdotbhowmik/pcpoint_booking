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
	
	
	
	<!--//style sheet end here-->
	<!-- Calendar -->
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<!-- //Calendar -->
	<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
	<!-- Time-script-CSS -->

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
        .service-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            transition: transform 0.2s;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #4b4cf7;
            border-color: #4b4cf7;
        }
        .btn-primary:hover {
            background-color: #3c3ccd;
        }
        footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
		
        .vision-section {
            padding: 40px 20px;
            background-color: #f5f5f5;
        }
        .vision-section .ceo-image {
            max-width: 100%;
            border-radius: 50%;
        }
        .slider {
            margin: 40px 0;
        }
        .slider img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .slider-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .operational-section {
            padding: 40px 20px;
            background-color: #f9f9f9;
        }
        .operational-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }
        .location-section {
            padding: 40px 20px;
            background-color: #f5f5f5;
        }
		
		
        .form-select {
            background-color: #fff;
            border-color: #ced4da;
            color: #495057;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            height: calc(2.25rem + 2px);
            border-radius: 0.375rem;
        }

        .form-select:focus {
            border-color: #80bdff;
            outline: none;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        /* To make it look like other input fields */
        .form-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
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



    <!-- Booking Form Section -->
    <div class="container mt-4">
        <h1 class="text-center">Book Your Appointment</h1>
        <div class="card p-4 mt-3">
            <form action="#" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="nochildrens" placeholder="Tax ID" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input id="datepicker" name="bookingdate" type="text" class="form-control" placeholder="Booking Date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" id="timepicker" name="bookingtime" class="form-control timepicker" placeholder="Time" required onkeypress="return false;">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <select class="form-control" name="noadults" required>
                        <option value="">Select Service Category</option>
                        <option value="CAF - CENTRO ASSISTENZA FISCAL">CAF - CENTRO ASSISTENZA FISCAL</option>
                        <option value="CONSULENZA DEL LAVORO">CONSULENZA DEL LAVORO</option>
                        <option value="PATRONATO">PATRONATO</option>
                        <option value="IMMIGRAZIONE">IMMIGRAZIONE</option>
                        <option value="IMPRESA - COMMERCIALISTA">IMPRESA - COMMERCIALISTA</option>
                        <option value="SERVIZI VARI">SERVIZI VARI</option>
                        <option value="PAGAMENTO">PAGAMENTO</option>
                        <option value="AVVOCATO">AVVOCATO</option>
                        <option value="ARCHIVIO">ARCHIVIO</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success w-100" name="submit">Confirm Booking</button>
                </div>
            </form>
        </div>
    </div>
	

    <!-- Footer -->
    <footer>
        <p>© 2025 CAF PC POINT | VIA FLAVIO STILICONE 11, 00175 ROMA.</p>
    </footer>
	
	
	



	<!-- js -->
	<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
	<!-- //js -->
	<!-- Calendar -->
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script>
	<!-- //Calendar -->
	<!-- Time -->
	<script type="text/javascript" src="js/wickedpicker.js"></script>
	<script type="text/javascript">
		$('.timepicker,.timepicker1').wickedpicker({ twentyFour: false });
	</script>
	<!-- //Time -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
