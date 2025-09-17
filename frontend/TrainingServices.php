<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="training_breadcrumbTitle">Training Services</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="training_breadcrumbHome">Home</a></li>
                    <li data-translate="training_breadcrumbCurrent">Training Services</li>
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

                <h2 class="sec-title col-xl-9" data-translate="training_sectionTitle">Training Services</h2>

                <p class="pe-3 fs-md" data-translate="training_paragraph1">
                    Arabian Dexterity provides unrivalled training services...
                </p>

                <p class="pe-3 fs-md" data-translate="training_paragraph2">
                    Our courses are condensed active learning experience...
                </p>

                <p class="pe-3 fs-md" data-translate="training_paragraph3">
                    We use contemporary learning and training principles...
                </p>

                <p class="pe-3 fs-md fw-bold" data-translate="training_paragraph4Title">
                    Our course consist of:
                </p>

                <div class="service-box-list text-left">
                    <ul>
                        <li><i class="far fa-check-circle"></i> <span data-translate="training_course_lectures">Lectures</span></li>
                        <li><i class="far fa-check-circle"></i> <span data-translate="training_course_examples">Practical examples</span></li>
                        <li><i class="far fa-check-circle"></i> <span data-translate="training_course_practice">Practice cases, do it yourself</span></li>
                    </ul>
                </div>

                <p class="pe-3 fs-md" data-translate="training_paragraph5">
                    We excel in making your training experience...
                </p>

                <p class="pe-3 fs-md" data-translate="training_paragraph6">
                    Arabian dexterity provides unique comfortable training...
                </p>

                <p class="pe-3 fs-md fw-bold" data-translate="training_paragraph7Title">
                    A list of our most wanted training courses includes:
                </p>

                <div class="main-service-box-list text-left">
                    <ul>
                        <li><i class="far fa-check-circle"></i> <a href="CMRP.php" data-translate="training_link_cmrp"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="CAMA.php" data-translate="training_link_cama"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="ShutdownTurnaroundTranning.php" data-translate="training_link_shutdown"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="ReliabilityCenteredMaintenance.php" data-translate="training_link_rcm"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="MaintenancePlanning.php" data-translate="training_link_maintenancePlanning"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="RCFA.php" data-translate="training_link_rcfa"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="ExcellenceMaintenanceReliability.php" data-translate="training_link_excellence"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="AssetManagementPolicy.php" data-translate="training_link_assetPolicy"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="PMO.php" data-translate="training_link_pmo"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="FinancialManagement.php" data-translate="training_link_financialManagement"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="ManagingMaintenance.php" data-translate="training_link_managingMaintenance"></a></li>
                        <li><i class="far fa-check-circle"></i> <a href="MRO.php" data-translate="training_link_mro"></a></li>
                    </ul>
                </div>

                <p class="pe-3 fs-md" data-translate="training_paragraph8">
                    In addition to the above course...
                </p>

                <p class="pe-3 fs-md" data-translate="training_paragraph9">
                    All courses can be delivered either in morning or evening...
                </p>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="service-middle-img wow fadeInUp" data-wow-delay="0.3s">
            <img src="assets/img/service/TrainingServices.png" alt="group">
        </div>
    </div>
</section>

<?php
include("footer.php");
?>
