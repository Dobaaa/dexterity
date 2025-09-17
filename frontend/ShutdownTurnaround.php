<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="shutdown_turnaround_breadcrumb_title"></h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="shutdown_turnaround_breadcrumb_home"></a></li>
                    <li><a href="ConsultationServices.php" data-translate="shutdown_turnaround_breadcrumb_consultation"></a></li>
                    <li data-translate="shutdown_turnaround_breadcrumb_title"></li>
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
                <h2 class="sec-title col-xl-9" data-translate="shutdown_turnaround_section_title"></h2>
                
                <p class="pe-3 fs-md" data-translate="shutdown_turnaround_intro_text"></p>
                
                <div class="service-box-list text-left">
                    <ul>
                        <li><i class="far fa-check-circle"></i> <span data-translate="shutdown_turnaround_event_high_impact"></span></li>
                        <li><i class="far fa-check-circle"></i> <span data-translate="shutdown_turnaround_event_high_cost"></span></li>
                        <li><i class="far fa-check-circle"></i> <span data-translate="shutdown_turnaround_event_many_problems"></span></li>
                    </ul>
                </div>
                
                <p class="pe-3 fs-md" data-translate="shutdown_turnaround_paragraph_2"></p>

                <p class="pe-3 fs-md" data-translate="shutdown_turnaround_paragraph_3"></p>
                
                <div class="service-box-list text-left">
                    <ul>
                        <li><i class="far fa-check-circle"></i> <span data-translate="shutdown_turnaround_stat_90_percent_fail"></span></li>
                        <li><i class="far fa-check-circle"></i> <span data-translate="shutdown_turnaround_stat_80_percent_cost_overruns"></span></li>
                        <li><i class="far fa-check-circle"></i> <span data-translate="shutdown_turnaround_stat_half_schedule_slippage"></span></li>
                        <li><i class="far fa-check-circle"></i> <span data-translate="shutdown_turnaround_stat_90_percent_scope_growth"></span></li>
                        <li><i class="far fa-check-circle"></i> <span data-translate="shutdown_turnaround_stat_staff_shortage"></span></li>
                        <li><i class="far fa-check-circle"></i> <span data-translate="shutdown_turnaround_stat_schedule_abandoned"></span></li>
                        <li><i class="far fa-check-circle"></i> <span data-translate="shutdown_turnaround_stat_recommendations_never_implemented"></span></li>
                    </ul>
                </div>
                
                <p class="pe-3 fs-md" data-translate="shutdown_turnaround_final_paragraph"></p>
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
