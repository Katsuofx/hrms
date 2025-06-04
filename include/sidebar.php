<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retractable Sidebar</title>
    <link rel="stylesheet" href="../assets/nav.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php function navigator() { ?>
    <div class="sidebar" id="sidebar">
    <div class="logo-circle"></div>
    <h2>ACLC HR<br>Management</h2>

    <a href="#" class="nav-item nav-link active" data-page="dashboard">
        <i class="fa-solid fa-gauge"></i>
        <span class="nav-text">Dashboard</span>
    </a>

    <a href="#" class="nav-item nav-link" data-page="pds">
        <i class="fa-solid fa-file-lines"></i>
        <span class="nav-text">Personal Data Sheet</span>
    </a>

    <a href="#" class="nav-item nav-link" data-page="employee">
        <i class="fa-solid fa-id-card-clip"></i>
        <span class="nav-text">Employees</span>
    </a>

    <a href="#" class="nav-item nav-link" data-page="employee-info">
        <i class="fa-solid fa-id-card-clip"></i>
        <span class="nav-text">Details</span>
    </a>
    
    <a href="#" class="nav-item nav-link" data-page="certificate">
        <i class="fa-solid fa-certificate"></i>
        <span class="nav-text">Generate Certificate</span>
    </a>


    <a href="#" class="nav1-item nav-link logout-link" data-page="logout">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        <span class="nav-text">Logout</span>
    </a>
</div>



    <script>
        $(document).ready(function () {
        let sidebar = $("#sidebar");
        let content = $("#content");

        // Expand the sidebar
        sidebar.addClass("expanded");
        content.css("margin-left", "250px"); // adjust this to match your sidebar width

        let savedPage = localStorage.getItem("activePage");
        if (savedPage && savedPage !== "logout") {
            setActiveNav(savedPage);
        }

        $(".nav-link").click(function (e) {
            e.preventDefault();
            let page = $(this).data("page");

            if (page === "logout") {
                localStorage.removeItem("activePage");
                window.location.href = "logout.php";
                return;
            }

            localStorage.setItem("activePage", page);
            setActiveNav(page);
        });

        function setActiveNav(page) {
            $(".nav-link").removeClass("active");
            $(`.nav-link[data-page="${page}"]`).addClass("active");

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


    <?php } ?>
</body>
</html>
