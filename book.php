<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$default_lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'it');
$allowed_langs = ['en', 'it', 'bn'];
if (!in_array($default_lang, $allowed_langs)) $default_lang = 'en';
$_SESSION['lang'] = $default_lang;

$lang_names = ['en' => 'English', 'it' => 'Italiano', 'bn' => 'বাংলা'];

include_once('admin/includes/config.php');

if(isset($_POST['submit'])){

$fname=$_POST['name'];
$emailid=$_POST['email'];
$phonenumber=$_POST['phonenumber'];
$bookingdate=$_POST['bookingdate'];
$bookingtime=$_POST['bookingtime'];
$noadults=$_POST['noadults'];
$nochildrens=$_POST['nochildrens'];
$bno=mt_rand(100000000,9999999999);
$query=mysqli_query($con,"insert into tblbookings(bookingNo,fullName,emailId,phoneNumber,bookingDate,bookingTime,noAdults,noChildrens) values('$bno','$fname','$emailid','$phonenumber','$bookingdate','$bookingtime','$noadults','$nochildrens')");
if($query){
echo '<script>alert("Your order sent successfully. Booking number is "+"'.$bno.'")</script>';
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}
?>

<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title" data-translate="book_your_appointment">Book Your Appointment</h1>
                <p class="hero-subtitle" data-translate="schedule_visit">Schedule a visit with our professional team</p>
            </div>
        </div>
    </section>

    <!-- Booking Form Section -->
    <section class="booking-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="booking-card">
                        <div class="booking-header">
                            <h3><i class="fas fa-calendar-check me-2"></i><span data-translate="appointment_form">Appointment Form</span></h3>
                            <p data-translate="fill_details">Fill in your details to book an appointment</p>
                        </div>
                        <div class="booking-body">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-translate="full_name">Full Name</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-translate="email_id">Email ID</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-translate="phone_number">Phone Number</label>
                                            <input type="text" class="form-control" name="phonenumber" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-translate="select_service">Select Service</label>
                                            <select class="form-select" name="service" required>
                                                <option value="">Select Service</option>
                                                <option value="CAF">CAF</option>
                                                <option value="PATRONATO">Patronato</option>
                                                <option value="TAX">Tax Services</option>
                                                <option value="IMMIGRAZIONE">Immigrazione</option>
                                                <option value="PAGAMENTO">Pagamento</option>
                                                <option value="AVVOCATO">Avvocato</option>
                                                <option value="ARCHIVIO">Archivio</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-translate="booking_date">Booking Date</label>
                                            <input type="date" class="form-control" name="bookingdate" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-translate="booking_time">Booking Time</label>
                                            <input type="time" class="form-control" name="bookingtime" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-translate="number_of_adults">Number of Adults</label>
                                            <input type="number" class="form-control" name="noadults" min="1" value="1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" data-translate="number_of_children">Number of Children</label>
                                            <input type="number" class="form-control" name="nochildrens" min="0" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn w-100" name="submit" style="background: var(--primary); border-color: var(--primary); color: #fff; padding: 16px 32px; font-weight: 700; border-radius: 8px; font-size: 1.1rem; transition: all 0.3s; box-shadow: 0 6px 20px rgba(34, 139, 34, 0.3);">
                                        <i class="fas fa-check-circle me-2"></i><span data-translate="confirm_booking">Confirm Booking</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-box">
                        <h5><i class="fas fa-info-circle me-2"></i><span data-translate="contact_information">Contact Information</span></h5>
                        <p><i class="fas fa-map-marker-alt"></i> Via Flavio Stilicone 11, 00175 Roma</p>
                        <p><i class="fas fa-phone"></i> +39 068 788 0399</p>
                        <p><i class="fas fa-envelope"></i> info@cafpcpoint.it</p>
                    </div>
                    <div class="info-box">
                        <h5><i class="fas fa-clock me-2"></i><span data-translate="working_hours">Working Hours</span></h5>
                        <p><i class="fas fa-calendar-day"></i> Monday - Friday: 9:00 AM - 6:00 PM</p>
                        <p><i class="fas fa-calendar-week"></i> Saturday: 10:00 AM - 4:00 PM</p>
                    </div>
                    <div class="info-box">
                        <h5><i class="fas fa-question-circle me-2"></i><span data-translate="need_help">Need Help?</span></h5>
                        <p data-translate="contact_for_questions">Contact us for any questions about our services.</p>
                        <a href="check-status.php" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-search me-1"></i><span data-translate="check_booking_status">Check Booking Status</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
        });
    </script>
    <script type="text/javascript" src="js/wickedpicker.js"></script>
    <script type="text/javascript">
        $('.timepicker,.timepicker1').wickedpicker({ twentyFour: false });
    </script>
    <script>
    const translations = {
        'en': {
            'book_your_appointment': 'Book Your Appointment',
            'schedule_visit': 'Schedule a visit with our professional team',
            'appointment_form': 'Appointment Form',
            'fill_details': 'Fill in your details to book an appointment',
            'full_name': 'Full Name',
            'email_id': 'Email ID',
            'phone_number': 'Phone Number',
            'booking_date': 'Booking Date',
            'booking_time': 'Booking Time',
            'select_service': 'Select Service',
            'number_of_adults': 'Number of Adults',
            'number_of_children': 'Number of Children',
            'confirm_booking': 'Confirm Booking',
            'contact_information': 'Contact Information',
            'working_hours': 'Working Hours',
            'need_help': 'Need Help?',
            'contact_for_questions': 'Contact us for any questions about our services.',
            'check_booking_status': 'Check Booking Status'
        },
        'it': {
            'book_your_appointment': 'Prenota il tuo appuntamento',
            'schedule_visit': 'Pianifica una visita con il nostro team professionale',
            'appointment_form': 'Modulo di Appuntamento',
            'fill_details': 'Compila i tuoi dettagli per prenotare un appuntamento',
            'full_name': 'Nome Completo',
            'email_id': 'Email',
            'phone_number': 'Numero di Telefono',
            'booking_date': 'Data di Prenotazione',
            'booking_time': 'Orario di Prenotazione',
            'select_service': 'Seleziona Servizio',
            'number_of_adults': 'Numero di Adulti',
            'number_of_children': 'Numero di Bambini',
            'confirm_booking': 'Conferma Prenotazione',
            'contact_information': 'Informazioni di Contatto',
            'working_hours': 'Orari di Lavoro',
            'need_help': 'Hai bisogno di aiuto?',
            'contact_for_questions': 'Contattaci per qualsiasi domanda sui nostri servizi.',
            'check_booking_status': 'Stato Prenotazione'
        },
        'bn': {
            'book_your_appointment': 'আপনার অ্যাপয়েন্টমেন্ট বুক করুন',
            'schedule_visit': 'আমাদের পেশাদার টিমের সাথে একটি সাক্ষাৎ নির্ধারণ করুন',
            'appointment_form': 'অ্যাপয়েন্টমেন্ট ফর্ম',
            'fill_details': 'অ্যাপয়েন্টমেন্ট বুক করতে আপনার বিবরণ পূরণ করুন',
            'full_name': 'পূর্ণ নাম',
            'email_id': 'ইমেইল আইডি',
            'phone_number': 'ফোন নম্বর',
            'booking_date': 'বুকিং তারিখ',
            'booking_time': 'বুকিং সময়',
            'select_service': 'সেবা নির্বাচন করুন',
            'number_of_adults': 'প্রাপ্তবয়স্কের সংখ্যা',
            'number_of_children': 'শিশুর সংখ্যা',
            'confirm_booking': 'বুকিং নিশ্চিত করুন',
            'contact_information': 'যোগাযোগ তথ্য',
            'working_hours': 'কর্মঘণ্টা',
            'need_help': 'সাহায্য প্রয়োজন?',
            'contact_for_questions': 'আমাদের সেবা সম্পর্কে যেকোনো প্রশ্নের জন্য যোগাযোগ করুন।',
            'check_booking_status': 'বুকিং স্ট্যাটাস দেখুন'
        }
    };

    function translatePage(lang) {
        document.querySelectorAll('[data-translate]').forEach(function(el) {
            const key = el.getAttribute('data-translate');
            if (translations[lang] && translations[lang][key]) {
                el.textContent = translations[lang][key];
            }
        });
    }

    const currentLang = '<?php echo $default_lang; ?>';
    translatePage(currentLang);
    </script>
</body>
</html>
