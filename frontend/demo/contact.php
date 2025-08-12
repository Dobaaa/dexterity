<?php
include("header.php");
?>



<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Us</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="pt-20 space-bottom">
    <div class="container">
        <div class="row gx-60 align-items-center">
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s"><img src="assets/img/about/faq-1-1.jpg"
                    alt="image"></div>
            <div class="col-lg-7 pt-5 pt-xl-0 wow fadeInUp" data-wow-delay="0.4s">
                <form action="contact.php" method="POST" class="ajax-contact">
                    <span class="sec-subtitle">For Any Query</span>
                    <h2 class="sec-title mb-4 pb-2">Send Us a Message</h2>
                    <div class="row gx-20">
                        <div class="col-md-6 form-group"><input type="text" placeholder="Your Name" name="name"
                                id="name" class="form-control style4"></div>
                        <div class="col-md-6 form-group"><input type="email" placeholder="Your Email" name="email"
                                id="email" class="form-control style4"></div>
                        <div class="col-md-6 form-group"><input type="number" placeholder="Phone No" name="phone"
                                id="phone" class="form-control style4"></div>
                        <div class="col-md-6 form-group"><input type="text" placeholder="Your Subject" name="subject"
                                id="subject" class="form-control style4"></div>
                        <div class="form-group col-12"><textarea placeholder="Message" name="message" id="message"
                                class="form-control style4"></textarea></div>
                        <div class="col-12"><button class="vs-btn" type="submit">Send Message</button></div>
                    </div>
                </form>
                <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form submission
        // Your PHP form processing code here
        // For example, sending email:
        $to = "info@dexterity.com.sa";
        $subject = "Contact Us inquiry";
        $message = "Name: " . $_POST['name'] . "\r\n";
        $message .= "Email: " . $_POST['email'] . "\r\n";
        $message .= "Phone Number: " . $_POST['phone'] . "\r\n";
        $message .= "Subject: " . $_POST['subject'] . "\r\n";
        $message .= "Message: " . $_POST['message'] . "\r\n";
        $headers = "From: " . $_POST['email'] . "\r\n";

        mail($to, $subject, $message, $headers);

        echo "<p class='form-messages'>Thank you for contacting us!</p>";
    }
    ?>
            </div>
        </div>
    </div>
</section>



<section>
    <div class="container">
        <div class="row gx-0">
            <div class="col-md-4 contact-box wow fadeInUp" data-wow-delay="0.3s">
                <div class="contact-box__icon"><img src="assets/img/icon/contact-1-1.png" alt="icon"></div>
                <h3 class="contact-box__title h5">Office Address:</h3>
                <p class="contact-box__text">Al Deffi Al Fayhaa
                    Commercial Services Center,
                    Adeeb Al Mubarak Building, Office 2/2 A</p>
            </div>
            <div class="col-md-4 contact-box wow fadeInUp" data-wow-delay="0.4s">
                <div class="contact-box__icon"><img src="assets/img/icon/contact-1-2.png" alt="icon"></div>
                <h3 class="contact-box__title h5">Call Us For Help:</h3>
                <p class="contact-box__text"><a href="tel:+966133633392">+966 13 363 3392</a></p>
            </div>
            <div class="col-md-4 contact-box wow fadeInUp" data-wow-delay="0.5s">
                <div class="contact-box__icon"><img src="assets/img/icon/contact-1-3.png" alt="icon"></div>
                <h3 class="contact-box__title h5">Mail info:</h3>
                <p class="contact-box__text"><a href="mailto:info@dexterity.com.sa">info@dexterity.com.sa</a></p>
            </div>
        </div>
    </div>
    <div class="contact-map"><iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221.92410030345727!2d49.52066250445451!3d27.131562024992604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e350503bc2b7a41%3A0xa635ca49f1f7de15!2zQWwgRGVmZmkgQ2VudGVyINin2YTYr9mB2Yog2LPZhtiq2LE!5e0!3m2!1sen!2s!4v1709985630517!5m2!1sen!2s"
            width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe></div>

</section>





<?php
include("footer.php");
?>