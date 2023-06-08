<?php
include_once __DIR__ ."/../../../admin/context/contact.php";
$contact = new contact();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $insertcontact = $contact->insert_contact($fullName, $email, $message);
    http_response_code(303);
    header("Location: contact.php?action=1");
    die();
}