<?php
  include ('../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Personnel Data Form</title>
  <link rel="stylesheet" href="../assets/pds.css" />
  <link href="https://fonts.googleapis.com/css2?family=Hind&display=swap" rel="stylesheet" />
  <style>
    .search-wrapper {
      display: flex;
      justify-content: center;
    }

    form.search-bar {
      display: flex;
      max-width: 30em;
      padding: 1.5em;
      justify-content: center;
      width: 100%;
    }

    .search-bar input,
    .search-btn,
    .search-btn:before,
    .search-btn:after {
      transition: all 0.25s ease-out;
    }

    .search-bar input,
    .search-btn {
      width: 3em;
      height: 3em;
    }

    .search-bar input:invalid:not(:focus),
    .search-btn {
      cursor: pointer;
    }

    .search-bar,
    .search-bar input:focus,
    .search-bar input:valid {
      width: 100%;
    }

    .search-bar input {
      background: transparent;
      border-radius: 1.5em;
      box-shadow: 0 0 0 0.4em #007BFF inset;
      padding: 0.75em;
      transform: translate(0.5em,0.5em) scale(0.5);
      transform-origin: 100% 0;
      appearance: none;
    }

    .search-bar input:focus,
    .search-bar input:valid {
      background: #fff;
      border-radius: 0.375em 0 0 0.375em;
      box-shadow: 0 0 0 0.1em #007BFF inset;
      transform: scale(1);
    }

    .search-btn {
      background: #007BFF;
      border-radius: 0 0.75em 0.75em 0 / 0 1.5em 1.5em 0;
      padding: 0.75em;
      position: relative;
      transform: translate(0.25em,0.25em) rotate(45deg) scale(0.25,0.125);
      transform-origin: 0 50%;
    }

    .search-btn:before,
    .search-btn:after {
      content: "";
      display: block;
      opacity: 0;
      position: absolute;
    }

    .search-btn:before {
      border-radius: 50%;
      box-shadow: 0 0 0 0.2em #fff inset;
      top: 0.75em;
      left: 0.75em;
      width: 1.2em;
      height: 1.2em;
    }

    .search-btn:after {
      background: #fff;
      border-radius: 0 0.25em 0.25em 0;
      top: 51%;
      left: 51%;
      width: 0.75em;
      height: 0.25em;
      transform: translate(0.2em,0) rotate(45deg);
      transform-origin: 0 50%;
    }

    .search-btn span {
      display: inline-block;
      overflow: hidden;
      width: 1px;
      height: 1px;
    }

    .search-bar input:focus + .search-btn,
    .search-bar input:valid + .search-btn {
      background: #0056d2;
      border-radius: 0 0.375em 0.375em 0;
      transform: scale(1);
    }

    .search-bar input:focus + .search-btn:before,
    .search-bar input:focus + .search-btn:after,
    .search-bar input:valid + .search-btn:before,
    .search-bar input:valid + .search-btn:after {
      opacity: 1;
    }

    .search-bar input:focus + .search-btn:hover,
    .search-bar input:valid + .search-btn:hover {
      background: #003cb2;
    }

    .search-bar input:focus + .search-btn:active,
    .search-bar input:valid + .search-btn:active {
      transform: translateY(1px);
    }

    #employee-table tbody tr {
      transition: all 0.3s ease;
    }
    /* Existing styles remain unchanged */
    form.search-bar {
      display: flex;
      max-width: 30em;
      padding: 1.5em;
      justify-content: center;
      width: 100%;
    }

    /* Dropdown smaller width */
    .status-dropdown {
      width: 130px;
      padding: 0.5em;
      border-radius: 0.375em;
      border: 1px solid #007BFF;
      background: #fff;
      cursor: pointer;
      vertical-align: middle;
      font-size: 0.9em;
    }

    .status-dropdown:focus {
      border-color: #0056d2;
      outline: none;
    }

    /* Button styles */
    .save-btn, .print-btn {
      margin-left: 0.5em;
      padding: 0.45em 0.75em;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 0.375em;
      cursor: pointer;
      font-size: 0.9em;
      vertical-align: middle;
      transition: background-color 0.3s ease;
    }

    .save-btn:hover {
      background-color: #218838;
    }

    .print-btn {
      background-color: #007bff;
    }

    .print-btn:hover {
      background-color: #0056d2;
    }

    .print-btn:disabled {
      background-color: #bbbbbb;
      cursor: not-allowed;
    }

    #employee-table tbody tr {
      transition: all 0.3s ease;
    }

    .search-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 1em;
    }
  </style>
</head>

<body>
  <div class="content-container">
    <h1 class="main-title-employee">GENERATE CERTIFICATE</h1>
    
    <div class="search-wrapper">
      <form action="" class="search-bar" onsubmit="return false;">
        <input type="search" id="employee-search" name="search" pattern=".*\S.*" required placeholder="Search employees…" />
        <button class="search-btn" type="submit">
          <span>Search</span>
        </button>
      </form>
    </div>

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

        $statusOptionsQuery = "SELECT * FROM status ORDER BY name ASC";
        $statusResult = mysqli_query($conn, $statusOptionsQuery);
        $statusOptions = [];
        if ($statusResult && mysqli_num_rows($statusResult) > 0) {
          while ($statusRow = mysqli_fetch_assoc($statusResult)) {
            $statusOptions[$statusRow['id']] = $statusRow['name'];
          }
        }

        while ($row = mysqli_fetch_assoc($sql)) {
          echo "<tr>";
          echo "<td style='text-align: center;'>" . htmlspecialchars($row['last_name']) . "</td>";
          echo "<td style='text-align: center;'>" . htmlspecialchars($row['first_name']) . "</td>";
          echo "<td style='text-align: center;'>" . htmlspecialchars($row['email']) . "</td>";
          echo "<td style='text-align: center;'>" . htmlspecialchars($row['date_employed']) . "</td>";
          echo "<td style='text-align: center;'>";

          // Dropdown
          echo "<select class='status-dropdown' data-id='" . $row['id'] . "'>";
          echo "<option value=''>Select Status</option>";
          foreach ($statusOptions as $id => $name) {
              $selected = ($id == $row['status_id']) ? 'selected' : '';
              echo "<option value='" . htmlspecialchars($id) . "' $selected>" . htmlspecialchars($name) . "</option>";
          }
          echo "</select>";

          // Save button
          echo "<button type='button' class='save-btn' data-id='" . $row['id'] . "'>Save</button>";

          // Print certificate button, enabled only if status_id == 1
          $disabled = ($row['status_id'] == 1) ? "" : "disabled";
          echo "<button type='button' class='print-btn' data-id='" . $row['id'] . "' $disabled>Print Certificate</button>";

          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

<script>
  document.getElementById('employee-search').addEventListener('input', function () {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('#employee-table tbody tr');

    rows.forEach(row => {
      const rowText = row.innerText.toLowerCase();
      row.style.display = rowText.includes(searchValue) ? '' : 'none';
    });
  });

  // Save button click handler
  document.querySelectorAll('.save-btn').forEach(button => {
    button.addEventListener('click', function () {
      const statusDropdown = this.previousElementSibling;
      const statusId = statusDropdown.value;
      const employeeId = this.getAttribute('data-id');

      if (!statusId) {
        alert('Please select a status to save.');
        return;
      }

      fetch('update_personnel.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: employeeId, status_id: statusId }),
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Personnel status updated successfully!');

          // Enable or disable the print button depending on status_id
          const row = this.closest('tr');
          const printBtn = row.querySelector('.print-btn');
          if (statusId == '1') {
            printBtn.disabled = false;
          } else {
            printBtn.disabled = true;
          }
        } else {
          alert('Error updating personnel status.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Request failed: ' + error.message);
      });
    });
  });

  // Print certificate button click handler
  document.querySelectorAll('.print-btn').forEach(button => {
    button.addEventListener('click', function() {
      const employeeId = this.getAttribute('data-id');
      if (!employeeId) {
        alert('Invalid employee ID');
        return;
      }
      // Open the certificate printing page - you will need to implement this
      window.open('print_certificate.php?id=' + encodeURIComponent(employeeId), '_blank');
    });
  });
</script>

</body>
</html>

