<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div class="container"> <br>
        <div class="row">
            <h2 class="col-9">Online Library</h2>
            <!-- trigger btn for the add book modal -->
            <button type="button" class="col-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#add_modal">Add New Books</button>
        </div>
        <input type="text" id="myInput" placeholder="Search..." class="form-control w-50">
        <div> <br>
            <table class="table table-bordered">
                <thead class=" text-center">
                    <tr>
                        <th>Title</th>
                        <th>ISBN</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Year Published</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="table">
                    <!-- Data from the DB -->
                </tbody>
            </table>
        </div>
        <!-- Add New book Modal -->
        <div class="modal fade" id="add_modal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <h5>Add New Book</h5>
                        </div>

                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form>
                            <label>Title:</label>
                            <input type="text" name="add_title" id="add_title" class="form-control" required>
                            <label>ISBN:</label>
                            <input type="text" name="add_isbn" id="add_isbn" class="form-control" required>
                            <label>Author:</label>
                            <input type="text" name="add_author" id="add_author" class="form-control" required>
                            <label>Publisher:</label>
                            <input type="text" name="add_publisher" id="add_publisher" class="form-control" required>
                            <label>Year Published:</label>
                            <input type="int" name="add_published" id="add_published" class="form-control" required>
                            <label>Category: </label>
                            <select type="text" name="add_category" id="add_category" class="form-control" required>
                                <option value="Romance">Romance</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Drama">Drama</option>
                                <option value="Drama">Adventure</option>
                                <option value="Drama">Fantasy</option>
                            </select>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="add_save" id="add_save">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- End of Add New Book Modal -->

        <!-- View Modal -->
        <div class="modal fade" id="view_modal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <h5>View Book Details</h5>
                        </div>

                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form>
                            <label>Title:</label>
                            <input type="text" name="view_title" id="view_title" class="form-control" disabled>
                            <label>ISBN:</label>
                            <input type="text" name="view_isbn" id="view_isbn" class="form-control" disabled>
                            <label>Author:</label>
                            <input type="text" name="view_author" id="view_author" class="form-control" disabled>
                            <label>Publisher:</label>
                            <input type="text" name="view_publisher" id="view_publisher" class="form-control" disabled>
                            <label>Year Published:</label>
                            <input type="int" name="view_published" id="view_published" class="form-control" disabled>
                            <label>Category: </label>
                            <select type="text" name="view_category" id="view_category" class="form-control" disabled>
                                <option value="Romance">Romance</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Drama">Drama</option>
                                <option value="Drama">Adventure</option>
                                <option value="Drama">Fantasy</option>
                            </select>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- End of View Modal -->

        <!-- Edit Modal -->
        <div class="modal fade" id="edit_modal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <h5>Edit Book Details</h5>
                        </div>

                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form>
                            <input type="hidden" name="edit_id" id="edit_id" class="form-control">
                            <label>Title:</label>
                            <input type="text" name="edit_title" id="edit_title" class="form-control" required>
                            <label>ISBN:</label>
                            <input type="text" name="edit_isbn" id="edit_isbn" class="form-control" required>
                            <label>Author:</label>
                            <input type="text" name="edit_author" id="edit_author" class="form-control" required>
                            <label>Publisher:</label>
                            <input type="text" name="edit_publisher" id="edit_publisher" class="form-control" required>
                            <label>Year Published:</label>
                            <input type="int" name="edit_published" id="edit_published" class="form-control" required>
                            <label>Category: </label>
                            <select type="text" name="edit_category" id="edit_category" class="form-control" required>
                                <option value="Romance">Romance</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Drama">Drama</option>
                                <option value="Drama">Adventure</option>
                                <option value="Drama">Fantasy</option>
                            </select>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="edit_save" id="edit_save">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- End of Edit Modal -->
    </div>
</body>

</html>
<?php include "ajax.php" ?>