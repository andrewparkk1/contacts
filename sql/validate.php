<?php

function validateContact($contact, $isNewContact) {
    $errors = array();
    if (empty($contact['name'])) {
        array_push($errors, 'Name is required');
    }
    if ($isNewContact) {
        if (empty($_FILES['image']['name'])) {
            array_push($errors, 'Image is required');
        }
    }
    if (empty($contact['date'])) {
        array_push($errors, 'Date is required');
    }
    return $errors;
}


?>