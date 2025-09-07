<?php
session_start();
include_once 'includes/translation_helper.php';
include("header.php");

// Available services for consultation
$availableServices = [
    'asset_management' => 'Asset Management & Reliability Services',
    'consultation' => 'Consultation Services',
    'training' => 'Training Services',
    'professional_manpower' => 'Professional Manpower Supply',
    'arbitration' => 'Arbitration Services',
    'iso_55001' => 'ISO 55001:2014 Implementation',
    'asset_hierarchy' => 'Asset Hierarchy Assessment & Creation',
    'building_kpis' => 'Building Key Performance Indicators (KPIs)',
    'criticality_assessment' => 'Criticality Assessment & Ranking',
    'shutdown_turnaround' => 'Shutdown & Turnaround Planning',
    'reliability_maintenance' => 'Reliability Centered Maintenance',
    'mro_inventory' => 'MRO Inventory and Spare Parts Optimization',
    'maintenance_reliability' => 'Maintenance & Reliability Effectiveness',
    'data_preparation' => 'Data Preparation for EAM Implementation',
    'building_maintenance' => 'Building Maintenance & Asset Management',
    'cmrp' => 'CMRP Certification Program',
    'cama' => 'CAMA Certification Program',
    'shutdown_training' => 'Shutdown & Turnaround Training'
];

// Available consultation types
$consultationTypes = [
    'single_service' => 'Single Service Consultation',
    'multiple_services' => 'Multiple Services Consultation',
    'comprehensive' => 'Comprehensive Consultation',
    'specialized' => 'Specialized Consultation',
    'ongoing_support' => 'Ongoing Support & Advisory'
];

// Available urgency levels
$urgencyLevels = [
    'low' => 'Low Priority',
    'medium' => 'Medium Priority',
    'high' => 'High Priority',
    'urgent' => 'Urgent',
    'critical' => 'Critical'
];

// Available budget ranges
$budgetRanges = [
    'under_10k' => 'Under 10,000 SAR',
    '10k_25k' => '10,000 - 25,000 SAR',
    '25k_50k' => '25,000 - 50,000 SAR',
    '50k_100k' => '50,000 - 100,000 SAR',
    'over_100k' => 'Over 100,000 SAR',
    'negotiable' => 'Negotiable'
];

// Available time slots
$timeSlots = [
    '09:00' => '9:00 AM',
    '10:00' => '10:00 AM',
    '11:00' => '11:00 AM',
    '12:00' => '12:00 PM',
    '13:00' => '1:00 PM',
    '14:00' => '2:00 PM',
    '15:00' => '3:00 PM',
    '16:00' => '4:00 PM',
    '17:00' => '5:00 PM'
];

// Get minimum date (tomorrow)
$minDate = date('Y-m-d', strtotime('+1 day'));
$maxDate = date('Y-m-d', strtotime('+3 months'));
?>

<!-- Breadcrumb Section -->
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/header-bg-1-1.jpg">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" data-translate="reservation">Book Consultation</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li><a href="index.php">Home</a></li>
                    <li class="ll" data-translate="reservationtitle">Book Consultation</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section -->
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="sec-line mx-auto"></div>
                <span class="sec-subtitle" data-translate="reservation_description">Professional Consultation</span>
                <h2 class="sec-title" data-translate="book_consultation">Book Your Consultation Session</h2>
                <p class="mb-xl-4 pb-xl-3" data-translate="schedule_consultation_desc">Schedule a consultation with our expert team to discuss your asset management, reliability engineering, and operational excellence needs. Choose from our comprehensive range of services.</p>
            </div>
        </div>
    </div>
</section>

<!-- Booking Form Section -->
<section class="space-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="booking-form-wrapper wow fadeInUp" data-wow-delay="0.3s">
                    <div class="form-header text-center mb-5">
                        <h3 class="form-title" data-translate="consultation_booking_form">Consultation Booking Form</h3>
                        <p class="form-subtitle" data-translate="form_fill_description">Please fill out the form below to schedule your consultation</p>
                    </div>

                    <!-- Success/Error Messages -->
                    <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="far fa-check-circle"></i> <?php echo htmlspecialchars($_SESSION['success_message']); ?>
                        <?php if (isset($_SESSION['booking_reference'])): ?>
                        <br><strong>Booking Reference:</strong> #<?php echo htmlspecialchars($_SESSION['booking_reference']); ?>
                        <?php endif; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php 
                        unset($_SESSION['success_message']);
                        unset($_SESSION['booking_reference']);
                    endif; ?>

                    <?php if (isset($_SESSION['form_error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="far fa-exclamation-triangle"></i> <?php echo htmlspecialchars($_SESSION['form_error']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    <?php 
                        unset($_SESSION['form_error']);
                    endif; ?>

                    <form id="consultationForm" class="consultation-form" method="POST" action="process_consultation.php">
                        <!-- Company Information -->
                        <div class="form-section">
                            <h4 class="section-title"><i class="far fa-building"></i> <span data-translate="company_information">Company Information</span></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_name" data-translate="company_name">Company Name *</label>
                                        <input type="text" id="company_name" name="company_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_person" data-translate="contact_person">Contact Person *</label>
                                        <input type="text" id="contact_person" name="contact_person" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" data-translate="phone_number">Phone Number *</label>
                                        <input type="tel" id="phone" name="phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" data-translate="email_address">Email Address *</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="business_nature" data-translate="nature_of_business">Nature of Business *</label>
                                        <select id="business_nature" name="business_nature" class="form-control" required>
                                            <option value="" data-translate="select_business_nature">Select Business Nature</option>
                                            <option value="manufacturing" data-translate="manufacturing">Manufacturing</option>
                                            <option value="oil_gas" data-translate="oil_gas">Oil & Gas</option>
                                            <option value="petrochemical" data-translate="petrochemical">Petrochemical</option>
                                            <option value="mining" data-translate="mining">Mining</option>
                                            <option value="utilities" data-translate="utilities">Utilities</option>
                                            <option value="construction" data-translate="construction">Construction</option>
                                            <option value="healthcare" data-translate="healthcare">Healthcare</option>
                                            <option value="education" data-translate="education">Education</option>
                                            <option value="government" data-translate="government">Government</option>
                                            <option value="other" data-translate="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="urgency_level" data-translate="urgency_level">Urgency Level</label>
                                        <select id="urgency_level" name="urgency_level" class="form-control">
                                            <option value="" data-translate="select_urgency_level">Select Urgency Level</option>
                                            <?php foreach ($urgencyLevels as $key => $value): ?>
                                            <option value="<?php echo $key; ?>" data-translate="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" data-translate="company_address">Company Address *</label>
                                <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>

                        <!-- Consultation Details -->
                        <div class="form-section">
                            <h4 class="section-title"><i class="far fa-calendar-alt"></i> <span data-translate="consultation_details">Consultation Details</span></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="consultation_type" data-translate="consultation_type">Consultation Type *</label>
                                        <select id="consultation_type" name="consultation_type" class="form-control" required>
                                            <option value="" data-translate="select_consultation_type">Select Consultation Type</option>
                                            <?php foreach ($consultationTypes as $key => $value): ?>
                                            <option value="<?php echo $key; ?>" data-translate="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="budget_range" data-translate="budget_range">Budget Range</label>
                                        <select id="budget_range" name="budget_range" class="form-control">
                                            <option value="" data-translate="select_budget_range">Select Budget Range</option>
                                            <?php foreach ($budgetRanges as $key => $value): ?>
                                            <option value="<?php echo $key; ?>" data-translate="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Services Selection -->
                        <div class="form-section">
                            <h4 class="section-title"><i class="far fa-list-alt"></i> <span data-translate="services_required">Services Required</span></h4>
                            <div class="services-grid">
                                <div class="row">
                                    <?php foreach ($availableServices as $key => $value): ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="service-checkbox">
                                            <input type="checkbox" id="service_<?php echo $key; ?>" name="services_requested[]" value="<?php echo $key; ?>" class="service-checkbox-input">
                                            <label for="service_<?php echo $key; ?>" class="service-checkbox-label">
                                                <span class="checkbox-custom"></span>
                                                <span class="service-text"><?php echo $value; ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="select-all-wrapper mt-3">
                                    <button type="button" id="selectAllServices" class="btn btn-outline-primary btn-sm" data-translate="select_all_services">Select All Services</button>
                                    <button type="button" id="clearAllServices" class="btn btn-outline-secondary btn-sm ms-2" data-translate="clear_all">Clear All</button>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Schedule -->
                        <div class="form-section">
                            <h4 class="section-title"><i class="far fa-clock"></i> <span data-translate="schedule_timing">Schedule & Timing</span></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="booking_date" data-translate="preferred_date">Preferred Date *</label>
                                        <input type="date" id="booking_date" name="booking_date" class="form-control" min="<?php echo $minDate; ?>" max="<?php echo $maxDate; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="booking_time" data-translate="preferred_time">Preferred Time *</label>
                                        <select id="booking_time" name="booking_time" class="form-control" required>
                                            <option value="" data-translate="select_time_slot">Select Time Slot</option>
                                            <?php foreach ($timeSlots as $key => $value): ?>
                                            <option value="<?php echo $key; ?>" data-translate="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="availability-info mt-3">
                                <div id="availabilityStatus" class="alert" style="display: none;"></div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="form-section">
                            <h4 class="section-title"><i class="far fa-edit"></i> <span data-translate="additional_information">Additional Information</span></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="previous_experience" data-translate="previous_experience">Previous Experience with Similar Services</label>
                                        <select id="previous_experience" name="previous_experience" class="form-control">
                                            <option value="" data-translate="select_experience_level">Select Experience Level</option>
                            <option value="1" data-translate="yes_extensive_experience">Yes, Extensive Experience</option>
                            <option value="0" data-translate="yes_some_experience">Yes, Some Experience</option>
                            <option value="0" data-translate="no_first_time">No, First Time</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="preferred_consultant" data-translate="preferred_consultant">Preferred Consultant (Optional)</label>
                                        <input type="text" id="preferred_consultant" name="preferred_consultant" class="form-control" data-translate-placeholder="consultant_placeholder" placeholder="Consultant name or specialization">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="special_requirements" data-translate="special_requirements">Special Requirements or Notes</label>
                                <textarea id="special_requirements" name="special_requirements" class="form-control" rows="4" data-translate-placeholder="requirements_placeholder" placeholder="Please describe any specific requirements, challenges, or additional information that would help us better understand your needs..."></textarea>
                            </div>
                        </div>

                        <!-- Form Submission -->
                        <div class="form-section text-center">
                            <div class="form-actions">
                                <button type="submit" class="vs-btn" id="submitBtn">
                                    <i class="far fa-paper-plane"></i> <span data-translate="submit_consultation_request">Submit Consultation Request</span>
                                </button>
                                <button type="reset" class="vs-btn vs-btn-outline ms-3">
                                    <i class="far fa-undo"></i> <span data-translate="reset_form">Reset Form</span>
                                </button>
                            </div>
                            <div class="form-note mt-3">
                                <p class="text-muted"><small data-translate="required_fields_note">* Required fields must be completed</small></p>
                                <p class="text-muted"><small data-translate="contact_within_24h">We will contact you within 24 hours to confirm your consultation appointment</small></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="space-bottom" data-bg-src="assets/img/bg/cta-bg-1-1.jpg">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="cta-content text-white">
                    <h3 class="cta-title" data-translate="why_choose_dexterity">Why Choose Dexterity for Consultation?</h3>
                    <div class="row mt-5">
                        <div class="col-md-4">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="far fa-users"></i>
                                </div>
                                <h5 data-translate="expert_team">Expert Team</h5>
                                <p data-translate="expert_team_desc">30+ years of combined experience in asset management and reliability engineering</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="far fa-certificate"></i>
                                </div>
                                <h5 data-translate="certified_professionals">Certified Professionals</h5>
                                <p data-translate="certified_professionals_desc">CMRP, CAMA, and ISO certified consultants with proven track records</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="far fa-handshake"></i>
                                </div>
                                <h5 data-translate="tailored_solutions">Tailored Solutions</h5>
                                <p data-translate="tailored_solutions_desc">Customized consultation plans designed specifically for your industry and needs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom CSS for Reservation Page -->
<style>
.booking-form-wrapper {
    background: #fff;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.form-header {
    margin-bottom: 40px;
}

.form-title {
    font-size: 32px;
    font-weight: 700;
    color: var(--vs-theme-primary);
    margin-bottom: 15px;
}

.form-subtitle {
    font-size: 18px;
    color: #666;
    margin: 0;
}

.form-section {
    margin-bottom: 40px;
    padding: 30px;
    background: #f8f9fa;
    border-radius: 15px;
    border-left: 4px solid var(--vs-theme-primary);
}

.section-title {
    font-size: 24px;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
}

.section-title i {
    margin-right: 15px;
    color: var(--vs-theme-primary);
    font-size: 28px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 8px;
    display: block;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 16px;
    font-size: 16px;
    transition: all 0.3s ease;
    background: #fff;
}

.form-control:focus {
    border-color: var(--vs-theme-primary);
    box-shadow: 0 0 0 0.2rem rgba(var(--vs-theme-primary-rgb), 0.25);
    outline: none;
}

.form-control:required {
    border-left: 3px solid var(--vs-theme-primary);
}

.services-grid {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
}

.service-checkbox {
    margin-bottom: 15px;
    display: flex;
    align-items: center;
}

.service-checkbox-input {
    display: none;
}

.service-checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 10px;
    border-radius: 8px;
    transition: all 0.3s ease;
    width: 100%;
}

.service-checkbox-label:hover {
    background: #f8f9fa;
}

.checkbox-custom {
    width: 20px;
    height: 20px;
    border: 2px solid #ddd;
    border-radius: 4px;
    margin-right: 12px;
    position: relative;
    transition: all 0.3s ease;
    flex-shrink: 0;
}

.service-checkbox-input:checked + .service-checkbox-label .checkbox-custom {
    background: var(--vs-theme-primary);
    border-color: var(--vs-theme-primary);
}

.service-checkbox-input:checked + .service-checkbox-label .checkbox-custom::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-size: 14px;
    font-weight: bold;
}

.service-text {
    font-size: 14px;
    color: #1a1a1a;
    line-height: 1.4;
}

.select-all-wrapper {
    text-align: center;
}

.availability-info {
    margin-top: 20px;
}

.alert {
    padding: 15px;
    border-radius: 8px;
    margin: 0;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-warning {
    background: #fff3cd;
    color: #856404;
    border: 1px solid #ffeaa7;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.form-actions {
    margin-top: 30px;
}

.vs-btn-outline {
    background: transparent;
    border: 2px solid var(--vs-theme-primary);
    color: var(--vs-theme-primary);
}

.vs-btn-outline:hover {
    background: var(--vs-theme-primary);
    color: #fff;
}

.form-note {
    margin-top: 20px;
}

.cta-content {
    padding: 60px 0;
}

.cta-title {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 40px;
}

.feature-item {
    text-align: center;
    padding: 20px;
}

.feature-icon {
    font-size: 48px;
    color: var(--vs-theme-primary);
    margin-bottom: 20px;
}

.feature-item h5 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #fff;
}

.feature-item p {
    color: #e0e0e0;
    font-size: 14px;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .booking-form-wrapper {
        padding: 20px;
    }
    
    .form-section {
        padding: 20px;
    }
    
    .form-title {
        font-size: 24px;
    }
    
    .section-title {
        font-size: 20px;
    }
    
    .services-grid .row > div {
        margin-bottom: 10px;
    }
}
</style>

<!-- JavaScript for Form Functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('consultationForm');
    const dateInput = document.getElementById('booking_date');
    const timeInput = document.getElementById('booking_time');
    const availabilityStatus = document.getElementById('availabilityStatus');
    const selectAllBtn = document.getElementById('selectAllServices');
    const clearAllBtn = document.getElementById('clearAllServices');
    const serviceCheckboxes = document.querySelectorAll('input[name="services_requested[]"]');

    // Set minimum date to tomorrow
    const tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    dateInput.min = tomorrow.toISOString().split('T')[0];

    // Check availability when date or time changes
    function checkAvailability() {
        const date = dateInput.value;
        const time = timeInput.value;
        
        if (date && time) {
            // Here you would typically make an AJAX call to check availability
            // For now, we'll simulate availability check
            setTimeout(() => {
                const isAvailable = Math.random() > 0.3; // 70% chance of availability
                
                if (isAvailable) {
                    availabilityStatus.className = 'alert alert-success';
                    const message = window.languageSwitcher ? 
                        (translations[window.languageSwitcher.currentLang] && translations[window.languageSwitcher.currentLang]['time_slot_available'] || 'This time slot is available!') :
                        'This time slot is available!';
                    availabilityStatus.innerHTML = '<i class="far fa-check-circle"></i> ' + message;
                    availabilityStatus.style.display = 'block';
                } else {
                    availabilityStatus.className = 'alert alert-warning';
                    const message = window.languageSwitcher ? 
                        (translations[window.languageSwitcher.currentLang] && translations[window.languageSwitcher.currentLang]['time_slot_not_available'] || 'This time slot is not available. Please select another time.') :
                        'This time slot is not available. Please select another time.';
                    availabilityStatus.innerHTML = '<i class="far fa-exclamation-triangle"></i> ' + message;
                    availabilityStatus.style.display = 'block';
                }
            }, 500);
        }
    }

    dateInput.addEventListener('change', checkAvailability);
    timeInput.addEventListener('change', checkAvailability);

    // Select all services
    selectAllBtn.addEventListener('click', function() {
        serviceCheckboxes.forEach(checkbox => {
            checkbox.checked = true;
        });
    });

    // Clear all services
    clearAllBtn.addEventListener('click', function() {
        serviceCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    });

    // Form validation
    form.addEventListener('submit', function(e) {
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.style.borderColor = '#dc3545';
            } else {
                field.style.borderColor = '#e9ecef';
            }
        });

        // Check if at least one service is selected
        const selectedServices = form.querySelectorAll('input[name="services_requested[]"]:checked');
        if (selectedServices.length === 0) {
            isValid = false;
            const message = window.languageSwitcher ? 
                (translations[window.languageSwitcher.currentLang] && translations[window.languageSwitcher.currentLang]['please_select_service'] || 'Please select at least one service.') :
                'Please select at least one service.';
            alert(message);
        }

        if (!isValid) {
            e.preventDefault();
            const message = window.languageSwitcher ? 
                (translations[window.languageSwitcher.currentLang] && translations[window.languageSwitcher.currentLang]['please_fill_required'] || 'Please fill in all required fields.') :
                'Please fill in all required fields.';
            alert(message);
        }
    });

    // Real-time form validation
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                this.style.borderColor = '#dc3545';
            } else {
                this.style.borderColor = '#e9ecef';
            }
        });
    });
});
</script>

<?php include("footer.php"); ?>
