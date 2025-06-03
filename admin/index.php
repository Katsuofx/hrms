<?php
    require '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory Management</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
	<?php
		error_reporting(1);
		include('../include/sidebar.php');
		navigator(); 
	?>
	<div class="content" id="content">
		<?php include('dashboard.php'); ?> 
	</div>

	<script>
    $(document).ready(function () {
        let savedPage = localStorage.getItem("lastPage"); 

        if (savedPage) {
            loadPage(savedPage);
        }

        $(".nav-link").click(function (e) {
            e.preventDefault();
            
            let page = $(this).data("page");
            localStorage.setItem("lastPage", page); // Save the last selected page
            loadPage(page);
        });

        function loadPage(page) {
            $.ajax({
                url: "fetch_page.php",
                type: "GET",
                data: { page: page },
                success: function (response) {
                    $("#content").html(response);
                },
                error: function () {
                    $("#content").html("<p>Error loading page.</p>");
                }
            });
        }
    });
</script>

</body>
</html>
