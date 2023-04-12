<?php
include "db_conn.php";

$add_title = $_POST['add_title'];
$add_isbn = $_POST['add_isbn'];
$add_author = $_POST['add_author'];
$add_publisher = $_POST['add_publisher'];
$add_published = $_POST['add_published'];
$add_category = $_POST['add_category'];

$sql = "INSERT INTO `books`
    ( `title`,
    `isbn`,
    `author`,
    `publisher`,
    `published`,
    `category`)
    VALUES ('$add_title',
    '$add_isbn',
    '$add_author',
    '$add_publisher',
    '$add_published',
    '$add_category')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
mysqli_close($conn);
