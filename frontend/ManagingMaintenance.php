<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="managing_maintenance_resources_page_title">
                Managing Maintenance Resources
            </h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li>
                        <a href="index.php" data-translate="managing_maintenance_resources_breadcrumb_home">Home</a>
                    </li>
                    <li>
                        <a href="TrainingServices.php" data-translate="managing_maintenance_resources_breadcrumb_training_services">Training Services</a>
                    </li>
                    <li data-translate="managing_maintenance_resources_breadcrumb_current">
                        Managing Maintenance Resources
                    </li>
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

                <h2 class="sec-title col-xl-9" data-translate="managing_maintenance_resources_section_title">
                    Managing Maintenance Resources
                </h2>

                <p class="pe-3 fs-md" data-translate="managing_maintenance_resources_paragraph_1">
                    This course provides a detailed explanation and framework for managing maintenance resources concepts, knowledge and application. It builds this framework over a solid base knowledge introduction on maintenance and asset management basis, strategies and requirements.
                </p>

                <p class="pe-3 fs-md" data-translate="managing_maintenance_resources_paragraph_2">
                    Course objective is to provide information and practical training that enables plant engineers and maintenance professionals to successfully managing maintenance resources activities to help achieve organization goals of improved reliability and profitability and to provide stakeholders required values.
                </p>

                <p class="pe-3 fs-md" data-translate="managing_maintenance_resources_paragraph_3">
                    This training is a comprehensive program which can help to support the effective and efficient management of maintenance resources to support fulfilling both short and long terms maintenance objectives and to effectively influence organizations outcomes and deliver competitive advantage.
                </p>

                <p class="pe-3 fs-md" data-translate="managing_maintenance_resources_paragraph_4">
                    It is a comprehensive active learning consists of lectures, examples, case studies and full practice cases.
                </p>

                <p class="pe-3 fs-md fw-bold" data-translate="managing_maintenance_resources_who_should_attend_title">
                    Who should attend?
                </p>

                <p class="pe-3 fs-md" data-translate="managing_maintenance_resources_who_should_attend_description">
                    Engineers, Specialists, Supervisors, team leaders and managers from different disciplines who have a management relationship with maintenance resources from the following functions:
                </p>

                <div class="service-box-list text-left">
                    <ul>
                        <li data-translate="managing_maintenance_resources_list_item_1">
                            <i class="far fa-check-circle"></i> Maintenance, reliability & asset management.
                        </li>
                        <li data-translate="managing_maintenance_resources_list_item_2">
                            <i class="far fa-check-circle"></i> Contracting, procurement and tendering.
                        </li>
                        <li data-translate="managing_maintenance_resources_list_item_3">
                            <i class="far fa-check-circle"></i> Performance management and improvement.
                        </li>
                        <li data-translate="managing_maintenance_resources_list_item_4">
                            <i class="far fa-check-circle"></i> Any other related functions.
                        </li>
                    </ul>
                </div>

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
