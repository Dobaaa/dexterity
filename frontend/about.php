<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="about_page_title">About Us</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php" data-translate="about_breadcrumb_home">Home</a></li>
                    <li data-translate="about_breadcrumb_current">About Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="position-relative space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="img-box4">
                    <div class="ripple-thumb img-1">
                        <div class="ripple"></div>
                        <div class="ripple"></div>
                        <div class="ripple"></div>
                        <div class="ripple"></div>
                        <div class="ripple-img"><img src="assets/img/about/about-1-2.jpg" alt="image"></div>
                    </div>
                    <div class="ripple-thumb img-2">
                        <div class="ripple-img"><img src="assets/img/about/about-1-1.jpg" alt="image"></div>
                    </div>
                    <div class="exp-pill">
                        <span class="exp-pill__years">30+</span>
                        <p class="exp-pill__text" data-translate="about_experience_years_text">Years Business Experience</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="ps-xxl-5 mb-30">
                    <div class="sec-line"></div>
                    <span class="sec-subtitle" data-translate="about_section_subtitle">About Us</span>
                    <h2 class="sec-title" data-translate="about_company_title">DEXTERITY INDUSTRIAL Company</h2>
                    <p class="mb-xl-4 pb-xl-3 pe-xxl-4" data-translate="about_company_description">
                        Arabian Dexterity Company is a newly established company, gaining its strength from its Senior Experts
                        in the fields of Asset Management and Plant maintenance optimization. 
                        The company has a competitive advantage with its ability to provide decent services,
                        specialized consultancy, and engineering solutions to the industrial, oil, and gas sectors under
                        challenging circumstances. The management is keen on making continuous efforts to meet the challenge
                        of forging strong, long-term, and reliable alliances with valued clients and partners.
                        <br><br>
                        We are fully committed to our clients to optimize time and resources,
                        in a professional, quality, and cost-effective manner.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-5 offset-xl-1 align-self-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="sec-line"></div>
                <span class="sec-subtitle" data-translate="about_mission_subtitle">DEXTERITY INDUSTRIAL Company</span>
                <h2 class="sec-title" data-translate="about_mission_title">Mission & Vision</h2>
                <p class="mb-xl-4 pb-xl-3 pe-xxl-4" data-translate="about_mission_description">
                    To be the most trusted business partner in the field of asset management, risk management & operational excellence.
                    <br><br>
                    To profitably grow our business by providing innovative, technologically superior-effective
                    industrial services and systems.
                </p>
            </div>
            <div class="col-lg-6 mb-40 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                <div class="img-box1">
                    <div class="img-2"><img src="assets/img/about/3.jpg" alt="About image"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="space-top space-bottom">
    <div class="container">
        <div class="center-line"></div>
        <span class="sec-subtitle text-center" data-translate="about_experience_subtitle">Our Experience</span>
        <h2 class="sec-title text-center" data-translate="about_experience_title">
            WE provide our services with "DEXTERITY" <br> <span class="arabic-font">نحن نقدم لكم خدماتنا ب"براعة"</span>
        </h2>
        <div data-bg-src="assets/img/shape/counter-shape-1-1.jpg">
            <div class="row gx-0">
                <div class="col-md-6 col-lg vs-counter wow fadeInUp" data-wow-delay="0.3s">
                    <div class="vs-counter__number"><span class="amount">30</span></div>
                    <p class="vs-counter__text" data-translate="about_experience_years">Years of Experts Experience</p>
                </div>
                <div class="col-md-6 col-lg vs-counter wow fadeInUp" data-wow-delay="0.4s">
                    <div class="vs-counter__number"><span class="amount">300</span> <span class="quora">+</span></div>
                    <p class="vs-counter__text" data-translate="about_projects_done">Projects Done</p>
                </div>
                <div class="col-md-6 col-lg vs-counter wow fadeInUp" data-wow-delay="0.5s">
                    <div class="vs-counter__number"><span class="amount">50</span> <span class="quora">+</span></div>
                    <p class="vs-counter__text" data-translate="about_happy_clients">Happy Clients</p>
                </div>
                <div class="col-md-6 col-lg vs-counter wow fadeInUp" data-wow-delay="0.6s">
                    <div class="vs-counter__number"><span class="amount">40</span> <span class="quora">+</span></div>
                    <p class="vs-counter__text" data-translate="about_workers">Workers</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
