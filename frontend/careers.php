<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");
?>




<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Careers </h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Home</a></li>
                    <li>Careers </li>
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
                <h2 class="sec-title col-xl-9">Careers </h2>
                <p class="pe-3 fs-md"></p>
                <div class="service-box-list text-left">
                    <ul>
                        <div class="career-card">
                            <li><i class="far fa-check-circle"></i> Senior Rotating Equipment Reliability Engineer (5 positions)</li>
                            <button type="button" class="vs-btn ls-vs-btn" data-bs-toggle="modal" data-bs-target="#scrollableModal">
                                Apply Now
                            </button>
                        </div>
                        
                        <div class="career-card">
                            <li><i class="far fa-check-circle"></i> Senior Cost Engineer (3 positions)</li>
                            <button type="button" class="vs-btn ls-vs-btn" data-bs-toggle="modal" data-bs-target="#scrollableModal">
                                Apply Now
                            </button>
                        </div>
                        
                        <div class="career-card">
                            <li><i class="far fa-check-circle"></i> Senior Safety Engineer (2 positions)</li>
                            <button type="button" class="vs-btn ls-vs-btn" data-bs-toggle="modal" data-bs-target="#scrollableModal">
                                Apply Now
                            </button>
                        </div>
                        
                        <div class="career-card">
                            <li><i class="far fa-check-circle"></i> Senior DCS Engineer (1 position)</li>
                            <button type="button" class="vs-btn ls-vs-btn" data-bs-toggle="modal" data-bs-target="#scrollableModal">
                                Apply Now
                            </button>
                        </div>
                        
                        <div class="career-card">
                            <li><i class="far fa-check-circle"></i> Maintenance Planner (3 positions)</li>
                            <button type="button" class="vs-btn ls-vs-btn" data-bs-toggle="modal" data-bs-target="#scrollableModal">
                                Apply Now
                            </button>
                        </div>
                        
                        <div class="career-card">
                            <li><i class="far fa-check-circle"></i> Contracts coordinator (3 positions)</li>
                            <button type="button" class="vs-btn ls-vs-btn" data-bs-toggle="modal" data-bs-target="#scrollableModal">
                                Apply Now
                            </button>
                        </div>
                        
                        <div class="career-card">
                            <li><i class="far fa-check-circle"></i> Machinist technician (3 positions)</li>
                            <button type="button" class="vs-btn ls-vs-btn" data-bs-toggle="modal" data-bs-target="#scrollableModal">
                                Apply Now
                            </button>
                        </div>
                        
                        <div class="career-card">
                            <li><i class="far fa-check-circle"></i> Instrumentations technician (3 positions)</li>
                            <button type="button" class="vs-btn ls-vs-btn" data-bs-toggle="modal" data-bs-target="#scrollableModal">
                                Apply Now
                            </button>
                        </div>
                        
                        <div class="career-card">
                            <li><i class="far fa-check-circle"></i> Lab Specialist (2 positions)</li>
                            <button type="button" class="vs-btn ls-vs-btn" data-bs-toggle="modal" data-bs-target="#scrollableModal">
                                Apply Now
                            </button>
                        </div>
                        

                    </ul>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="service-middle-img wow fadeInUp" data-wow-delay="0.3s"><img src="assets/img/service/3.jpg"
                alt="group"></div>

    </div>
</section>





<!-- Scrollable Modal -->
<div class="modal fade" id="scrollableModal" tabindex="-1" aria-labelledby="scrollableModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scrollableModalLabel">Fill the Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Google Form iframe -->
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfOcyh7uVq09TuOBYKuFdO_XKO7UcfylWhkInGMc1NlYsWIDg/viewform?embedded=true" width="100%" height="600" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<?php
include("footer.php");
?>