<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="asset_management_title">Asset Management</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="breadcrumb_home">Home</a></li>
                    <li><a href="ConsultationServices.php" data-translate="breadcrumb_consultation_services">Consultation Services</a></li>
                    <li data-translate="breadcrumb_asset_management">Asset Management</li>
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
                <h2 class="sec-title col-xl-9" data-translate="section_title">Asset Management</h2>
                
                <p class="pe-3 fs-md" data-translate="intro_paragraph">
                    Asset Management and ISO 55001 asset management standard provide a holistic
                    framework for managing all functions related to physical assets.
                </p>

                <div class="service-box-list text-left">
                    <ul>
                        <li data-translate="list_item_1"><i class="far fa-check-circle"></i> It is very important because it can help organizations to.</li>
                        <li data-translate="list_item_2"><i class="far fa-check-circle"></i> Reduce costs of investing in and operating their assets.</li>
                        <li data-translate="list_item_3"><i class="far fa-check-circle"></i> Improve assets performance and reduce failure rates.</li>
                        <li data-translate="list_item_4"><i class="far fa-check-circle"></i> Improve asset value and enhance business growth.</li>
                        <li data-translate="list_item_5"><i class="far fa-check-circle"></i> Reduce the potential health, safety and environmental risks and related impacts.</li>
                        <li data-translate="list_item_6"><i class="far fa-check-circle"></i> Maintain and improve the reputation of the organization.</li>
                        <li data-translate="list_item_7"><i class="far fa-check-circle"></i> Improve the legal and regulatory compliance performance of the organization.</li>
                        <li data-translate="list_item_8"><i class="far fa-check-circle"></i> And finally, grow stakeholders’ confidence and satisfaction.</li>
                    </ul>
                </div>

                <p class="pe-3 fs-md" data-translate="detailed_paragraph">
                    Dexterity provides its consultancy services to assess the maturity of existing
                    asset management practices in your organization and works proactively with your organization to
                    build this system in a manner that ensured delivery of the above-mentioned benefits of asset
                    management.<br>
                    Through this service we prepare your organization to be ready and complying with requirements of ISO
                    55001 and drive you towards related certification including fulfilling both documentations and
                    implementations.
                    Also, asset management can go beyond the implementation of ISO 55001. Compliance with iso 55001
                    identifies that a well-structured necessary level of asset management capability has been
                    established and existed. This level is enough to prove that the organization is competent enough and
                    implemented related requirements of asset management. But going further and beyond the
                    implementation of these basic requirements can be offered to optimize this implementation toward
                    excellence in asset management and reach asset management best practices.<br>
                    Dexterity can provide your organization with a full service to assess, plan, document and implement
                    all needed Asset Management Excellence activities in addition to preparing you to go through the
                    certification process of ISO 55001.
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
