<?php

include("db.php");
include("validate.php");
include("./path.php");

$table = 'contacts';
$contacts = selectAll('contacts');
$errors = array();


function fileUpload() {
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT . "images/" . $image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        dd($result . $destination);
        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "failed to upload image");
            dd($errors);
        }
    } else {
        $_POST['image'] = 'person.jpeg';
    }
}

if(isset($_POST['add-contact'])) {
    $errors = validateContact($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT . "images/" . $image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        dd($result . $destination);
        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "failed to upload image");
            dd($errors);
        }
    } else {
        $_POST['image'] = 'person.jpeg';
    }

    if (count($errors) === 0) {
        unset($_POST['add-contact']);
        $contact_id = create($table, $_POST);
        $_SESSION['message'] = "post created successfully";
        header('location: ./index.php');
        exit();
    } else {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $image = $_POST['image'];
    }
}

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

if(isset($_POST['update-contact'])) {
    $errors = validateContact($_POST);
    $identity = $_POST['id'];
    $user = selectOne($table, ['id' => $identity]);
    
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT . "images/" . $image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        dd($result . $destination);
        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "failed to upload image");
            dd($errors);
        }
    } 
    if (count($errors) === 0) {
        unset($_POST['update-contact'], $_POST['id']);
        $contact = update($table, $identity, $_POST);
        $_SESSION['message'] = "updated successfully";
        header('location: index.php');
        exit();
    } else {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $image = $_POST['image'];
    }
}

// if (isset($_GET['delete_id'])) {
//     $count = delete($table, $_GET['delete_id']);
//     $_SESSION['message'] = "post deleted successfully";
//     header('location: ' . BASE . 'admin/posts/index.php');
//     exit();
// }

// if (isset($_GET['published']) && isset($_GET['p_id'])) {
//     $published = $_GET['published'];
//     $p_id = $_GET['p_id'];
//     $count = update($table, $p_id, ['published' => $published]);
//     $_SESSION['message'] = "post published state changed";
//     header('location: ' . BASE . 'admin/posts/index.php');
//     exit();
// }

// if(isset($_POST['add-contact'])) {
//     contactsOnly();
//     $errors = validatePost($_POST);

//     if (!empty($_FILES['image']['name'])) {
//         $image_name = time() . '_' . $_FILES['image']['name'];
//         $destination = ROOT . "assets/images/" . $image_name;
//         $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
//         if ($result) {
//             $_POST['image'] = $image_name;
//         } else {
//             array_push($errors, "failed to upload image");
//         }
//     } else {
//         array_push($errors, "Post image required");
//     }

//     if (count($errors) === 0) {
//         unset($_POST['add-contact']);
//         $_POST['contact_id'] = $_SESSION['id'];
//         $_POST['published'] = isset($_POST['published']) ? 1 : 0;
//         // $_POST['body'] = htmlentities($_POST['body']);

//         $post_id = create($table, $_POST);
//         dd($post_id);
//         $_SESSION['message'] = "post created successfully";
//         header('location: ' . BASE . 'admin/posts/index.php');
//         exit();
//     } else {
//         $title = $_POST['title'];
//         $body = $_POST['body'];
//         $topic_id = $_POST['topic_id'];
//         $published = isset($_POST['published']) ? 1 : 0;
//     }
// }



// function getcontactname($post_id) {
//     $post = selectOne('posts', ['id' => $post_id]);
//     $contact = selectOne('contacts', ['id' => $post['contact_id']]);
//     return $contact['contactname'];
// }

// function getcontactId($post_id) {
//     $post = selectOne('posts', ['id' => $post_id]);
//     $contact = selectOne('contacts', ['id' => $post['contact_id']]);
//     return $contact['id'];
// }


?>