<?php
include_once __DIR__ . '/../../context/contact.php';
$contact = new contact();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);
    $insertCat = $contact->delete_contact($input['contactID']);
    http_response_code(200);
    die();
}
http_response_code(400);