<!-- sql -->
<?php
include "db_conn.php";
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['isbn']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publisher']; ?></td>
            <td><?php echo $row['published']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td>
                <!-- trigger button modal -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view_modal" data-id="<?php echo $row['id']; ?>
                " data-title="<?php echo $row['title']; ?>
                " data-isbn="<?php echo $row['isbn']; ?>
                " data-author="<?php echo $row['author']; ?>
                " data-publisher="<?php echo $row['publisher']; ?>
                " data-published="<?php echo $row['published']; ?>
                " data-category="<?php echo $row['category']; ?>">View</button>

                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit_modal" data-id="<?php echo $row['id']; ?>
                " data-title="<?php echo $row['title']; ?>
                " data-isbn="<?php echo $row['isbn']; ?>
                " data-author="<?php echo $row['author']; ?>
                " data-publisher="<?php echo $row['publisher']; ?>
                " data-published="<?php echo $row['published']; ?>
                " data-category="<?php echo $row['category']; ?>">Edit</button>
                <button class="btn btn-danger" id="delete" data-id="<?php echo $row['id']; ?>">Delete</button>
            </td>

        </tr>

<?php

    }
} else {
    echo "<tr>
            <td> 'No result found' </td>
    </tr>";
}

mysqli_close($conn);
?>