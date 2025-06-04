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
  <style>
    .input-error {
      border: 2px solid red;
    }
  </style>
</head>
  <body>
    <div class="content-container">
      <?php 
        if (isset($_GET['submitted']) && $_GET['submitted'] == 1): 
      ?>
          <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
            Form submitted successfully!
          </div>
      <?php 
        endif;
      ?>

      <!-- Step indicator -->
      <div class="step-indicator">
        <div class="step">1</div>
        <div class="step">2</div>
        <div class="step">3</div>
        <div class="step">4</div>
      </div>
      <!-- Step 1 -->
    <h1 class="main-title">PERSONAL DATA SHEET</h1>
    <form id="pds-form" action="pds-ajax.php" enctype="multipart/form-data" method="POST">
      <div class="form-step" id="step-1">
        
          <label class="photo-upload-wrapper" for="personnel-photo">
            <span class="photo-upload-text">Upload photo</span>
            <img id="preview" src="#" alt="Preview" style="display: none;" />
          </label>
          <input type="file" name="personnel-photo" id="personnel-photo" accept="image/*">


        <h1 class="section-title">DATE EMPLOYED</h1>
        <div class="row">
          <div class="col"><input type="date" name="personnel-dateEmployed" class="input"/></div>
        </div>
        
        <h1 class="section-title">PERSONAL INFORMATION</h1>
        <div class="column-group">
          <div class="row">
            <div class="col">Last Name<input type="text" name="personnel-lname" id="personnel-lname" class="input" required /></div>
            <div class="col">First Name<input type="text" name="personnel-fname" id="personnel-fname" class="input" required /></div>
            <div class="col">Middle Name<input type="text" name="personnel-mname" id="personnel-mname" class="input" /></div>
            <div class="col">Birthdate<input type="date" name="personnel-birthdate" id="personnel-birthdate" class="input" required /></div>
            <div class="col">Birthplace<input type="text" name="personnel-birthplace" id="personnel-birthplace" class="input" required /></div>   
          </div>
          <div class="row">
            <div class="col">Gender
              <select class="dropdown" name="personnel-gender" id="personnel-gender" required>
                <option disabled selected value=""></option>
                <?php
                  $query2 = "SELECT * FROM gender ORDER BY (name != 'Male'), (name != 'Female'), name ASC";
                  $result2 = mysqli_query($conn, $query2);

                  if ($result2 && mysqli_num_rows($result2) > 0) {
                      while ($row2 = mysqli_fetch_assoc($result2)) {
                          echo "<option value='{$row2['id']}'>{$row2['name']}</option>";
                      }
                  } else {
                      echo "<option value=''>No genders found</option>";
                  }
                ?>
              </select>
            </div>
            <div class="col">Civil Status
              <select class="dropdown" name="personnel-civilstatus" id="personnel-civilstatus" required>
                <option disabled selected value=""></option>
                <?php
                  $query2 = "SELECT * FROM civilstatus";
                  $result2 = mysqli_query($conn, $query2);

                  if ($result2 && mysqli_num_rows($result2) > 0) {
                      while ($row2 = mysqli_fetch_assoc($result2)) {
                          echo "<option value='{$row2['id']}'>{$row2['name']}</option>";
                      }
                  } else {
                      echo "<option value=''>No genders found</option>";
                  }
                ?>
              </select>
            </div>
            <div class="col">Nationality
              <select class="dropdown" name="personnel-nationality" id="personnel-nationality" required>
                <option disabled selected value=""></option>
                <?php
                  $query1 = "SELECT * FROM nationalities_list ORDER BY (nationalities != 'Filipino'), nationalities ASC";
                  $result1 = mysqli_query($conn, $query1);

                  if ($result1 && mysqli_num_rows($result1) > 0) {
                      while ($row1 = mysqli_fetch_assoc($result1)) {
                          echo "<option value='{$row1['id']}'>{$row1['nationalities']}</option>";
                      }
                  } else {
                      echo "<option value=''>No blood type found</option>";
                  }
                ?>
              </select>
            </div>
            <div class="col">Religion
              <select class="dropdown" name="personnel-religion" id="personnel-religion" required>
                <option disabled selected value=""></option>
                <?php
                  $query = "SELECT * FROM religion ORDER BY (name != 'Roman Catholic'), name ASC";
                  $result = mysqli_query($conn, $query);

                  if ($result && mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<option value='{$row['id']}'>{$row['name']}</option>";
                      }
                  }
                ?>
              </select>
            </div>
            <div class="col">Blood Type
              <select class="dropdown" name="personnel-bloodtype" id="personnel-bloodtype">
                <option disabled selected value=""></option>
                <?php
                  $query1 = "SELECT * FROM bloodtype ORDER BY name ASC";
                  $result1 = mysqli_query($conn, $query1);

                  if ($result1 && mysqli_num_rows($result1) > 0) {
                      while ($row1 = mysqli_fetch_assoc($result1)) {
                          echo "<option value='{$row1['id']}'>{$row1['name']}</option>";
                      }
                  } else {
                      echo "<option value=''>No blood type found</option>";
                  }
                ?>
              </select>
            </div>         
          </div>
          <div class="row">
            <div class="col">Landline Number<input type="text" name="personnel-telno" class="input" /></div>
            <div class="col">Mobile Number<input type="text" name="personnel-cellphoneno" class="input" /></div>
            <div class="col">Email Address<input type="text" name="personnel-email" class="input"/></div>
          </div>
          <div class="row">
            <div class="col">Address<input type="text" name="personnel-address" class="input"/></div>
          </div>
          <div class="row">
            <div class="col">TIN Number<input type="text" name="personnel-tinno" class="input" /></div>
            <div class="col">SSS Number<input type="text" name="personnel-sssno" class="input" /></div>
            <div class="col">Pag-IBIG Number<input type="text" name="personnel-pagibigno" class="input" /></div>
          </div>
        </div>
        <div class="btn-group">
          <button type="button" onclick="showStep(2)" class="btn1 next-btn">Next</button>
        </div>
      </div>
      <!-- Step 2 -->
      <div class="form-step hidden" id="step-2">
        <div class="column-group">
          <h1 class="section-title">SPOUSE'S PROFILE <span style="font-style: italic; font-weight: normal; font-size: 15px;">(IF MARRIED)</span></h1>
          <div class="row">
            <div class="col">Surname<input type="text" name="spouse-lname" id="spouse-lname" class="input" /></div>
            <div class="col">First Name<input type="text" name="spouse-fname" id="spouse-fname" class="input" /></div>
            <div class="col">Middle Name<input type="text" name="spouse-mname" id="spouse-mname" class="input" /></div>
            <div class="col">Address<input type="text" name="spouse-address" id="spouse-address" class="input" /></div>
          </div>
          <div class="row">
            <div class="col">Occupation<input type="text" name="spouse-occupation" id="spouse-occupation" class="input" /></div>
            <div class="col">Company Name<input type="text" name="spouse-company" id="spouse-company" class="input" /></div>
          </div>
          <div class="row-addchild"><h1 class="section-title">CHILDREN <span style="font-style: italic; font-weight: normal; font-size: 15px;">(IF ANY)</span></h1><button type="button" class="open-addchild-modal" onclick="openModal()">+ ADD CHILD</button></div>
          <div class="row">
            <table id="children-table" class="rounded-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Rows will be added here -->
              </tbody>
            </table>
          </div>

          <div id="childModal" class="modal">
            <div class="modal-content">
              <span class="close" onclick="closeModal()">&times;</span>
              <div class="modal-header">ADD CHILD</div>
              <label>Name</label>
              <input type="text" id="childName">
              <label>Age</label>
              <input type="number" id="childAge">
              <div class="modal-button">
                <button type="button" onclick="addChild()">Add Child</button>
              </div>
            </div>
          </div>

          <h1 class="section-title">FATHER'S PROFILE</h1>
          <div class="row">
            <div class="col">Surname<input type="text" name="father-lname" id="father-lname" class="input" /></div>
            <div class="col">First Name<input type="text" name="father-fname" id="father-fname" class="input" /></div>
            <div class="col">Middle Name<input type="text" name="father-mname" id="father-mname" class="input" /></div>
            <div class="col">Birthplace<input type="text" name="father-birthplace" id="father-birthplace" class="input" /></div>
          </div>

          <h1 class="section-title">MOTHER'S PROFILE</h1>
          <div class="row">
            <div class="col">Surname<input type="text" name="mother-lname" id="mother-lname" class="input" /></div>
            <div class="col">First Name<input type="text" name="mother-fname" id="mother-fname" class="input" /></div>
            <div class="col">Middle Name<input type="text" name="mother-mname" id="mother-mname" class="input" /></div>
            <div class="col">Birthplace<input type="text" name="mother-birthplace" id="mother-birthplace" class="input" /></div>
          </div>
        </div>
        <div class="btn-group">
          <button type="button" onclick="showStep(1)" class="btn prev-btn">Previous</button>
          <button type="button" onclick="showStep(3)" class="btn next-btn">Next</button>
        </div>
        
      </div>
      <!-- Step 3 -->
      <div class="form-step hidden" id="step-3">
        <div class="column-group">
          <div class="row-addchild"><h1 class="section-title">EDUCATION</h1><button type="button" class="open-addchild-modal" onclick="openModalEducation()">+ ADD EDUCATION</button></div>
          <div class="row">
            <table id="educational-table" class="rounded-table">
              <thead>
                <tr>
                  <th>LEVEL</th>
                  <th>SCHOOL/UNIVERSITY</th>
                  <th>YEARS ATTENDED</th>
                  <th>DEGREE EARNED</th>
                  <th>COURSE/CREDIT UNITS</th>
                  <th>AWARDS</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <!-- Rows will be added here -->
              </tbody>
            </table>
          </div>  

          <div class="row-addchild"><h1 class="section-title">WORK EXPERIENCE</h1><button type="button" class="open-addchild-modal" onclick="openModalWork()">+ ADD WORK EXPERIENCE</button></div>
          <div class="row">
            <table id="work-table" class="rounded-table">
              <thead>
                <tr>
                  <th>AGENCY</th>
                  <th>POSITION</th>
                  <th>INCLUSIVE DATES</th>
                  <th>STATUS OF APPOINTMENT</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <!-- Rows will be added here -->
              </tbody>
            </table>
          </div>  
        </div>
        <div id="educationModal" class="modal">
          <div class="modal-content">
            <span class="close" onclick="closeModalEducation()">&times;</span>
            <div class="modal-header">ADD EDUCATION</div>

            <label for="educ-level">Level</label>
              <select class="educationInputs" name="educlevel" id="educlevel">
                <option value="" disabled selected></option>
                <option value="Elementary">Elementary</option>
                <option value="Secondary">Secondary</option>
                <option value="Tertiary">Tertiary</option>
                <option value="Post Graduate">Post Graduate</option>
              </select>
            
            <label>School/University</label>
              <input type="text" class="educationInputs" id="educschool">

            <label>Years Attended</label>
              <input type="text" class="educationInputs" id="educyears">

            <label>Degree Earned</label>
              <input type="text" class="educationInputs" id="educdegree">

            <label>Course/Credit Units</label>
              <input type="text" class="educationInputs" id="educunits">

            <label>Awards</label>
              <input type="text" class="educationInputs" id="educawards">

            <div class="modal-button">
              <button type="button" onclick="addEducation()">Add Education</button>
            </div>
          </div>
        </div>

        <div id="workModal" class="modal">
          <div class="modal-content">
            <span class="close" onclick="closeModalWork()">&times;</span>
            <div class="modal-header">ADD WORK EXPERIENCE</div>

            <label>Agency</label>
              <input type="text" class="educationInputs" id="workagency">
            
            <label>Position</label>
              <input type="text" class="educationInputs" id="workposition">

            <label>Inclusive Dates</label>
              <input type="text" class="educationInputs" id="workdates">

            <label>Status of Appointment</label>
              <input type="text" class="educationInputs" id="workstatus">

            <div class="modal-button">
              <button type="button" onclick="addWork()">Add Work Experience</button>
            </div>
          </div>
        </div>
          
        <div class="btn-group">
          <button type="button" onclick="showStep(2)" class="btn prev-btn">Previous</button>
          <button type="button" onclick="showStep(4)" class="btn next-btn">Next</button>
        </div>
      </div>
      <!-- Step 4 -->
      <div class="form-step hidden" id="step-4">
        <div class="column-group">
          <div class="row-addchild"><h1 class="section-title">CIVIL SERVICE ELIGIBILITY/PROFESSIONAL BOARD/COMPETENCY ASSESSMENT</h1><button type="button" class="open-addchild-modal" onclick="openModalQualification()">+ ADD QUALIFICATION</button></div>
          <div class="row">
            <table id="qualification-table" class="rounded-table">
              <thead>
                <tr>
                  <th>NAME OF EXAM</th>
                  <th>EXAMINATION DATE</th>
                  <th>RATE</th>
                  <th>PLACE OF EXAMINATION</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <!-- Rows will be added here -->
              </tbody>
            </table>
          </div>
          
          <div class="row-addchild"><h1 class="section-title">RECORDS IN SERVICE TRAININGS; STUDY AND SCHOLARSHIP GRANTS</h1><button type="button" class="open-addchild-modal" onclick="openModalTraining()">+ ADD TRAINING/SCHOLARSHIP</button></div>
          <div class="row">
            <table id="training-table" class="rounded-table">
              <thead>
                <tr>
                  <th>SEMINAR TITLE</th>
                  <th>INCLUSIVE DATES</th>
                  <th>NO. OF HOURS</th>
                  <th>CONDUCTED BY</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <!-- Rows will be added here -->
              </tbody>
            </table>
          </div>

          <h1 class="section-title">PERSON TO NOTIFY IN CASE OF EMERGENCY</h1>
          <div class="row">
            <div class="col">Name<input type="text" name="emergency-name" class="input" /></div>
            <div class="col">Relationship<input type="text" name="emergency-relationship" class="input" /></div>
            <div class="col">Contact Number<input type="text" name="emergency-number" class="input" /></div>
            <div class="col">Address<input type="text" name="emergency-address" class="input" /></div>
          </div>
        </div>

        <div id="qualificationModal" class="modal">
          <div class="modal-content">
            <span class="close" onclick="closeModalQualification()">&times;</span>
            <div class="modal-header">ADD QUALIFICATION</div>

            <label>Name of Exam</label>
              <input type="text" class="educationInputs" id="qualificationexam" />
            
            <label>Examination Date</label>
              <input type="text" class="educationInputs" id="qualificationdate" />

            <label>Rates</label>
              <input type="text" class="educationInputs" id="qualificationrates" />

            <label>Place of Examination</label>
              <input type="text" class="educationInputs" id="qualificationplace" />

            <div class="modal-button">
              <button type="button" onclick="addQualification()">Add Qualification</button>
            </div>
          </div>
        </div>

        <div id="trainingModal" class="modal">
          <div class="modal-content">
            <span class="close" onclick="closeModalTraining()">&times;</span>
            <div class="modal-header">ADD TRAINING</div>

            <label>Seminar Title</label>
              <input type="text" class="educationInputs" id="trainingseminar" />
            
            <label>Inclusive Dates</label>
              <input type="text" class="educationInputs" id="trainingdate" />

            <label>No. of Hours</label>
              <input type="text" class="educationInputs" id="traininghours" />

            <label>Conducted By</label>
              <input type="text" class="educationInputs" id="trainingconducted" />

            <div class="modal-button">
              <button type="button" onclick="addTraining()">Add Training</button>
            </div>
          </div>
        </div>

        <div class="btn-group">
          <button type="button" onclick="showStep(3)" class="btn prev-btn">Previous</button>
          <button type="submit" class="btn submit-btn">Submit</button>
        </div>
      </form>
      </div>

      <div id="successModal" class="custom-modal">
        <div class="custom-modal-content">
          <span class="close-button" onclick="closeModality()">&times;</span>
          <h2>Success</h2>
          <p>Your personal data was submitted successfully.</p>
          <button onclick="closeModality()">OK</button>
        </div>
      </div>
    </div>
  </body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  /* $(document).ready(function() {
    $('#pds-form').on('submit', function(e) {
      e.preventDefault(); // Prevent the default form submission
      var formData = new FormData($('#pds-form')[0]);

      $.ajax({
        url: 'pds-ajax.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          console.log("Response: ", response);
          showModal();
        },
        error: function(xhr, status, error) {
          console.error("AJAX Error:", status, error);
        }
      });
    });
  }); */

  document.getElementById('personnel-photo').addEventListener('change', function(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };

      reader.readAsDataURL(file);
    }
  });

  function showStep(step) { 
    const steps = document.querySelectorAll('.form-step');
    steps.forEach((el, idx) => {
      el.classList.toggle('hidden', idx !== step - 1);
    });

    updateStepIndicator(step - 1);
  }

  function updateStepIndicator(index) {
    const steps = document.querySelectorAll('.step-indicator .step');
    steps.forEach((step, i) => {
      step.classList.remove('active', 'completed');
      if (i < index) step.classList.add('completed');
      else if (i === index) step.classList.add('active');
    });
  }

  // Initialize step indicator on load
  document.addEventListener('DOMContentLoaded', function () {
    updateStepIndicator(0);
  });

  function openModal() {
    document.getElementById('childModal').style.display = 'block';
  }

  function closeModal() {
    document.getElementById('childModal').style.display = 'none';
    document.getElementById('childName').value = '';
    document.getElementById('childAge').value = '';
  }

  function openModalEducation() {
    document.getElementById('educationModal').style.display = 'block';
  }

  function closeModalEducation() {
    document.getElementById('educationModal').style.display = 'none';
    document.getElementById('educlevel').value = '';
    document.getElementById('educschool').value = '';
    document.getElementById('educyears').value = '';
    document.getElementById('educdegree').value = '';
    document.getElementById('educunits').value = '';
    document.getElementById('educawards').value = '';
  }

  function openModalWork() {
    document.getElementById('workModal').style.display = 'block';
  }

  function closeModalWork() {
    document.getElementById('workModal').style.display = 'none';
    document.getElementById('workagency').value = '';
    document.getElementById('workposition').value = '';
    document.getElementById('workdates').value = '';
    document.getElementById('workstatus').value = '';
  }

  function openModalQualification() {
    document.getElementById('qualificationModal').style.display = 'block';
  }

  function closeModalQualification() {
    document.getElementById('qualificationModal').style.display = 'none';
    document.getElementById('qualificationexam').value = '';
    document.getElementById('qualificationdate').value = '';
    document.getElementById('qualificationrates').value = '';
    document.getElementById('qualificationplace').value = '';
  }

  function openModalTraining() {
    document.getElementById('trainingModal').style.display = 'block';
  }

  function closeModalTraining() {
    document.getElementById('trainingModal').style.display = 'none';
    document.getElementById('trainingseminar').value = '';
    document.getElementById('trainingdate').value = '';
    document.getElementById('traininghours').value = '';
    document.getElementById('trainingconducted').value = '';
  }

  function addChild() {
    const nameInput = document.getElementById("childName");
    const ageInput = document.getElementById("childAge");
    const name = nameInput.value.trim();
    const age = ageInput.value.trim();

    if (name === "" || age === "") {
      alert("Please fill in both name and age.");
      return;
    }

    const table = document.getElementById("children-table").getElementsByTagName("tbody")[0];
    const newRow = table.insertRow();

    const nameCell = newRow.insertCell(0);
    const ageCell = newRow.insertCell(1);
    const actionCell = newRow.insertCell(2);

    nameCell.innerHTML = `<input type="text" name="children_name[]" id="child-name" value="${name}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    ageCell.innerHTML = `<input type="text" name="children_age[]" id="child-age" value="${age}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    actionCell.innerHTML = `<button type="button" onclick="removeRow(this)" style="width: 100%; border: none; background-color: darkred; color: white; text-align: center;">Remove</button>`;

    // Clear and close modal
    closeModal();
  }

  function addEducation() {
    const levelInput = document.getElementById('educlevel');
    const schoolInput = document.getElementById('educschool');
    const yearsInput = document.getElementById('educyears');
    const degreeInput = document.getElementById('educdegree');
    const unitsInput = document.getElementById('educunits');
    const awardsInput = document.getElementById('educawards');

    const level = levelInput.value.trim();
    const school = schoolInput.value.trim();
    const years = yearsInput.value.trim();
    const degree = degreeInput.value.trim();
    const units = unitsInput.value.trim();
    const awards = awardsInput.value.trim();

    if (level === "" || school === "" || years === "") {
      alert("Please fill in the level, school and years attended.");
      return;
    }

    const table = document.getElementById("educational-table").getElementsByTagName("tbody")[0];
    const newRow = table.insertRow();

    const levelCell = newRow.insertCell(0);
    const schoolCell = newRow.insertCell(1);
    const yearsCell = newRow.insertCell(2);
    const degreeCell = newRow.insertCell(3);
    const unitsCell = newRow.insertCell(4);
    const awardsCell = newRow.insertCell(5);
    const actionCell = newRow.insertCell(6);

    levelCell.innerHTML = `<input type="text" name="educ_level[]" id="educ-level" value="${level}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    schoolCell.innerHTML = `<input type="text" name="educ_school[]" id="educ-school" value="${school}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    yearsCell.innerHTML = `<input type="text" name="educ_years[]" id="educ-years" value="${years}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    degreeCell.innerHTML = `<input type="text" name="educ_degree[]" id="educ-degree" value="${degree}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    unitsCell.innerHTML = `<input type="text" name="educ_units[]" id="educ-units" value="${units}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    awardsCell.innerHTML = `<input type="text" name="educ_awards[]" id="educ-awards" value="${awards}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    actionCell.innerHTML = `<button type="button" onclick="removeEducationRow(this)" style="width: 100%; border: none; background-color: darkred; color: white; text-align: center;">Remove</button>`;

    // Clear and close modal
    closeModalEducation();
  }

  function addWork() {
    const workAgency = document.getElementById("workagency");
    const workPosition = document.getElementById("workposition");
    const workDates = document.getElementById("workdates");
    const workStatus = document.getElementById("workstatus");
    const agency = workAgency.value.trim();
    const position = workPosition.value.trim();
    const dates = workDates.value.trim();
    const status = workStatus.value.trim();

    if (agency === "" || position === "" || dates === "" || status === "") {
      alert("Please fill all fields before submitting.");
      return;
    }

    const table = document.getElementById("work-table").getElementsByTagName("tbody")[0];
    const newRow = table.insertRow();

    const agencyCell = newRow.insertCell(0);
    const positionCell = newRow.insertCell(1);
    const datesCell = newRow.insertCell(2);
    const statusCell = newRow.insertCell(3);
    const actionCell = newRow.insertCell(4);

    agencyCell.innerHTML = `<input type="text" name="work_agency[]" id="work-agency" value="${agency}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    positionCell.innerHTML = `<input type="text" name="work_position[]" id="work-position" value="${position}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    datesCell.innerHTML = `<input type="text" name="work_dates[]" id="work-dates" value="${dates}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    statusCell.innerHTML = `<input type="text" name="work_status[]" id="work-status" value="${status}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    actionCell.innerHTML = `<button type="button" onclick="removeWorkRow(this)" style="width: 100%; border: none; background-color: darkred; color: white; text-align: center;">Remove</button>`;

    // Clear and close modal
    closeModalWork();
  }

  function addQualification() {
    const qualificationExam = document.getElementById("qualificationexam");
    const qualificationDate = document.getElementById("qualificationdate");
    const qualificationRates = document.getElementById("qualificationrates");
    const qualificationPlace = document.getElementById("qualificationplace");
    const exam = qualificationExam.value.trim();
    const examdate = qualificationDate.value.trim();
    const rates = qualificationRates.value.trim();
    const place = qualificationPlace.value.trim();

    if (exam === "" || examdate === "" || rates === "" || place === "") {
      alert("Please fill all fields before submitting.");
      return;
    }

    const table = document.getElementById("qualification-table").getElementsByTagName("tbody")[0];
    const newRow = table.insertRow();

    const examCell = newRow.insertCell(0);
    const examdateCell = newRow.insertCell(1);
    const ratesCell = newRow.insertCell(2);
    const placeCell = newRow.insertCell(3);
    const actionCell = newRow.insertCell(4);

    examCell.innerHTML = `<input type="text" name="qualification_exam[]" id="qualification-exam" value="${exam}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    examdateCell.innerHTML = `<input type="text" name="qualification_date[]" id="qualification-date" value="${examdate}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    ratesCell.innerHTML = `<input type="text" name="qualification_rates[]" id="qualification-rates" value="${rates}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    placeCell.innerHTML = `<input type="text" name="qualification_place[]" id="qualification-place" value="${place}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    actionCell.innerHTML = `<button type="button" onclick="removeQualificationRow(this)" style="width: 100%; border: none; background-color: darkred; color: white; text-align: center;">Remove</button>`;

    // Clear and close modal
    closeModalQualification();
  }

  function addTraining() {
    const trainingSeminar = document.getElementById("trainingseminar");
    const trainingDate = document.getElementById("trainingdate");
    const trainingHours = document.getElementById("traininghours");
    const trainingConducted = document.getElementById("trainingconducted");
    const seminar = trainingSeminar.value.trim();
    const tdate = trainingDate.value.trim();
    const thours = trainingHours.value.trim();
    const conducted = trainingConducted.value.trim();

    if (seminar === "" || tdate === "" || thours === "" || conducted === "") {
      alert("Please fill all fields before submitting.");
      return;
    }

    const table = document.getElementById("training-table").getElementsByTagName("tbody")[0];
    const newRow = table.insertRow();

    const seminarCell = newRow.insertCell(0);
    const tdateCell = newRow.insertCell(1);
    const thoursCell = newRow.insertCell(2);
    const conductedCell = newRow.insertCell(3);
    const actionCell = newRow.insertCell(4);

    seminarCell.innerHTML = `<input type="text" name="trainingseminar[]" id="training-seminar" value="${seminar}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    tdateCell.innerHTML = `<input type="text" name="trainingdate[]" id="training-date" value="${tdate}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    thoursCell.innerHTML = `<input type="text" name="traininghours[]" id="training-hours" value="${thours}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    conductedCell.innerHTML = `<input type="text" name="trainingconducted[]" id="training-conducted" value="${conducted}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    actionCell.innerHTML = `<button type="button" onclick="removeTrainingRow(this)" style="width: 100%; border: none; background-color: darkred; color: white; text-align: center;">Remove</button>`;

    // Clear and close modal
    closeModalTraining();
  }

  function removeRow(button) {
    const row = button.closest("tr");
    row.remove();
  }

  // Close modal if clicked outside content
  window.onclick = function(event) {
    const modal = document.getElementById("childModal");
    if (event.target === modal) {
      closeModal();
    }
  }

  function removeEducationRow(button) {
    const row = button.closest("tr");
    row.remove();
  }

  // Close modal if clicked outside content
  window.onclick = function(event) {
    const modal = document.getElementById("educationModal");
    if (event.target === modal) {
      closeModalEducation();
    }
  }

  function removeWorkRow(button) {
    const row = button.closest("tr");
    row.remove();
  }

  // Close modal if clicked outside content
  window.onclick = function(event) {
    const modal = document.getElementById("workModal");
    if (event.target === modal) {
      closeModalWork();
    }
  }

  function removeQualificationRow(button) {
    const row = button.closest("tr");
    row.remove();
  }

  // Close modal if clicked outside content
  window.onclick = function(event) {
    const modal = document.getElementById("qualificationModal");
    if (event.target === modal) {
      closeModalQualification();
    }
  }

  function removeTrainingRow(button) {
    const row = button.closest("tr");
    row.remove();
  }

  // Close modal if clicked outside content
  window.onclick = function(event) {
    const modal = document.getElementById("trainingModal");
    if (event.target === modal) {
      closeModalTraining();
    }
  }

  function showModal() {
    document.getElementById('successModal').style.display = 'block';
  }

  function closeModality() {
    document.getElementById('successModal').style.display = 'none';
  }

</script>
</html>