<?php
session_start();
include_once 'includes/translation_helper.php'; 
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="shutdown_page_main_title">Shutdowns & Turnarounds Planning & Management</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="shutdown_page_home">Home</a></li>
                    <li><a href="TrainingServices.php" data-translate="shutdown_page_training_services">Training Services</a></li>
                    <li data-translate="shutdown_page_breadcrumb_last">Shutdowns & Turnarounds Planning & Management</li>
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
                <h2 class="sec-title col-xl-9" data-translate="shutdown_page_section_title">
                    Shutdowns & Turnarounds Planning & Management
                </h2>

                <p class="pe-3 fs-md" data-translate="shutdown_page_paragraph_1">
                    This course provides a complete framework and context including tools and knowledge to the ultimate optimization of shutdowns and turnarounds performance.
                </p>

                <p class="pe-3 fs-md" data-translate="shutdown_page_paragraph_2">
                    It is a detailed roadmap for turnaround management personnel to achieve organization goals of improved reliability and profitability through effective plant shutdowns and turnarounds management. It provides an emphasis on strategy, planning, preparation activities, execution and control to obtain the lowest cost, achieve the required quality, safety standards and achieve business goals.
                </p>

                <p class="pe-3 fs-md" data-translate="shutdown_page_paragraph_3">
                    This five-days course provides a solid foundation in key and advanced aspects of shutdowns and turnarounds management journey. Attendees will be taken through a structured program that includes a balance of theory and practice using a combination of collaborative learning and practical activities.
                </p>

                <p class="pe-3 fs-md" data-translate="shutdown_page_paragraph_4">
                    It provides detailed guidance and practical experience in management, preparation and control of shutdowns and turnarounds.
                </p>

                <p class="pe-3 fs-md fw-bold" data-translate="shutdown_page_who_should_attend">
                    Who should attend?
                </p>

                <p class="pe-3 fs-md" data-translate="shutdown_page_paragraph_5">
                    Maintenance, reliability & asset management professionals deaing with shutdown and turnaround from all levels.
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
