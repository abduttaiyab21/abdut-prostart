<!DOCTYPE html>
<html>
<head>
    <title>ProStart</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Add Bootstrap 5 CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">ProStart- Abdut</h2>
        
        <div class="input-group mb-3">
            <input type="url" id="urlInput" class="form-control" placeholder="Enter URL">
            <button id="fetchButton" class="btn btn-primary">Get It!</button>
        </div>

        <!-- Display Preview -->
        <div id="preview"></div>

        <!-- Display Blogs -->
        <h3>Blog List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th width="10%">Image</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody id="blogList"></tbody>
        </table>

        <!-- Pagination Links -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center" id="pagination"></ul>
        </nav>
    </div>

    <!-- Add Bootstrap 5 JS script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#fetchButton').click(function() {
                fetchScrape();
            });

            loadPreviews(1);
        });

        function fetchScrape() {
            var url = $('#urlInput').val();
            $.ajax({
                url: "<?php echo base_url('ScrapeController/fetchScrape'); ?>",
                type: "POST",
                data: {url: url},
                dataType: "json",
                success: function(data) {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        var previewHtml = data;
                        $('#preview').html(previewHtml);
                    }
                }
            });
        }

        function loadPreviews(page) {
            $.ajax({
                url: "<?php echo base_url('ScrapeController/getBlogs'); ?>",
                type: "GET",
                data: {page: page},
                dataType: "json",
                success: function(data) {
                    var blogList = $("#blogList");
                    blogList.empty();

                    if (data.blogs.length === 0) {
                        var noRecordsRow = $("<tr>");
                        noRecordsRow.append($("<td colspan='3' class='text-center'>").text("No records found."));
                        blogList.append(noRecordsRow);
                    } else {
                        $.each(data.blogs, function(index, preview) {
                            var row = $("<tr>");
                            var imageCell = $("<td>");
                            var image = $("<img>").attr("src", preview.image).addClass("img-thumbnail");
                            imageCell.append(image);
                            row.append(imageCell);
                            row.append($("<td>").text(preview.title));
                            row.append($("<td>").text(preview.description));

                            blogList.append(row);
                        });
                    }

                    var pagination = $("#pagination");
                    pagination.empty();

                    for (var i = 1; i <= data.total_pages; i++) {
                        var pageLink = $("<li class='page-item'><a class='page-link' href='#'>" + i + "</a></li>");
                        pageLink.click(function() {
                            loadPreviews($(this).text());
                        });

                        if (i == data.current_page) {
                            pageLink.addClass("active");
                        }

                        pagination.append(pageLink);
                    }
                }
            });
        }

        function saveScrapeData() {
            var title = $('#previewTitle').val();
            var description = $('#previewDescription').val();
            var image = $('#previewImage').val();

            $.ajax({
                url: "<?php echo base_url('ScrapeController/saveScrapeData'); ?>",
                type: "POST",
                data: {
                    title: title,
                    description: description,
                    image: image
                },
                dataType: "json",
                success: function(data) {
                    alert("Data saved successfully!");
                    $('#urlInput').val('');
                    $('#preview').html('');
                    loadPreviews(1);
                },
                error: function() {
                    alert("Error saving data.");
                }
            });
        }
    </script>
</body>
</html>
