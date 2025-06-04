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
  <link href="https://fonts.googleapis.com/css2?family=Hind&display=swap" rel="stylesheet">
  <style>
    .view-btn {
    align-items: center;
    background-color: #0A66C2;
    border: 0;
    border-radius: 100px;
    box-sizing: border-box;
    color: #ffffff;
    cursor: pointer;
    display: inline-flex;
    font-family: -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", "Fira Sans", Ubuntu, Oxygen, "Oxygen Sans", Cantarell, "Droid Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Lucida Grande", Helvetica, Arial, sans-serif;
    font-size: 16px;
    font-weight: 600;
    justify-content: center;
    line-height: 20px;
    max-width: 480px;
    min-height: 40px;
    min-width: 0px;
    overflow: hidden;
    padding: 0px 20px;
    text-align: center;
    touch-action: manipulation;
    transition: background-color 0.167s cubic-bezier(0.4, 0, 0.2, 1),
                box-shadow 0.167s cubic-bezier(0.4, 0, 0.2, 1),
                color 0.167s cubic-bezier(0.4, 0, 0.2, 1);
    user-select: none;
    -webkit-user-select: none;
    vertical-align: middle;
    }

    .view-btn:hover,
    .view-btn:focus { 
    background-color: #16437E;
    color: #ffffff;
    }

    .view-btn:active {
    background: #09223b;
    color: rgba(255, 255, 255, .7);
    }

    .view-btn:disabled { 
    cursor: not-allowed;
    background: rgba(0, 0, 0, .08);
    color: rgba(0, 0, 0, .3);
    }

    .modal-content {
      background-color: #fff;
      margin-top: 50px;
      padding: 20px;
      width: 450px;
      border-radius: 12px;
      position: relative;
      display: flex;
      flex-direction: column;
      gap: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    #personnel-img {
      width: 130px;
      height: 160px;
      object-fit: cover;
      border-radius: 8px;
      border: 2px solid #007BFF;
      box-shadow: 0 0 8px rgba(0,123,255,0.4);
    }

    #modal-body {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
    }

    .modal-field {
      display: flex;
      flex-direction: column;
    }

    .modal-field label {
      font-weight: bold;
      color: #333;
      font-size: 12px;
      margin-bottom: 2px;
    }

    .modal-field span {
      font-size: 14px;
      padding: 5px;
      background: #f5f5f5;
      border-radius: 4px;
      min-height: 18px;
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #eee;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }

    .modal-title {
      font-size: 20px;
      color: #007BFF;
      font-weight: bold;
    }

    .modal-subtitle {
      font-size: 16px;
      color: #666;
      text-align: center;
      margin-bottom: 15px;
    }

    .close {
      position: absolute;
      right: 15px;
      top: 12px;
      font-size: 28px;
      font-weight: 700;
      color: #aaa;
      cursor: pointer;
      transition: color 0.3s ease;
    }

    .close:hover {
      color: #ff4444;
    }

    .photo-section {
      display: flex;
      justify-content: center;
    }

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
    
  </style>
</head>

<body>
  <div class="content-container">
    <h1 class="main-title-employee">EMPLOYEES</h1>
    
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
          <th>More Information</th>
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
          echo "<td style='text-align: center;'>
                  <button type='button' class='view-btn' data-id='" . $row['id'] . "'>View</button>
                </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <div id="personnel-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-header">
        <div>
          <div class="modal-title">HRMS</div>
          <div class="modal-subtitle">ACLC College of Tacloban</div>
        </div>
      </div>
      
      <h2 style="text-align: center; margin: 0; margin-bottom: 5px; color: #007BFF;">Personnel Information</h2>
      
      <div class="photo-section">
        <img id="personnel-img" src="" alt="Personnel Photo" />
      </div>
      
      <div id="modal-body"></div>
    </div>
  </div>

  <script>
  document.querySelectorAll('.view-btn').forEach(button => {
    button.addEventListener('click', function () {
      const employeeId = this.getAttribute('data-id');

      fetch(`get_personnel.php?id=${employeeId}`)
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            const person = data.personnel;
            document.getElementById('personnel-img').src =  person.img_path;

            document.getElementById('modal-body').innerHTML = `
              <div class="modal-field"><label>Date Employed:</label><span>${person.date_employed || ''}</span></div>
              <div></div>
              <div class="modal-field"><label>Lastname:</label><span>${person.last_name || ''}</span></div>
              <div class="modal-field"><label>Firstname:</label><span>${person.first_name || ''}</span></div>
              <div class="modal-field"><label>Middlename:</label><span>${person.middle_name || ''}</span></div>
              <div class="modal-field"><label>Birthdate:</label><span>${person.birthdate || ''}</span></div>
              <div class="modal-field"><label>Birthplace:</label><span>${person.birthplace || ''}</span></div>
              <div class="modal-field"><label>Gender:</label><span>${person.gender_name || ''}</span></div>
              <div class="modal-field"><label>Civil Status:</label><span>${person.civil_status_name || ''}</span></div>
              <div class="modal-field"><label>Email:</label><span>${person.email || ''}</span></div>
              
            `;

            document.getElementById('personnel-modal').style.display = 'block';
          } else {
            alert('Personnel not found.');
          }
        });
    });
  });

  document.querySelector('.close').onclick = () => {
    document.getElementById('personnel-modal').style.display = 'none';
  };

  window.onclick = function (event) {
    const modal = document.getElementById('personnel-modal');
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  }

  document.getElementById('employee-search').addEventListener('input', function () {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('#employee-table tbody tr');

    rows.forEach(row => {
      const rowText = row.innerText.toLowerCase();
      row.style.display = rowText.includes(searchValue) ? '' : 'none';
    });
  });
</script>

</body>
</html>
