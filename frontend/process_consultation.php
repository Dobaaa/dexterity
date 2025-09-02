<?php
session_start();
include_once 'includes/translation_helper.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: reservation.php');
    exit;
}

// Function to send data to API
function sendToAPI($data) {
    $apiUrl = 'http://localhost:8000/api/service-requests';
    
    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        'Content-Type: application/json'
    ]);
    
    // Execute cURL request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return [
        'response' => $response,
        'httpCode' => $httpCode
    ];
}

// Process form data
$formData = [
    'company_name' => $_POST['company_name'] ?? '',
    'contact_person' => $_POST['contact_person'] ?? '',
    'phone' => $_POST['phone'] ?? '',
    'email' => $_POST['email'] ?? '',
    'business_nature' => $_POST['business_nature'] ?? '',
    'address' => $_POST['address'] ?? '',
    'booking_date' => $_POST['booking_date'] ?? '',
    'booking_time' => $_POST['booking_time'] ?? '',
    'services_requested' => $_POST['services_requested'] ?? [],
    'consultation_type' => $_POST['consultation_type'] ?? '',
    'urgency_level' => $_POST['urgency_level'] ?? 'medium',
    'budget_range' => $_POST['budget_range'] ?? '',
    'previous_experience' => isset($_POST['previous_experience']) ? (bool)$_POST['previous_experience'] : false,
    'preferred_consultant' => $_POST['preferred_consultant'] ?? '',
    'special_requirements' => $_POST['special_requirements'] ?? '',
    'additional_notes' => $_POST['additional_notes'] ?? ''
];

// Validate required fields
$requiredFields = ['company_name', 'contact_person', 'phone', 'email', 'business_nature', 'address', 'booking_date', 'booking_time', 'services_requested', 'consultation_type'];
$missingFields = [];

foreach ($requiredFields as $field) {
    if (empty($formData[$field]) || (is_array($formData[$field]) && count($formData[$field]) === 0)) {
        $missingFields[] = $field;
    }
}

if (!empty($missingFields)) {
    $_SESSION['form_error'] = 'Please fill in all required fields: ' . implode(', ', $missingFields);
    $_SESSION['form_data'] = $formData;
    header('Location: reservation.php');
    exit;
}

// Send to API
$apiResult = sendToAPI($formData);

if ($apiResult['httpCode'] === 201) {
    // Success
    $responseData = json_decode($apiResult['response'], true);
    $_SESSION['success_message'] = 'Your consultation request has been submitted successfully! We will contact you within 24 hours to confirm your appointment.';
    $_SESSION['booking_reference'] = $responseData['data']['id'] ?? 'N/A';
    header('Location: reservation.php');
    exit;
} else {
    // Error
    $errorData = json_decode($apiResult['response'], true);
    $errorMessage = $errorData['message'] ?? 'An error occurred while submitting your request.';
    
    if ($apiResult['httpCode'] === 409) {
        // Time slot conflict
        $errorMessage .= ' Please select another time slot.';
        if (isset($errorData['available_slots'])) {
            $_SESSION['available_slots'] = $errorData['available_slots'];
        }
    }
    
    $_SESSION['form_error'] = $errorMessage;
    $_SESSION['form_data'] = $formData;
    header('Location: reservation.php');
    exit;
}
?>




