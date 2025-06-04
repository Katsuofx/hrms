<?php
  include ('../config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Personnel Data Form</title>
  <link rel="stylesheet" href="../assets/pds.css" />

</head>
  <body>
    <div class="content-container">
        <h1 class="main-title-employee">EMPLOYEES</h1>

        <table id="employee-table" class="rounded-table">
            <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Date Employed</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM personnel ORDER BY last_name ASC");

            while ($row = mysqli_fetch_assoc($sql)) {
                echo "<tr>";
                echo "<td style='text-align: center;'>" . htmlspecialchars($row['last_name']) . "</td>";
                echo "<td style='text-align: center;'>" . htmlspecialchars($row['first_name']) . "</td>";
                echo "<td style='text-align: center;'>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td style='text-align: center;'>" . htmlspecialchars($row['date_employed']) . "</td>";
                echo "<td style='text-align: center;'>
                        <button class='view-btn' data-id='" . $row['id'] . "'>View</button>
                    </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    document.querySelectorAll('.view-btn').forEach(button => {
        button.addEventListener('click', function () {
            const employeeId = this.getAttribute('data-id');
            window.location.href = `index.php?id=${employeeId}`;
        });
    });
</script>

</html>