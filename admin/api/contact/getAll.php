<?php
include_once __DIR__ . '/../../context/contact.php';
include_once __DIR__ . '/../../../lib/session.php';

Session::checkSession();

$contact = new contact();
$showcontact = $contact->show_contact();

$json = [];

while ($result = $showcontact->fetch_assoc()) {
    $tmp = array(
        'contactID' => $result['contactID'],
        'fullName' => $result['fullName'],
        'email' => $result['email'],
        'message' => $result['message']
    );
    $json[] = $tmp;
}

$jsonString = json_encode($json);
header('content-type:application/json');
echo $jsonString;
