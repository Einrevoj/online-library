

<?php
include "db_conn.php";

$edit_id = $_POST['edit_id'];
$edit_title = $_POST['edit_title'];
$edit_isbn = $_POST['edit_isbn'];
$edit_author = $_POST['edit_author'];
$edit_publisher = $_POST['edit_publisher'];
$edit_published = $_POST['edit_published'];
$edit_category = $_POST['edit_category'];

$sql = "UPDATE books
        SET title = '$edit_title',
        isbn = '$edit_isbn',
            author = '$edit_author',
            publisher = '$edit_publisher',
            published = '$edit_published',
            category = '$edit_category'
        WHERE id = '$edit_id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}

mysqli_close($conn);
