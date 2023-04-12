<script>
    // to show existing data from db table
    $(document).ready(function() {
        $.ajax({
            url: "show.php", //file sql
            type: "POST",
            cache: false, //boolean
            success: function(data) {
                $('#table').html(data);
            }

        });

        // saving new book
        //button i - event - function
        $('#add_save').on('click', function() {
            //variable that will contain values from the input field
            var add_title = $('#add_title').val();
            var add_isbn = $('#add_isbn').val();
            var add_author = $('#add_author').val();
            var add_publisher = $('#add_publisher').val();
            var add_published = $('#add_published').val();
            var add_category = $('#add_category').val();
            if (add_title != "" && add_isbn != "" && add_author != "" && add_publisher != "" && add_published != "" && add_category != "") {
                $.ajax({
                    url: "add.php", //file sql
                    type: "POST",
                    cache: false, //boolean
                    data: {
                        //key - value pair
                        add_title: add_title,
                        add_isbn: add_isbn,
                        add_author: add_author,
                        add_publisher: add_publisher,
                        add_published: add_published,
                        add_category: add_category
                    },

                    success: function(dataResult) {
                        var data = JSON.parse(dataResult);
                        if (data.statusCode == 200) {
                            alert("Book added successfully!");
                            location.reload();
                        } else if (data.statusCode == 201) {
                            alert("Error!");
                        }
                    }

                });

            } else {
                alert("Fields are empty!");
            }
        });
        //view book
        $(function() {
            $('#view_modal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var view_id = button.data('id');
                var view_title = button.data('title');
                var view_isbn = button.data('isbn');
                var view_author = button.data('author');
                var view_publisher = button.data('publisher');
                var view_published = button.data('published');
                var view_category = button.data('category');
                var modal = $(this);
                modal.find('#view_title').val(view_title);
                modal.find('#view_isbn').val(view_isbn);
                modal.find('#view_author').val(view_author);
                modal.find('#view_publisher').val(view_publisher);
                modal.find('#view_published').val(view_published);
                modal.find('#view_category').val(view_category);
            })
        });

        //edit book
        $(function() {
            $('#edit_modal').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var edit_id = button.data('id');
                var edit_title = button.data('title');
                var edit_isbn = button.data('isbn');
                var edit_author = button.data('author');
                var edit_publisher = button.data('publisher');
                var edit_published = button.data('published');
                var edit_category = button.data('category');
                var modal = $(this);
                modal.find('#edit_id').val(edit_id);
                modal.find('#edit_title').val(edit_title);
                modal.find('#edit_isbn').val(edit_isbn);
                modal.find('#edit_author').val(edit_author);
                modal.find('#edit_publisher').val(edit_publisher);
                modal.find('#edit_published').val(edit_published);
                modal.find('#edit_category').val(edit_category);
            })
        });

        $(document).on('click', '#edit_save', function() {
            var edit_id = $('#edit_id').val();
            var edit_title = $('#edit_title').val();
            var edit_isbn = $('#edit_isbn').val();
            var edit_author = $('#edit_author').val();
            var edit_publisher = $('#edit_publisher').val();
            var edit_published = $('#edit_published').val();
            var edit_category = $('#edit_category').val();

            $.ajax({
                url: "edit.php",
                type: "POST",
                cache: false,
                data: {
                    edit_id: edit_id,
                    edit_title: edit_title,
                    edit_isbn: edit_isbn,
                    edit_author: edit_author,
                    edit_publisher: edit_publisher,
                    edit_published: edit_published,
                    edit_category: edit_category
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.statusCode == 200) {
                        alert("Changes saved successfully!");
                        location.reload();
                    } else if (data.statusCode == 201) {
                        alert("Error!");
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

        //delete btn
        $(document).on('click', '#delete', function() {
            var $rowtodelete = $(this).parent().parent();
            $.ajax({
                url: "delete.php",
                type: "POST",
                cache: false,
                data: {
                    delete_item: $(this).attr('data-id')
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.statusCode == 200) {
                        alert("Item Deleted successfully!");
                        location.reload();
                    } else if (data.statusCode == 201) {
                        alert("Error!");
                    }
                },
            })
        });

        //Search
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });


        //overall closing
    });
</script>