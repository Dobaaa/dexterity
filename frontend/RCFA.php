<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="rcfa_breadcrumb_title">RCFA</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="rcfa_breadcrumb_home">Home</a></li>
                    <li><a href="TrainingServices.php" data-translate="rcfa_breadcrumb_training_services">Training Services</a></li>
                    <li data-translate="rcfa_breadcrumb_current">RCFA</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="sec-title col-xl-9" data-translate="rcfa_main_heading">Root Cause Failure Analysis (RCFA)</h2>
                
                <p class="pe-3 fs-md" data-translate="rcfa_paragraph_1">
                    This course provides understanding and application of root cause analysis as a procedure for discovering and analyzing the causes of problems at their roots not only looking to their symptoms in an effort to determine what can be done to solve or prevent them.
                </p>

                <p class="pe-3 fs-md" data-translate="rcfa_paragraph_2">
                    Problems will not go with just correcting or treating their symptoms but with addressing and correcting their roots. This course illustrates in depth the concepts, techniques, examples, application case studies and full practice cases of how to apply worldwide level root cause analysis with best practices and using different techniques.
                </p>

                <p class="pe-3 fs-md" data-translate="rcfa_paragraph_3">
                    Upon completion of this course the attendee should fully understand the concept and techniques of RCFA and able to be able to participate, conduct and apply by himself various techniques of root cause analysis and using different methodologies for this purpose as well.
                </p>

                <p class="pe-3 fs-md" data-translate="rcfa_paragraph_4">
                    It is a comprehensive active learning consisting of lectures, examples, case studies and full practice cases will be participated by attendees.
                </p>

                <p class="pe-3 fs-md fw-bold" data-translate="rcfa_who_should_attend_title">Who should attend?</p>

                <p class="pe-3 fs-md" data-translate="rcfa_who_should_attend_desc">
                    Anyone involved in complex problem solving, incident analysis or responsible for solving maintenance and reliability problems and preventing future occurrences of either equipment or general system failures.
                </p>
            </div>
            <div class="col-lg-2"></div>
        </div>
        
        <div class="service-middle-img wow fadeInUp" data-wow-delay="0.3s">
            <img src="assets/img/service/3.jpg" alt="group">
        </div>
    </div>
</section>

<?php
include("footer.php");
?>
