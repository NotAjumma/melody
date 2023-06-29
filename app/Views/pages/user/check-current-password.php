<script src="<?= base_url('js/changePassword.js') ?>"></script>

<?php
$currentPassword = $_POST["current_password"];

$session = session();
$dbPassword = $session->get('password');

// Compare $currentPassword with the password stored in the session
$valid = password_verify($currentPassword, $dbPassword);

// Prepare the JSON response
$response = array("valid" => $valid);

// Send the JSON response
header("Content-Type: application/json");
echo json_encode($response);
?>
