<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="asset_policy_breadcrumb_title">
                Asset Management Policy & Plan
            </h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="asset_policy_breadcrumb_home">Home</a></li>
                    <li><a href="TrainingServices.php" data-translate="asset_policy_breadcrumb_training_services">Training Services</a></li>
                    <li data-translate="asset_policy_breadcrumb_current">Asset Management Policy & Plan</li>
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

                <!-- عنوان الدورة -->
                <h2 class="sec-title col-xl-9" data-translate="asset_policy_course_title">
                    Creation of Asset Management Policy & Plan According to ISO 55001
                </h2>

                <!-- الفقرة الأولى -->
                <p class="pe-3 fs-md" data-translate="asset_policy_paragraph_1">
                    This course provides a detailed look at important part of asset management: Asset Management Planning. 
                    It starts by having a quick review for the fundamentals, bases, systems and frameworks needed to be 
                    understood to go further towards setting needed asset management policy and plans. It continues to 
                    illustrate important components of Asset Management and how to create Asset Management Policy and 
                    Strategic Asset Management Plan (SAMP). Finally, it Ends with complete practice case with model plant 
                    to create the needed Asset Management Policy and SAMP.
                </p>

                <!-- الفقرة الثانية -->
                <p class="pe-3 fs-md" data-translate="asset_policy_paragraph_2">
                    It is a condensed program which can help to support the implementation of Asset Management. 
                    Course objective is to train attendees to be able to formulate entire maintenance & asset management 
                    strategy and policy according to organizational business needs and cascaded from organization main 
                    strategy and policy in the way required from ISO 55001:2014
                </p>

                <!-- الفقرة الثالثة -->
                <p class="pe-3 fs-md" data-translate="asset_policy_paragraph_3">
                    Upon completion of this training the participants should:
                </p>

                <!-- قائمة الأهداف -->
                <div class="service-box-list text-left">
                    <ul>
                        <li data-translate="asset_policy_list_item_1">
                            <i class="far fa-check-circle"></i> Fully understand Asset Management scope, structure & key elements
                        </li>
                        <li data-translate="asset_policy_list_item_2">
                            <i class="far fa-check-circle"></i> Be able to effectively develop Asset Management policy and use it to govern asset management activities.
                        </li>
                        <li data-translate="asset_policy_list_item_3">
                            <i class="far fa-check-circle"></i> Be capable to create effective Strategic Asset Management Plan (SAMP) and use it to lead optimization efforts and to enable organization for collecting Asset Management benefits.
                        </li>
                        <li data-translate="asset_policy_list_item_4">
                            <i class="far fa-check-circle"></i> To help attendees to be able to integrate a range of perspectives into a list of suggested activities that would advance the implementation and effectiveness of Asset Management practices.
                        </li>
                    </ul>
                </div>

                <!-- من يجب أن يحضر -->
                <p class="pe-3 fs-md" data-translate="asset_policy_who_should_attend_title">
                    Who should attend?
                </p>

                <p class="pe-3 fs-md" data-translate="asset_policy_who_should_attend_desc">
                    Maintenance, reliability & asset management professionals, team-leaders, key players or managers 
                    who will be responsible for maintenance, reliability and asset management system creation and implementation.
                </p>

            </div>
            <div class="col-lg-2"></div>
        </div>

        <!-- صورة وسطية -->
        <div class="service-middle-img wow fadeInUp" data-wow-delay="0.3s">
            <img src="assets/img/service/3.jpg" alt="group">
        </div>
    </div>
</section>

<?php
include("footer.php");
?>
