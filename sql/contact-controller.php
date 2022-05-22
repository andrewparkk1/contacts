<?php

include("db.php");
include("validate.php");
include("./path.php");

$table = 'contacts';
$contacts = selectAllOrdered('contacts', 'date');
$errors = array();

$id = "";
$name = "";
$date = "";
$image = "";

if(isset($_GET['id'])) {
    $contact = selectOne($table, ['id' => $_GET['id']]);
    $id = $contact['id'];
    $name = $contact['name'];
    $date = $contact['date'];
    $image = $contact['image'];
}

if(isset($_POST['add-contact'])) {
    $errors = validateContact($_POST, true);

    if (count($errors) === 0) {
        uploadImage();
        unset($_POST['add-contact']);
        $contact_id = create($table, $_POST);
        header('location: ./index.php');
        exit();
    } else {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $image = $_POST['image'];
    }
}

if(isset($_POST['update-contact'])) {
    $errors = validateContact($_POST, false);
    if (!empty($_FILES['image']['name'])) {
        uploadImage();
    }
    
    if (count($errors) === 0) {
        $identity = $_POST['id'];
        unset($_POST['update-contact'], $_POST['id']);
        $contact = update($table, $identity, $_POST);
        header('location: index.php');
        exit();
    } else {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $image = $_POST['image'];
    }
}


function uploadImage() {
    $image_name = time() . '_' . $_FILES['image']['name'];
    $destination = ROOT . "images/" . $image_name;
    $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    if ($result) {
        $_POST['image'] = $image_name;
    } else {
        array_push($errors, "Failed to upload image");
    }
}


?>