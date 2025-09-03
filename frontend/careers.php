<?php 
session_start();
include_once 'includes/translation_helper.php';
include("header.php");

// استدعاء الوظائف من API
$apiUrl = "http://localhost:8000/api/jobs";
$response = file_get_contents($apiUrl);
$jobs = json_decode($response, true);
?>

<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
  <div class="container z-index-common">
    <div class="breadcumb-content">
      <h1 class="breadcumb-title">Careers</h1>
      <div class="breadcumb-menu-wrap">
        <ul class="breadcumb-menu">
          <li><a href="index.php">Home</a></li>
          <li>Careers</li>
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
        <h2 class="sec-title col-xl-9">Careers</h2>
        <div class="service-box-list text-left">
          <ul>
            <?php foreach($jobs['data'] as $job): ?>
              <div class="career-card">
                <li><i class="far fa-check-circle"></i> 
                  <?= htmlspecialchars($job['title']) ?> (<?= $job['title'] ?> positions)
                </li>
                <button type="button" class="vs-btn ls-vs-btn" 
                        data-bs-toggle="modal" 
                        data-bs-target="#applyModal"
                        data-jobid="<?= $job['id'] ?>">
                  Apply Now
                </button>
              </div>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Application Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="applicationForm">
          <input type="hidden" name="job_id" id="job_id">

          <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>

          <div class="mb-3">
            <label>Career Track</label>
            <select name="career_track" class="form-control">
              <option>Engineering</option>
              <option>Management</option>
              <option>Technician</option>
            </select>
          </div>

          <div class="mb-3">
            <label>Years of Experience</label>
            <select name="experience_years" class="form-control">
              <option>0-1</option>
              <option>2-4</option>
              <option>5-7</option>
              <option>8+</option>
            </select>
          </div>
          <div class="mb-3">
            <label>What is your expected monthly net salary?</label>
            <input type="text" name="expected" class="form-control" required>
          </div>
          
          <div class="mb-3">
            <label>What is your current notice period? (Number of weeks)</label>
            <input type="text" name="period" class="form-control" required>
          </div>
          
          <div class="mb-3">
            <label>Why do you want to join?</label>
            <textarea name="motivation" class="form-control"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
// Inject job id into form
document.addEventListener('click', function(e) {
  if(e.target.matches('[data-jobid]')) {
    document.getElementById('job_id').value = e.target.getAttribute('data-jobid');
  }
});

// AJAX submit
document.getElementById('applicationForm').addEventListener('submit', function(e){
  e.preventDefault();
  let formData = new FormData(this);

  fetch('http://localhost:8000/api/application', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    alert('Application submitted successfully!');
    location.reload();
  })
  .catch(err => alert('Error submitting application'));
});
</script>

<?php include("footer.php"); ?>
