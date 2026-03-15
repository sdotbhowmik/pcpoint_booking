<?php
$contact_message = '';
$contact_status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $service = $_POST['service'] ?? '';
    $message = trim($_POST['message'] ?? '');
    
    if ($name && $email && $service && $message) {
        $to = 'info@cafpcpoint.it';
        $subject = 'New Contact Form Submission - ' . $service;
        
        $email_body = "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Service: $service\n\n";
        $email_body .= "Message:\n$message\n\n";
        $email_body .= "---\nSent from PC Point Booking Contact Form";
        
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        if (mail($to, $subject, $email_body, $headers)) {
            $contact_status = 'success';
            $contact_message = 'Thank you! Your message has been sent. We will get back to you soon.';
        } else {
            $contact_status = 'error';
            $contact_message = 'Sorry, something went wrong. Please try again later.';
        }
    } else {
        $contact_status = 'error';
        $contact_message = 'Please fill in all required fields.';
    }
}
?>
<section class="contact-section" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-info">
                    <h2 data-translate="get_in_touch">Get in Touch</h2>
                    <p data-translate="contact_subtitle">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                    
                    <div class="faq-section mt-4">
                        <h4 data-translate="faq_title">Frequently Asked Questions</h4>
                        
                        <div class="faq-item">
                            <h6><i class="fas fa-question-circle me-2"></i><span data-translate="faq_service_q">What services do you offer?</span></h6>
                            <p data-translate="faq_service_a">We provide CAF (Tax Assistance), Patronato (Social Services), Immigration Services, Accounting, and Legal Advice.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h6><i class="fas fa-question-circle me-2"></i><span data-translate="faq_booking_q">How do I book an appointment?</span></h6>
                            <p data-translate="faq_booking_a">You can book an appointment directly through our online booking system or visit one of our offices.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h6><i class="fas fa-question-circle me-2"></i><span data-translate="faq_documents_q">What documents do I need for tax assistance?</span></h6>
                            <p data-translate="faq_documents_a">Bring your ID, income documents, and any previous tax returns. Our staff will guide you through the process.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h6><i class="fas fa-question-circle me-2"></i><span data-translate="faq_immigration_q">Do you offer immigration assistance?</span></h6>
                            <p data-translate="faq_immigration_a">Yes, we provide comprehensive immigration services including permit applications and renewals.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h6><i class="fas fa-question-circle me-2"></i><span data-translate="faq_hours_q">What are your working hours?</span></h6>
                            <p data-translate="faq_hours_a">Monday - Friday: 9:00 AM - 6:00 PM | Saturday: 10:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form-card">
                    <h3 data-translate="send_message">Send us a Message</h3>
                    
                    <form action="#contact" method="post" id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-translate="your_name">Your Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name" required value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" data-translate="email_address">Email Address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-translate="service_looking">I'm Looking For...</label>
                            <select class="form-select" name="service" required>
                                <option value="" data-translate="select_service">Select a Service</option>
                                <option value="CAF - Tax Assistance" <?php echo ($_POST['service'] ?? '') === 'CAF - Tax Assistance' ? 'selected' : ''; ?>>CAF - Tax Assistance</option>
                                <option value="Patronato - Social Services" <?php echo ($_POST['service'] ?? '') === 'Patronato - Social Services' ? 'selected' : ''; ?>>Patronato - Social Services</option>
                                <option value="Immigration Services" <?php echo ($_POST['service'] ?? '') === 'Immigration Services' ? 'selected' : ''; ?>>Immigration Services</option>
                                <option value="Accounting / Commercialista" <?php echo ($_POST['service'] ?? '') === 'Accounting / Commercialista' ? 'selected' : ''; ?>>Accounting / Commercialista</option>
                                <option value="Legal Advice" <?php echo ($_POST['service'] ?? '') === 'Legal Advice' ? 'selected' : ''; ?>>Legal Advice</option>
                                <option value="Other" <?php echo ($_POST['service'] ?? '') === 'Other' ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-translate="your_message">Your Message</label>
                            <textarea class="form-control" name="message" rows="6" placeholder="How can we help you?" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                        </div>
                        <button type="submit" name="contact_submit" class="btn btn-primary w-100">
                            <i class="fas fa-paper-plane me-2"></i><span data-translate="send_message_btn">Send Message</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($contact_message): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    <?php if ($contact_status === 'success'): ?>
    Swal.fire({
        icon: 'success',
        title: 'Message Sent!',
        text: '<?php echo addslashes($contact_message); ?>',
        confirmButtonColor: '#228B22',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('contactForm').reset();
        }
    });
    <?php else: ?>
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '<?php echo addslashes($contact_message); ?>',
        confirmButtonColor: '#228B22',
        confirmButtonText: 'OK'
    });
    <?php endif; ?>
});
</script>
<?php endif; ?>

<style>
.faq-section h4 {
    margin-bottom: 1.5rem;
    color: #333;
    font-weight: 600;
}
.faq-item {
    margin-bottom: 1.25rem;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 4px solid var(--primary);
}
.faq-item h6 {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}
.faq-item p {
    margin-bottom: 0;
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.5;
}
.faq-item .fa-question-circle {
    color: var(--primary);
}
</style>
