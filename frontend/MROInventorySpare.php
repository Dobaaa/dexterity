<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <!-- العنوان الرئيسي -->
            <h1 class="breadcumb-title" data-translate="mro_inventory_title">
                MRO Inventory and Spare Parts Optimization
            </h1>

            <!-- شريط التصفح -->
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li>
                        <a href="index.php" data-translate="mro_inventory_breadcrumb_home">Home</a>
                    </li>
                    <li>
                        <a href="ConsultationServices.php" data-translate="mro_inventory_breadcrumb_consultation_services">
                            Consultation Services
                        </a>
                    </li>
                    <li data-translate="mro_inventory_breadcrumb_current">
                        MRO Inventory and Spare Parts Optimization
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
                
                <!-- عنوان القسم -->
                <h2 class="sec-title col-xl-9" data-translate="mro_inventory_section_title">
                    MRO Inventory and Spare Parts Optimization
                </h2>

                <!-- الفقرات التعريفية -->
                <p class="pe-3 fs-md" data-translate="mro_inventory_intro_paragraph_1">
                    Inventories and MRO (Maintenance, Repair and Operations) spare parts are essential parts of asset health requirements, and managing them is one of the core asset management processes.
                </p>

                <p class="pe-3 fs-md" data-translate="mro_inventory_intro_paragraph_2">
                    Statistics show that materials and spare parts costs comprise more than 60% of the total maintenance cost, in addition to their impact on making plant units available, running, and producing quality goods required to achieve business success.
                </p>

                <p class="pe-3 fs-md" data-translate="mro_inventory_intro_paragraph_3">
                    Dexterity provides its services for MRO inventory and spare parts optimization to manage inventories and MRO spare parts proactively and effectively. This ensures asset availability and cost reduction using risk-based thinking and efficient supply chain management practices.
                </p>

                <p class="pe-3 fs-md" data-translate="mro_inventory_intro_paragraph_4">
                    These services include:
                </p>

                <!-- القائمة -->
                <div class="service-box-list text-left">
                    <ul>
                        <li>
                            <i class="far fa-check-circle"></i>
                            <span data-translate="mro_inventory_list_item_1">
                                Creation of MRO inventory management policy and philosophy.
                            </span>
                        </li>
                        <li>
                            <i class="far fa-check-circle"></i>
                            <span data-translate="mro_inventory_list_item_2">
                                Inventory analysis and assessment.
                            </span>
                        </li>
                        <li>
                            <i class="far fa-check-circle"></i>
                            <span data-translate="mro_inventory_list_item_3">
                                Inventory classification and criticality analysis.
                            </span>
                        </li>
                        <li>
                            <i class="far fa-check-circle"></i>
                            <span data-translate="mro_inventory_list_item_4">
                                Developing and implementing demand forecasting models.
                            </span>
                        </li>
                        <li>
                            <i class="far fa-check-circle"></i>
                            <span data-translate="mro_inventory_list_item_5">
                                Defining order points and quantities based on criticality, usage patterns, cost, and supplier lead time.
                            </span>
                        </li>
                        <li>
                            <i class="far fa-check-circle"></i>
                            <span data-translate="mro_inventory_list_item_6">
                                Inventory database creation and implementation.
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- الفقرة النهائية -->
                <p class="pe-3 fs-md" data-translate="mro_inventory_final_paragraph">
                    Millions of dollars are typically spent on MRO item inventories that are critical for the company's business operations. Dexterity helps organizations optimize these expenditures while fulfilling their purpose and providing asset availability.
                </p>
            </div>

            <div class="col-lg-2"></div>
        </div>

        <!-- صورة توضيحية -->
        <div class="service-middle-img wow fadeInUp" data-wow-delay="0.3s">
            <img src="assets/img/service/3.jpg" alt="group">
        </div>
    </div>
</section>

<?php
include("footer.php");
?>
