
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../assets/nav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
    <div class="navbar">
        <div class="logo">
            Sports Management System
        </div>


    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var content = document.getElementById("content");s

            sidebar.classList.toggle("expanded");

            if (sidebar.classList.contains("expanded")) {
                content.style.marginLeft = "250px"; // Expand sidebar
            } else {
                content.style.marginLeft = "60px"; // Collapse sidebar

                // Close all open dropdowns
                document.querySelectorAll(".dropdown-content").forEach(function (dropdown) {
                    dropdown.style.display = "none";
                });
            }
        }
    </script>

    <style>
    .navbar {
        background-color:rgb(126, 6, 6);
        height: 36px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 1000;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .logo {
        font-size: 22px;
        font-weight: bold;
        display: flex;
        align-items: center;
    }

    .menu-icon {
        font-size: 26px;
        cursor: pointer;
        margin-right: 15px;
    }

    </style>