<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAF PC POINT - Home Page</title>
	<style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #f5f5f5;
        }
        .navbar-brand {
            font-weight: bold;
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
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand text-danger" href="index.php">CAF PC-POINT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="partners.php">Partners</a></li>
                    <li class="nav-item"><a class="nav-link" href="#brances">Brances</a></li>
                    <li class="nav-item"><a class="nav-link" href="book.php">Book Now</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://app.titan.email/login/" target="_blank">Web Mail</a></li>
                    <li class="nav-item"><a class="btn btn-danger" href="admin/index.php" target="_blank">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Slider Section -->
    <div class="slider-container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Slide 3">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Slide 4">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
	
	
	<!-- SNS Section -->			
	<div class="container d-flex justify-content-center align-items-center" style="height: 10vh; padding: 0;">
	  <a href="#" class="me-3 text-default"><i class="fab fa-linkedin fa-2x"></i></a>
	  <a href="#" class="me-3 text-info"><i class="fab fa-twitter fa-2x"></i></a>
	  <a href="#" class="me-3 text-danger"><i class="fab fa-youtube fa-2x"></i></a>
	  <a href="#" class="me-3 text-success"><i class="fab fa-whatsapp fa-2x"></i></a>
	  <a href="https://facebook.com/cafpcpoint" class="text-primary"><i class="fab fa-facebook fa-2x"></i></a>
	</div>



    <!-- Services Section -->
    <div class="container py-5" id="services">
        <div class="row g-4">
            <!-- Service Card -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="https://via.placeholder.com/300x200" alt="Service Image" class="w-100 mb-3">
                    <div class="badge bg-danger text-white">FREE | GRATIS</div>
                    <h5 class="mt-2">730 2024 Verifica</h5>
                    <p>Duration: 15min | Capacity: 1</p>
                    <p><i class="fa fa-map-marker-alt"></i> A1. ROME (Head Office)</p>
                    <a href="book.php">  
						<button class="btn btn-success w-100">Book Now</button>
					</a>
                </div>
            </div>

            <!-- Repeat similar cards for other services -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="https://via.placeholder.com/300x200" alt="Service Image" class="w-100 mb-3">
                    <div class="badge bg-danger text-white">FREE | GRATIS</div>
                    <h5 class="mt-2">Contabilità</h5>
                    <p>Duration: 15min | Capacity: 1</p>
                    <p><i class="fa fa-map-marker-alt"></i> A1. ROME (Head Office)</p>
                    <a href="book.php">  
						<button class="btn btn-success w-100">Book Now</button>
					</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card">
                    <img src="https://via.placeholder.com/300x200" alt="Service Image" class="w-100 mb-3">
                    <div class="badge bg-danger text-white">FREE | GRATIS</div>
                    <h5 class="mt-2">ISEE 2024</h5>
                    <p>Duration: 15min | Capacity: 1</p>
                    <p><i class="fa fa-map-marker-alt"></i> A1. ROME (Head Office)</p>
                    <a href="book.php">  
						<button class="btn btn-success w-100">Book Now</button>
					</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Vision Section -->
    <div class="container vision-section">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img src="images/ceo-img (Custom).jpg" alt="CEO" class="ceo-image">
            </div>
            <div class="col-md-8">
			
			<h5>Welcome to CAF PC-POINT,<small> Specialize in providing essential services in Italy!</small></h5>

			<p>We are here to help immigrants and residents with important services in Italy. Our platform makes it easy for you to get professional help with CAF (Fiscal Assistance Centers) for tax and financial matters, as well as Patronato services for social welfare support. We also assist with immigration-related processes, making it easier for you to manage your legal and administrative tasks in Italy.</p>
			
			<p>We are proud to have numerous trusted partners across Italy who use our software solutions to make their work easier and more efficient.</p>
			
			<p>We invite you to explore our software at <a href="https://soft.cafpcpoint.it/" target="_blank">click</a> and discover how it can benefit you too.</p>


			<p>If you're interested, you can also become one of our valued partners and join us in providing exceptional services to individuals across Italy. Let us help make your life easier with our trusted solutions!</p>

				
                <mark class="text-danger">- CEO, CAF PC POINT</mark>
				<br>
                <p>- NIBASH CHAKRABORTY</p>
            </div>
        </div>
    </div>

    <!-- Operational Details Section -->
    <div class="container operational-section" id="brances">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="operational-card">
                    <i class="fas fa-building fa-3x mb-3 text-success"></i>
                    <h5>Head Office</h5>
                    <p>Address: VIA FLAVIO STILICONE 11, 00175 ROMA</p>
                    <p>Hotline: +39 068 788 0399</p>
                    <p>Email: info@cafpcoint.it</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="operational-card">
                    <i class="fas fa-map-marker-alt fa-3x mb-3 text-danger"></i>
                    <h5>Branch Office</h5>
                    <p>Address: VIA FLAVIO STILICONE 11, 00175 ROMA</p>
                    <p>Hotline: +39 068 788 0399</p>
                    <p>Email: cafpcpoint@yahoo.com</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="operational-card">
                    <i class="fas fa-clock fa-3x mb-3 text-warning"></i>
                    <h5>Working Hours</h5>
                    <p>Monday - Friday: 9 AM - 6 PM</p>
					<br>
					<br>
					<br>
                    <p>Saturday: 10 AM - 4 PM</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Locations Section -->
    <div class="container location-section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Head Office</h5>
                        <p class="card-text">VIA FLAVIO STILICONE 11, 00175 ROMA</p>
                        <img src="https://via.placeholder.com/500x300" alt="Map Placeholder" class="w-100">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Branch Office</h5>
                        <p class="card-text">Via Tuscolana, Rome</p>
                        <img src="https://via.placeholder.com/500x300" alt="Map Placeholder" class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2025 CAF PC POINT | VIA FLAVIO STILICONE 11, 00175 ROMA.</p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
