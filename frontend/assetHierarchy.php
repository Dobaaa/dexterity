<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="asset_hierarchy_title">Asset Hierarchy</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="asset_hierarchy_breadcrumb_home">Home</a></li>
                    <li><a href="ConsultationServices.php" data-translate="asset_hierarchy_breadcrumb_consultation_services">Consultation Services</a></li>
                    <li data-translate="asset_hierarchy_breadcrumb_asset_hierarchy">Asset Hierarchy</li>
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
                
                <h2 class="sec-title col-xl-9" data-translate="asset_hierarchy_section_title">Asset Hierarchy</h2>
                
                <p class="pe-3 fs-md" data-translate="asset_hierarchy_intro_paragraph">
                    It may be easier than you think. Like other successful businesses, you’ll want
                    to make sure you have a good idea first. From there, you can build a product or service that
                    solves a need for consumers. But before you jump into anything, you’ll want to make sure you do
                    your research. This is crucial, because only an estimated 79.4% of companies survive their first
                    year in operation.
                </p>

                <div class="service-box-list text-left">
                    <ul>
                        <li data-translate="asset_hierarchy_list_item_1"><i class="far fa-check-circle"></i> Maintenance and Reliability Engineering.</li>
                        <li data-translate="asset_hierarchy_list_item_2"><i class="far fa-check-circle"></i> Planning & Scheduling.</li>
                        <li data-translate="asset_hierarchy_list_item_3"><i class="far fa-check-circle"></i> Execution of maintenance.</li>
                        <li data-translate="asset_hierarchy_list_item_4"><i class="far fa-check-circle"></i> Operations.</li>
                        <li data-translate="asset_hierarchy_list_item_5"><i class="far fa-check-circle"></i> And Finance.</li>
                    </ul>
                </div>

                <p class="pe-3 fs-md" data-translate="asset_hierarchy_detailed_paragraph">
                    A clear and adequate hierarchy structure of assets (Taxonomy), according to
                    international standards, is the fundamental principle of a system for the asset information
                    management.
                    An adequate hierarchy facilitates the implementation of reliability tools & contributes to improve
                    the control of data and information of the equipment. Also, The correct allocation of costs
                    associated with the life cycle of assets is fundamental to establish strategies for asset
                    replacement.
                    It is necessary to establish an adequate hierarchy of assets from the early stages as part of
                    reliability tools that allow managing the information of the assets to increase their useful life.
                    Dexterity provides asset hierarchy related services starting from assessment of existing hierarchy
                    to complete update and creation of needed hierarchy that facilitate correct management of assets and
                    their intended values and brings the above benefits.
                    Asset hierarchy creation could be either according to ISO 14224 latest edition, KKS , RDS-PP or
                    RDS-RS coding methodologies.
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
