<?php
session_start();
include_once 'includes/translation_helper.php'; 
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="rcm_page_main_title">RCM</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="rcm_page_home">Home</a></li>
                    <li><a href="TrainingServices.php" data-translate="rcm_page_training_services">Training Services</a></li>
                    <li data-translate="rcm_page_breadcrumb_last">RCM</li>
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
                <h2 class="sec-title col-xl-9" data-translate="rcm_page_section_title">
                    Reliability Centered Maintenance, (RCM)
                </h2>

                <p class="pe-3 fs-md" data-translate="rcm_page_paragraph_1">
                    Reliability Centered Maintenance, RCM, is a well-proven technique to enhance reliability and safety, and to optimize the overall maintenance activities performed on site in a cost effective and applicable timeframe.
                </p>

                <p class="pe-3 fs-md" data-translate="rcm_page_paragraph_2">
                    This course provides a detailed framework for Reliability Centered Maintenance concepts, knowledge and application. It builds this framework over a solid base knowledge introduction on maintenance and asset management basis, strategies and requirements.
                </p>

                <p class="pe-3 fs-md" data-translate="rcm_page_paragraph_3">
                    In this course, attendees will learn how to become intimately familiar with all details of the Reliability Centered Maintenance procedures in order to implement them effectively and to ensure that the plant maintenance management program is kept evergreen.
                </p>

                <p class="pe-3 fs-md" data-translate="rcm_page_paragraph_4">
                    This training is a comprehensive program that can help to support the implementation and management of Reliability Centered Maintenance projects to influence organizations outcomes and deliver competitive advantage. It helps in providing the right answers in questions such as which maintenance strategy is suitable in your case, how you can effectively implement it, what obstacles and problems encounter practical application, how you will be able to measure and analyze the implementation results etc. Delegates will also have opportunity to discuss issues relevant to their workplace.
                </p>

                <p class="pe-3 fs-md" data-translate="rcm_page_paragraph_5">
                    It is a comprehensive active learning consists of lectures, examples, case studies and practice cases.
                </p>

                <p class="pe-3 fs-md fw-bold" data-translate="rcm_page_who_should_attend">
                    Who should attend?
                </p>

                <p class="pe-3 fs-md" data-translate="rcm_page_paragraph_6">
                    Maintenance, reliability and asset management professionals who are responsible for plant maintenance performance improvement including plant engineering, planning & scheduling, maintenance management and reliability.
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
