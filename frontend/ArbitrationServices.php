<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="arbitration_breadcrumbTitle">
                ARBITRATION AND CONCILIATION
            </h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="arbitration_breadcrumbHome">Home</a></li>
                    <li><a href="AssetManagementReliability.php" data-translate="arbitration_breadcrumbAssetManagement">Asset Management & Reliability</a></li>
                    <li data-translate="arbitration_breadcrumbCurrent">ARBITRATION AND CONCILIATION</li>
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
                <h2 class="sec-title col-xl-9" data-translate="arbitration_sectionTitle">
                    ARBITRATION AND CONCILIATION
                </h2>
                
                <p class="pe-3 fs-md" data-translate="arbitration_paragraph1">
                    One of the company's major fields of expertise is providing consultation for any company or governmental entity engaged in a technical dispute...
                </p>
                
                <p class="pe-3 fs-md" data-translate="arbitration_paragraph2">
                    The company’s specialist engineers also can provide the technical support to law offices...
                </p>

                <p class="pe-3 fs-md" data-translate="arbitration_paragraph3">
                    We provide engineering Arbitration services for the technical disputes...
                </p>

                <p class="pe-3 fs-md" data-translate="arbitration_paragraph4">
                    Company may extend also engineering support to the law offices...
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
