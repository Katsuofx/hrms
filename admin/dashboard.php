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
        <h1 class="main-title-employee">DASHBOARD</h1>

        <div class="dashboard-boxes-container">
            <div class="dashboard-boxes1" onclick="openEmployees()">
                <p class="dashboard-boxes-header">Number of Employees</p>
                <?php
                    $sql = mysqli_query($conn, "SELECT COUNT(*) AS employeesno FROM personnel LIMIT 5");
                        $sqlfetcher = mysqli_fetch_assoc($sql);
                        $count = $sqlfetcher['employeesno'];
                ?>
                <div class="dashboard-boxes-result-div">
                    <p class="dashboard-boxes-result" id="patientCount"><?= $count ?></p>
                </div>
            </div>

            <div class="dashboard-boxes2" onclick="">
                <p class="dashboard-boxes-header"></p>
                <?php

                ?>
                <div class="dashboard-boxes-result-div">
                    
                </div>
            </div>

            <div class="dashboard-boxes3" onclick="">
                <p class="dashboard-boxes-header"></p>
                <?php

                ?>
                <div class="dashboard-boxes-result-div">
                    
                </div>
            </div>
        </div>

        <div>
            <table id="employee-table" class="rounded-table">
                <thead>
                    <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Date Employed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($conn, "
                    SELECT 
                        p.*, 
                        g.name AS gender_name, 
                        c.name AS civil_status_name 
                    FROM 
                        personnel p
                    INNER JOIN gender g ON p.gender_id = g.id
                    INNER JOIN civilstatus c ON p.civilstatus_id = c.id
                    ORDER BY p.last_name ASC
                    ");


                    while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td style='text-align: center;'>" . htmlspecialchars($row['last_name']) . "</td>";
                    echo "<td style='text-align: center;'>" . htmlspecialchars($row['first_name']) . "</td>";
                    echo "<td style='text-align: center;'>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td style='text-align: center;'>" . htmlspecialchars($row['date_employed']) . "</td>";
                    echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    function openEmployees() {
        window.location.href = "index.php?#employee";
    }
</script>
</html>