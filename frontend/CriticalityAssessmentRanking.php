<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="criticality_breadcrumb_title">Criticality Assessment & Ranking</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="criticality_breadcrumb_home">Home</a></li>
                    <li><a href="ConsultationServices.php" data-translate="criticality_breadcrumb_consultation_services">Consultation Services</a></li>
                    <li data-translate="criticality_breadcrumb_current">Criticality Assessment & Ranking</li>
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
                <h2 class="sec-title col-xl-9" data-translate="criticality_heading">Criticality Assessment & Ranking</h2>

                <p class="pe-3 fs-md" data-translate="criticality_paragraph_1">
                    The purpose of Criticality Analysis is to identify systems and equipment items whose failure is likely to have 
                    the greatest impact on plant integrity, operational performance and maintenance costs. The objectives of this analysis 
                    include quantifying the likely losses to which plants and facilities may be exposed through equipment failure and 
                    identifying and prioritizing improvement areas where organizations may subsequently secure business benefits.
                    Prioritization of system and equipment criticality is based on the business consequences of failure including safety, 
                    environmental, repair cost, quality and production losses.
                    <br><br>
                    Criticality Analysis is a base for Maintenance & Reliability Management. It facilitates and adds value to many Asset Management areas and decisions. Some examples of these areas are:
                </p>

                <div class="service-box-list text-left">
                    <ul>
                        <li data-translate="criticality_list_item_1"><i class="far fa-check-circle"></i> Budgeting Decisions and costing priorities</li>
                        <li data-translate="criticality_list_item_2"><i class="far fa-check-circle"></i> Deciding maintenance plans & performing RCM</li>
                        <li data-translate="criticality_list_item_3"><i class="far fa-check-circle"></i> Prioritizing Proactive Maintenance Activities & RCFA needs</li>
                        <li data-translate="criticality_list_item_4"><i class="far fa-check-circle"></i> Spare parts & MRO keeping philosophies</li>
                        <li data-translate="criticality_list_item_5"><i class="far fa-check-circle"></i> Level of details for planning</li>
                        <li data-translate="criticality_list_item_6"><i class="far fa-check-circle"></i> Maintenance Work orders Prioritization</li>
                        <li data-translate="criticality_list_item_7"><i class="far fa-check-circle"></i> Dedicated focused monitoring and reporting</li>
                        <li data-translate="criticality_list_item_8"><i class="far fa-check-circle"></i> Focused Improvement initiatives</li>
                    </ul>
                </div>

                <p class="pe-3 fs-md" data-translate="criticality_paragraph_2">
                    The implementation of this criticality analysis improves the decision-making process related to asset management 
                    activities by providing a consistent evaluation for asset criticality and achieving world-class proactive and 
                    focused asset management approach. Dexterity implements the process of criticality analysis to meet organization’s 
                    needs, engages staff, and delivers a service that will meet world-class performance and best practices results.
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
