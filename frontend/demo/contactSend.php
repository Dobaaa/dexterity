<?php
  include("header.php");
?>
        <section class="inner-banner">
            <div class="container">
                <div class="inner-banner__content-wrap">
                    <h2 class="inner-banner__title">Contact Page</h2><!-- /.inner-banner__title -->
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="contact.php">Contact Page</a></li>
                    </ul><!-- /.thm-breadcrumb -->
                </div><!-- /.inner-banner__content-wrap -->
            </div><!-- /.container -->
        </section><!-- /.inner-banner -->
        <section class="contact-info-one">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-7">
                        <div class="contact-info-one__content">
                            <div class="block-title">
                                <p class="block-title__tag-line">Contact</p><!-- /.block-title__tag-line -->
                                <h3 class="block-title__title"><span>Contact with us</span></h3><!-- /.block-title__title -->
                                <p class="block-title__text"> Our team is here to support you at all times. Your restaurant’s growth is our first priority </p><!-- /.block-title__text -->
                            </div><!-- /.block-title -->
                           <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3626.5287246893904!2d46.73972431427312!3d24.639922860130792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDM4JzIzLjciTiA0NsKwNDQnMzAuOSJF!5e0!3m2!1sen!2s!4v1679296478218!5m2!1sen!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div><!-- /.contact-info-one__content -->
                    </div><!-- /.col-lg-7 -->
                    <div class="col-lg-4 wow fadeInRight" data-wow-duration="1500ms">
                        <div class="contact-info-one__box ">
                            <div class="contact-info-one__single">
                                <p class="contact-info-one__label">Address</p><!-- /.contact-info-one__label -->
                                <p class="contact-info-one__text">Street No. 3, Second Industrial City, 3847
PO Box 14331, Riyadh
VAT 310153304100003</p><!-- /.contact-info-one__text -->
                            </div><!-- /.contact-info-one__single -->
                            <div class="contact-info-one__single">
                                <p class="contact-info-one__label">Phone</p><!-- /.contact-info-one__label -->
                                <p class="contact-info-one__text"><a href="tel:0119928289">Tel :0119928289</a><br>
                                    <a href="tel:0531213889">Mob :0531213889 / 0500422997</a></p><!-- /.contact-info-one__text -->
                            </div><!-- /.contact-info-one__single -->
                            <div class="contact-info-one__single">
                                <p class="contact-info-one__label">Email</p><!-- /.contact-info-one__label -->
                                <p class="contact-info-one__text"><a href="mailto:sales@almoznet.com">sales@almoznet.com</a>
                                    <a href="mailto:mohammed@almoznet.com">mohammed@almoznet.com</a></p><!-- /.contact-info-one__text -->
                            </div><!-- /.contact-info-one__single -->
                            <div class="contact-info-one__single">
                                <p class="contact-info-one__label">Share</p><!-- /.contact-info-one__label -->
                                <div class="contact-info-one__social">
                                    <a href="https://api.whatsapp.com/send?phone=966500422997" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                    <a href="#"><i class="fa fa-facebook-f"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-vimeo"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div><!-- /.contact-info-one__social -->
                            </div><!-- /.contact-info-one__single -->
                        </div><!-- /.contact-info-one__box -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row justify-content-between -->
            </div><!-- /.container -->
        </section><!-- /.contact-info-one -->
        <section class="contact-one">
            <div class="container">
                <div class="block-title text-center">
                    <h2 class="block-title__title"><span>Get in touch</span></h2><!-- /.block-title__title -->
                    <p class="block-title__text">Have any queries you want us to answer?
Get in touch with us and our team will assist you right away. 
                    </p><!-- /.block-title__text -->
                      
                      
                      
                      <?php
//if "email" variable is filled out, send email
  if (isset($_POST['email']))  {
  
  //Email information

  

$to = "sales@almoznet.com";
$subject = "Contact Us inquiry";

$message = "
<html>
<head>
<title>Contact Us inquiry</title>
</head>
<body>
<b>Name:</b>".$_POST['name']." <br>
<b>Email:</b>".$_POST['email']."<br>
<b>Phone Number:</b>".$_POST['phone']."<br>
<b>Subject:</b>".$_POST['subject']."<br>

<b>Message:</b>".$_POST['message']."<br>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$_POST['email'].'>' . "\r\n";


mail($to,$subject,$message,$headers);  echo "<h6>Thank you for contacting us!</h6>";
?>

<?php
  }
?>	
                </div><!-- /.block-title -->
                <form action="contact.php" class="contact-form-vaidated contact-one__form row">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Your name" name="name">
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <input type="text" placeholder="Your email" name="email">
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <input type="text" placeholder="Phone" name="phone">
                    </div><!-- /.col-lg-6 -->
             
                    <div class="col-lg-6">
                        <input type="text" name="subject" placeholder="Subject">
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-12">
                        <textarea name="message" placeholder="Your Message"></textarea>
                    </div><!-- /.col-lg-12 -->
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="thm-btn">Send Message</button>
                    </div><!-- /.col-lg-12 -->
                </form>
            </div><!-- /.container -->
        </section><!-- /.contact-one -->
      <?php
  include("footer.php");
?>












<section class="pt-20 space-bottom">
    <div class="container">
        <div class="row gx-60 align-items-center">
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s"><img src="assets/img/about/faq-1-1.jpg"
                    alt="image"></div>
            <div class="col-lg-7 pt-5 pt-xl-0 wow fadeInUp" data-wow-delay="0.4s">


                <?php
//if "email" variable is filled out, send email
  if (isset($_POST['email']))  {
  
  //Email information

  

$to = "sales@almoznet.com";
$subject = "Contact Us inquiry";

$message = "
<html>
<head>
<title>Contact Us inquiry</title>
</head>
<body>
<b>Name:</b>".$_POST['name']." <br>
<b>Email:</b>".$_POST['email']."<br>
<b>Phone Number:</b>".$_POST['phone']."<br>
<b>Subject:</b>".$_POST['subject']."<br>

<b>Message:</b>".$_POST['message']."<br>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$_POST['email'].'>' . "\r\n";


mail($to,$subject,$message,$headers);  echo "<h6>Thank you for contacting us!</h6>";
?>

                <?php
  }
?>


                <form action="https://html.vecurosoft.com/bizino/demo/mail.php" method="POST" class="ajax-contact">
                    <span class="sec-subtitle">For Any Query</span>
                    <h2 class="sec-title mb-4 pb-2">Send Us a Message</h2>
                    <div class="row gx-20">
                        <div class="col-md-6 form-group"><input type="text" placeholder="Your Name" name="name"
                                id="name" class="form-control style4"></div>
                        <div class="col-md-6 form-group"><input type="email" placeholder="Your Email" name="email"
                                id="email" class="form-control style4"></div>
                        <div class="col-md-6 form-group"><input type="number" placeholder="Phone No" name="number"
                                id="number" class="form-control style4"></div>
                        <div class="col-md-6 form-group"><input type="text" placeholder="Your Subject" name="name"
                                id="Subject" class="form-control style4"></div>
                        <div class="form-group col-12"><textarea placeholder="Message" name="message" id="message"
                                class="form-control style4"></textarea></div>
                        <div class="col-12"><button class="vs-btn" type="submit">Send Message</button></div>
                    </div>
                </form>
                <p class="form-messages mb-0 mt-3"></p>
            </div>
        </div>
    </div>
</section>










<section class="pt-20 space-bottom">
    <div class="container">
        <div class="row gx-60 align-items-center">
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s"><img src="assets/img/about/faq-1-1.jpg"
                    alt="image"></div>
            <div class="col-lg-7 pt-5 pt-xl-0 wow fadeInUp" data-wow-delay="0.4s">
                <form action="https://html.vecurosoft.com/bizino/demo/mail.php" method="POST" class="ajax-contact">
                    <span class="sec-subtitle">For Any Query</span>
                    <h2 class="sec-title mb-4 pb-2">Send Us a Message</h2>
                    <div class="row gx-20">
                        <div class="col-md-6 form-group"><input type="text" placeholder="Your Name" name="name"
                                id="name" class="form-control style4"></div>
                        <div class="col-md-6 form-group"><input type="email" placeholder="Your Email" name="email"
                                id="email" class="form-control style4"></div>
                        <div class="col-md-6 form-group"><input type="number" placeholder="Phone No" name="number"
                                id="number" class="form-control style4"></div>
                        <div class="col-md-6 form-group"><input type="text" placeholder="Your Subject" name="name"
                                id="Subject" class="form-control style4"></div>
                        <div class="form-group col-12"><textarea placeholder="Message" name="message" id="message"
                                class="form-control style4"></textarea></div>
                        <div class="col-12"><button class="vs-btn" type="submit">Send Message</button></div>
                    </div>
                </form>
                <p class="form-messages mb-0 mt-3"></p>
            </div>
        </div>
    </div>
</section>