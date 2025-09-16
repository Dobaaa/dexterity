<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="kpis_breadcrumb_title">
                <?php echo $translations['kpis_breadcrumb_title']; ?>
            </h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li>
                        <a href="index.php" data-translate="kpis_breadcrumb_home">
                            <?php echo $translations['kpis_breadcrumb_home']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="ConsultationServices.php" data-translate="kpis_breadcrumb_consultation_services">
                            <?php echo $translations['kpis_breadcrumb_consultation_services']; ?>
                        </a>
                    </li>
                    <li data-translate="kpis_breadcrumb_current">
                        <?php echo $translations['kpis_breadcrumb_current']; ?>
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

                <!-- Main Section Title -->
                <h2 class="sec-title col-xl-9" data-translate="kpis_section_main_title">
                    <?php echo $translations['kpis_section_main_title']; ?>
                </h2>

                <!-- Intro Paragraph -->
                <p class="pe-3 fs-md" data-translate="kpis_intro_paragraph">
                    <?php echo $translations['kpis_intro_paragraph']; ?>
                    <br><br><?php echo $translations['kpis_intro_measure_need']; ?>
                </p>

                <!-- First List -->
                <div class="service-box-list text-left">
                    <ul>
                        <li data-translate="kpis_measure_point_1">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_measure_point_1']; ?>
                        </li>
                        <li data-translate="kpis_measure_point_2">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_measure_point_2']; ?>
                        </li>
                        <li data-translate="kpis_measure_point_3">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_measure_point_3']; ?>
                        </li>
                        <li data-translate="kpis_measure_point_4">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_measure_point_4']; ?>
                        </li>
                    </ul>
                </div>

                <!-- Second Paragraph -->
                <p class="pe-3 fs-md" data-translate="kpis_second_paragraph">
                    <?php echo $translations['kpis_second_paragraph']; ?>
                </p>

                <!-- Second List -->
                <div class="service-box-list text-left">
                    <ul>
                        <li data-translate="kpis_goal_point_1">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_goal_point_1']; ?>
                        </li>
                        <li data-translate="kpis_goal_point_2">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_goal_point_2']; ?>
                        </li>
                        <li data-translate="kpis_goal_point_3">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_goal_point_3']; ?>
                        </li>
                    </ul>
                </div>

                <!-- Third Paragraph -->
                <p class="pe-3 fs-md" data-translate="kpis_third_paragraph">
                    <?php echo $translations['kpis_third_paragraph']; ?>
                    <br><br><?php echo $translations['kpis_model_intro']; ?>
                </p>

                <!-- Third List -->
                <div class="service-box-list text-left">
                    <ul>
                        <li data-translate="kpis_model_point_1">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_model_point_1']; ?>
                        </li>
                        <li data-translate="kpis_model_point_2">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_model_point_2']; ?>
                        </li>
                        <li data-translate="kpis_model_point_3">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_model_point_3']; ?>
                        </li>
                        <li data-translate="kpis_model_point_4">
                            <i class="far fa-check-circle"></i> <?php echo $translations['kpis_model_point_4']; ?>
                        </li>
                    </ul>
                </div>

                <!-- Final Paragraph -->
                <p class="pe-3 fs-md" data-translate="kpis_final_paragraph">
                    <?php echo $translations['kpis_final_paragraph']; ?>
                </p>

            </div>
            <div class="col-lg-2"></div>
        </div>

        <!-- Image -->
        <div class="service-middle-img wow fadeInUp" data-wow-delay="0.3s">
            <img src="assets/img/service/3.jpg" alt="group">
        </div>
    </div>
</section>

<?php
include("footer.php");
?>
