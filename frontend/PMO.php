<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="pmo_page_header_title">PMO</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="pmo_page_breadcrumb_home">Home</a></li>
                    <li><a href="TrainingServices.php" data-translate="pmo_page_breadcrumb_training">Training Services</a></li>
                    <li data-translate="pmo_page_breadcrumb_current">PMO</li>
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

                <h2 class="sec-title col-xl-9" data-translate="pmo_page_main_heading">
                    Preventive Maintenance Optimization (PMO)
                </h2>

                <p class="pe-3 fs-md" data-translate="pmo_page_paragraph_1">
                    Many plants and facilities have ineffective preventive and predictive maintenance procedures in place which include redundant and non-value-added maintenance procedures wasting time and money.
                </p>

                <p class="pe-3 fs-md" data-translate="pmo_page_paragraph_2">
                    This course provides a detailed framework for Preventive Maintenance optimization concepts, knowledge and application. It builds this framework over a solid base knowledge introduction on maintenance and asset management basis, strategies and requirements.
                </p>

                <p class="pe-3 fs-md" data-translate="pmo_page_paragraph_3">
                    This training is a comprehensive program which provides information and practical training that enables plant engineers to successfully plan, implement and evaluate preventive maintenance optimization project activities towards fulfilling both short and long terms maintenance objectives and to help achieve organization goals of improved reliability and profitability providing stakeholders required values.
                </p>

                <p class="pe-3 fs-md" data-translate="pmo_page_paragraph_4">
                    Upon completion of this course the attendee should fully understand the concepts and techniques of preventive maintenance optimization and be able to participate, use and apply by himself various techniques, tools and methodologies of preventive maintenance optimization.
                </p>

                <p class="pe-3 fs-md" data-translate="pmo_page_paragraph_5">
                    It is a comprehensive active learning consists of lectures, examples, case studies and full practice cases.
                </p>

                <p class="pe-3 fs-md fw-bold" data-translate="pmo_page_who_should_attend_title">
                    Who should attend?
                </p>

                <p class="pe-3 fs-md" data-translate="pmo_page_who_should_attend_text">
                    Maintenance, reliability & asset management professionals, team-leaders and professionals related to preventive maintenance planning, scheduling, execution and maintenance strategies setting and improvement.
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
