<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Personnel Data Form</title>
  <link rel="stylesheet" href="pds.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 32px 32px 32px 32px;
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.07);
      border-radius: 16px;
    }

    h2 {
      text-align: center;
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 24px;
      color: #222;
    }

    h3 {
      text-align: center;
      font-size: 1.2rem;
      font-weight: bold;
      margin-top: 24px;
      margin-bottom: 8px;
      color: #222;
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
      margin-bottom: 2px;
      color: #333;
    }

    form input[type="text"],
    form input[type="email"],
    form input[type="file"] {
      display: block;
      width: 100%;
      padding: 10px;
      margin: 8px 0 16px 0;
      border: 1px solid #bbb;
      border-radius: 6px;
      font-size: 1rem;
      background: #fafbfc;
      transition: border 0.2s, box-shadow 0.2s;
      box-shadow: 0 1px 2px rgba(0,0,0,0.03);
    }

    form input[type="text"]:focus,
    form input[type="email"]:focus {
      border: 1.5px solid #0509A9DB;
      outline: none;
      background: #fff;
      box-shadow: 0 0 0 2px #b3c6ff;
    }

    .form-page {
      display: none;
      animation: fadeIn 0.3s;
      border-radius: 16px;
      margin-bottom: 32px;
    }

    .form-page.active {
      display: block;
    }

    .pagination {
      text-align: center;
      margin-top: 20px;
    }

    .pagination button {
      padding: 12px 32px;
      margin: 5px;
      background-color: #0509A9DB;
      border: none;
      color: white;
      border-radius: 999px;
      font-size: 1.1rem;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(80, 80, 200, 0.10);
      transition: background 0.2s, color 0.2s, transform 0.15s, box-shadow 0.2s;
      outline: none;
      position: relative;
      overflow: hidden;
    }

    .pagination button:active {
      transform: scale(0.97);
      box-shadow: 0 1px 4px rgba(80, 80, 200, 0.08);
    }

    .pagination button:focus {
      box-shadow: 0 0 0 3px #b3c6ff;
    }

    .pagination button:before {
      content: '';
      position: absolute;
      left: 50%;
      top: 50%;
      width: 0;
      height: 0;
      background: rgba(255,255,255,0.2);
      border-radius: 100%;
      transform: translate(-50%, -50%);
      transition: width 0.3s, height 0.3s;
      z-index: 0;
    }

    .pagination button:hover:before {
      width: 200%;
      height: 500%;
    }

    .pagination button:hover:not(:disabled) {
      background: #fff;
      color: #0509A9DB;
      border: 2px solid #0509A9DB;
    }

    @media (max-width: 900px) {
      .container {
        padding: 10px 4px;
        max-width: 100vw;
        margin: 10px;
      }
      h2 {
        font-size: 1.3rem;
      }
      h3 {
        font-size: 1rem;
      }
      form input[type="text"],
      form input[type="email"],
      form input[type="file"] {
        font-size: 0.95rem;
        padding: 8px;
      }
      .pagination button {
        padding: 10px 12px;
        font-size: 1rem;
      }
    }

    @media (max-width: 600px) {
      .container {
        padding: 2vw 2vw;
        margin: 0;
        border-radius: 0;
      }
      form input[type="text"],
      form input[type="email"],
      form input[type="file"] {
        font-size: 0.95rem;
        padding: 7px;
      }
      .pagination button {
        width: 100%;
        margin: 6px 0;
        min-width: 0;
      }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>

  <!-- placeholder la ini na css, himoa na external it imo -->
</head>
<body>
  <div class="container">
    <form id="pdsForm">
      <!-- Page 1 -->
      <div class="form-page active">
        <h2>Personal Information</h2>
        <label for="emp_date">Date Employed</label>
        <input type="text" id="emp_month" name="emp_month" placeholder="Month" maxlength="2" />
        <input type="text" id="emp_day" name="emp_day" placeholder="Day" maxlength="2" />
        <input type="text" id="emp_year" name="emp_year" placeholder="Year" maxlength="4" />

        <label for="photo">Attach 2x2 Photo</label>
        <input type="file" id="photo" name="photo" />

        <input type="text" id="surname" name="surname" placeholder="Surname" />
        <input type="text" id="first_name" name="first_name" placeholder="First Name" />
        <input type="text" id="middle_name" name="middle_name" placeholder="Middle Name" />
        <input type="text" id="maiden_name" name="maiden_name" placeholder="If married, write maiden name" />
        <input type="text" id="place_of_birth" name="place_of_birth" placeholder="Place of Birth" />
        <input type="text" id="religion" name="religion" placeholder="Religion" />

        <label for="birth_date">Date of Birth</label>
        <input type="text" id="birth_month" name="birth_month" placeholder="MM" maxlength="2" />
        <input type="text" id="birth_day" name="birth_day" placeholder="DD" maxlength="2" />
        <input type="text" id="birth_year" name="birth_year" placeholder="YYYY" maxlength="4" />

        <input type="text" id="blood_type" name="blood_type" placeholder="Blood Type" />
        <input type="text" id="civil_status" name="civil_status" placeholder="Civil Status" />
        <input type="text" id="gender" name="gender" placeholder="Gender" />
        <input type="text" id="citizenship" name="citizenship" placeholder="Citizenship" />

        <input type="text" id="tin_no" name="tin_no" placeholder="TIN No." />
        <input type="text" id="sss_no" name="sss_no" placeholder="SSS No." />
        <input type="text" id="pagibig_no" name="pagibig_no" placeholder="PAG-IBIG No." />

        <input type="text" id="address" name="address" placeholder="Address" />
        <input type="text" id="tel_no" name="tel_no" placeholder="Tel. No." />
        <input type="text" id="cell_no" name="cell_no" placeholder="Cellphone No." />
        <input type="email" id="email" name="email" placeholder="Email" />
      </div>

      <!-- Page 2 -->
      <div class="form-page">
        <h2>Family Background</h2>

        <h3>Spouse</h3>
        <input type="text" id="spouse_surname" name="spouse_surname" placeholder="Surname" />
        <input type="text" id="spouse_first" name="spouse_first" placeholder="First Name" />
        <input type="text" id="spouse_middle" name="spouse_middle" placeholder="Middle Name" />

        <h3>Children</h3>
        <input type="text" id="child1_name" name="child1_name" placeholder="Fullname" />
        <input type="text" id="child1_age" name="child1_age" placeholder="Age" />
        <input type="text" id="child2_name" name="child2_name" placeholder="Fullname" />
        <input type="text" id="child2_age" name="child2_age" placeholder="Age" />
        <input type="text" id="child3_name" name="child3_name" placeholder="Fullname" />
        <input type="text" id="child3_age" name="child3_age" placeholder="Age" />

        <h3>Father</h3>
        <input type="text" id="father_surname" name="father_surname" placeholder="Surname" />
        <input type="text" id="father_first" name="father_first" placeholder="First Name" />
        <input type="text" id="father_middle" name="father_middle" placeholder="Middle Name" />
        <input type="text" id="father_birthplace" name="father_birthplace" placeholder="Place of Birth" />

        <h3>Mother (Maiden)</h3>
        <input type="text" id="mother_surname" name="mother_surname" placeholder="Surname" />
        <input type="text" id="mother_first" name="mother_first" placeholder="First Name" />
        <input type="text" id="mother_middle" name="mother_middle" placeholder="Middle Name" />
        <input type="text" id="mother_birthplace" name="mother_birthplace" placeholder="Place of Birth" />
      </div>

      <!-- Page 3 -->
      <div class="form-page">
        <h2>Education Background</h2>
        <h3>Elementary</h3>
        <input type="text" id="elem_school" name="elem_school" placeholder="Name of School" />
        <input type="text" id="elem_attendance" name="elem_attendance" placeholder="Inclusive Attendance Dates" />
        <input type="text" id="elem_degree" name="elem_degree" placeholder="Degree" />
        <input type="text" id="elem_units" name="elem_units" placeholder="Units/Course" />
        <input type="text" id="elem_honors" name="elem_honors" placeholder="Honors Received" />

        <h3>Secondary</h3>
        <input type="text" id="sec_school" name="elem_school" placeholder="Name of School" />
        <input type="text" id="sec_attendance" name="elem_attendance" placeholder="Inclusive Attendance Dates" />
        <input type="text" id="sec_degree" name="elem_degree" placeholder="Degree" />
        <input type="text" id="sec_units" name="elem_units" placeholder="Units/Course" />
        <input type="text" id="sec_honors" name="elem_honors" placeholder="Honors Received" />

        <h3>Vocational</h3>
        <input type="text" id="voc_school" name="elem_school" placeholder="Name of School" />
        <input type="text" id="voc_attendance" name="elem_attendance" placeholder="Inclusive Attendance Dates" />
        <input type="text" id="voc_degree" name="elem_degree" placeholder="Degree" />
        <input type="text" id="voc_units" name="elem_units" placeholder="Units/Course" />
        <input type="text" id="voc_honors" name="elem_honors" placeholder="Honors Received" />

        <h3>College</h3>
        <input type="text" id="coll_school" name="elem_school" placeholder="Name of School" />
        <input type="text" id="coll_attendance" name="elem_attendance" placeholder="Inclusive Attendance Dates" />
        <input type="text" id="coll_degree" name="elem_degree" placeholder="Degree" />
        <input type="text" id="coll_units" name="elem_units" placeholder="Units/Course" />
        <input type="text" id="coll_honors" name="elem_honors" placeholder="Honors Received" />

        <h3>Post Graduate</h3>
        <input type="text" id="post_school" name="elem_school" placeholder="Name of School" />
        <input type="text" id="post_attendance" name="elem_attendance" placeholder="Inclusive Attendance Dates" />
        <input type="text" id="post_degree" name="elem_degree" placeholder="Degree" />
        <input type="text" id="post_units" name="elem_units" placeholder="Units/Course" />
        <input type="text" id="post_honors" name="elem_honors" placeholder="Honors Received" />
      </div>

      <!-- Page 4 -->
      <div class="form-page">
        <h2>Eligibility & Emergency Contact</h2>

        <label for="exam_name">Name of Exam</label>
        <input type="text" id="exam_name" name="exam_name" />
        <label for="exam_date">Date</label>
        <input type="text" id="exam_date" name="exam_date" />
        <label for="rating">Rating</label>
        <input type="text" id="rating" name="rating" />
        <label for="exam_place">Place</label>
        <input type="text" id="exam_place" name="exam_place" />

        <h3>Trainings</h3>
        <input type="text" id="seminar_title" name="seminar_title" placeholder="Title of Seminar" />
        <input type="text" id="seminar_date" name="seminar_date" placeholder="Inclusive Dates" />
        <input type="text" id="seminar_hours" name="seminar_hours" placeholder="No. of Hours" />
        <input type="text" id="conducted_by" name="conducted_by" placeholder="Conducted By" />

        <h3>Work Experience</h3>
        <input type="text" id="agency" name="agency" placeholder="Agency" />
        <input type="text" id="position" name="position" placeholder="Position" />
        <input type="text" id="work_dates" name="work_dates" placeholder="Inclusive Dates" />
        <input type="text" id="appointment_status" name="appointment_status" placeholder="Status of Appointment" />

        <h3>Emergency Contact</h3>
        <input type="text" id="emergency_name" name="emergency_name" placeholder="Name" />
        <input type="text" id="emergency_relation" name="emergency_relation" placeholder="Relationship" />
        <input type="text" id="emergency_contact" name="emergency_contact" placeholder="Contact No." />
        <input type="text" id="emergency_address" name="emergency_address" placeholder="Address" />
      </div>

      <div class="pagination">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)"  disabled style="display:none;">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
    </form>
  </div>

  <script>
    /* const pages = document.querySelectorAll(".form-page"); */
    let currentPage = 0;

    function showPage(index) {
      pages.forEach((page, i) => {
        page.classList.toggle("active", i === index);
      });

      document.getElementById("prevBtn").disabled = index === 0;
      document.getElementById("nextBtn").innerText =
        index === pages.length - 1 ? "Submit" : "Next";
    }

    function nextPrev(n) {
      if (n === 1 && currentPage === pages.length - 1) {
        document.getElementById("pdsForm").submit();
        return;
      }
      currentPage += n;
      showPage(currentPage);
    }
  </script>
</body>
</html>
