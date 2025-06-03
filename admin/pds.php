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
      <!-- Step indicator -->
      <div class="step-indicator">
        <div class="step">1</div>
        <div class="step">2</div>
        <div class="step">3</div>
        <div class="step">4</div>
      </div>
      <!-- Step 1 -->
    <form id="pds-form" enctype="multipart/form-data">
      <div class="form-step" id="step-1">
        <h1 class="main-title">PERSONAL DATA SHEET</h1>

        <input type="file" name="personnel-photo" id="personnel-photo">

        <h1 class="section-title">DATE EMPLOYED</h1>
        <div class="row">
          <div class="col"><input type="date" name="personnel-dateEmployed" class="input"/></div>
        </div>
        
        <h1 class="section-title">PERSONAL INFORMATION</h1>
        <div class="column-group">
          <div class="row">
            <div class="col">Last Name<input type="text" name="personnel-lname" id="personnel-lname" class="input"></div>
            <div class="col">First Name<input type="text" name="personnel-fname" id="personnel-fname" class="input" /></div>
            <div class="col">Middle Name<input type="text" name="personnel-mname" id="personnel-mname" class="input" /></div>
            <div class="col">Birthdate<input type="date" name="personnel-birthdate" id="personnel-birthdate" class="input" /></div>
            <div class="col">Birthplace<input type="text" name="personnel-birthplace" id="personnel-birthplace" class="input" /></div>   
          </div>
          <div class="row">
            <div class="col">Gender
              <select class="dropdown" name="personnel-gender" id="personnel-gender">
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
              <select class="dropdown" name="personnel-civilstatus" id="personnel-civilstatus">
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
              <select class="dropdown" name="personnel-nationality" id="personnel-nationality">
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
              <select class="dropdown" name="personnel-religion" id="personnel-religion">
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
            <div class="col">Email Address<input type="email" name="personnel-email" class="input"/></div>
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

          <div class="btn-group">
          <button type="button" onclick="showStep(3)" class="btn prev-btn">Previous</button>
          <button type="submit" class="btn submit-btn" >Submit</button>
        </div>
      </form>
        </div>
      </div>
      <!-- Step 2 -->
      <div class="form-step hidden" id="step-2">
        <h1 class="main-title">PERSONAL DATA SHEET</h1>
        <div class="column-group">
          <h1 class="section-title">SPOUSE'S PROFILE <span style="font-style: italic; font-weight: normal; font-size: 15px;">(IF MARRIED)</span></h1>
          <div class="row">
            <div class="col">Surname<input type="text" name="spouse_last_name" class="input" /></div>
            <div class="col">First Name<input type="text" name="spouse_first_name" class="input" /></div>
            <div class="col">Middle Name<input type="text" name="spouse_middle_name" class="input" /></div>
            <div class="col">Address<input type="text" name="spouse_company_address" class="input" /></div>
          </div>
          <div class="row">
            <div class="col">Occupation<input type="text" name="spouse_occupation" class="input" /></div>
            <div class="col">Company Name<input type="text" name="spouse_company_name" class="input" /></div>
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
            <div class="col">Surname<input type="text" name="father_last_name" class="input" /></div>
            <div class="col">First Name<input type="text" name="father_first_name" class="input" /></div>
            <div class="col">Middle Name<input type="text" name="father_middle_name" class="input" /></div>
            <div class="col">Birthplace<input type="text" name="father_place_of_birth" class="input" /></div>
          </div>

          <h1 class="section-title">MOTHER'S PROFILE</h1>
          <div class="row">
            <div class="col">Surname<input type="text" name="mother_last_name" class="input" /></div>
            <div class="col">First Name<input type="text" name="mother_first_name" class="input" /></div>
            <div class="col">Middle Name<input type="text" name="mother_middle_name" class="input" /></div>
            <div class="col">Birthplace<input type="text" name="mother_place_of_birth" class="input" /></div>
          </div>
        </div>
        <div class="btn-group">
          <button type="button" onclick="showStep(1)" class="btn prev-btn">Previous</button>
          <button type="button" onclick="showStep(3)" class="btn next-btn">Next</button>
        </div>
      </div>
      <!-- Step 3 -->
      <div class="form-step hidden" id="step-3">
        <h1 class="main-title">PERSONAL DATA SHEET</h1>
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

            <label>Level</label>
              <select class="educationInputs" name="bdt" id="educ-level">
                <option disabled selected value=""></option>
                <?php
                  $query1 = "SELECT * FROM educationLevels ORDER BY id ASC";
                  $result1 = mysqli_query($conn, $query1);

                  if ($result1 && mysqli_num_rows($result1) > 0) {
                      while ($row1 = mysqli_fetch_assoc($result1)) {
                          echo "<option value='{$row1['id']}'>{$row1['educ']}</option>";
                      }
                  } else {
                      echo "<option value=''>No education levels found</option>";
                  }
                ?>
              </select>

            <input type="hidden" class="educationInputs" id="educ-level-hidden">
            
            <label>School/University</label>
              <input type="text" class="educationInputs" id="educ-school">

            <label>Years Attended</label>
              <input type="text" class="educationInputs" id="educ-years">

            <label>Degree Earned</label>
              <input type="text" class="educationInputs" id="educ-degree">

            <label>Course/Credit Units</label>
              <input type="text" class="educationInputs" id="educ-units">

            <label>Awards</label>
              <input type="text" class="educationInputs" id="educ-awards">

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
              <input type="text" class="educationInputs" id="work-agency">
            
            <label>Position</label>
              <input type="text" class="educationInputs" id="work-position">

            <label>Inclusive Dates</label>
              <input type="text" class="educationInputs" id="work-dates">

            <label>Status of Appointment</label>
              <input type="text" class="educationInputs" id="work-status">

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
        <h1 class="main-title">PERSONAL DATA SHEET</h1>
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
            <div class="col">Name<input type="text" name="mother_last_name" class="input" /></div>
            <div class="col">Relationship<input type="text" name="mother_first_name" class="input" /></div>
            <div class="col">Contact Number<input type="text" name="mother_middle_name" class="input" /></div>
            <div class="col">Address<input type="text" name="mother_place_of_birth" class="input" /></div>
          </div>
        </div>

        <div id="qualificationModal" class="modal">
          <div class="modal-content">
            <span class="close" onclick="closeModalQualification()">&times;</span>
            <div class="modal-header">ADD QUALIFICATION</div>

            <label>Name of Exam</label>
              <input type="text" class="educationInputs" id="qualification-exam">
            
            <label>Examination Date</label>
              <input type="text" class="educationInputs" id="qualification-date">

            <label>Rates</label>
              <input type="text" class="educationInputs" id="qualification-rates">

            <label>Place of Examination</label>
              <input type="text" class="educationInputs" id="qualification-place">

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
              <input type="text" class="educationInputs" id="training-seminar">
            
            <label>Inclusive Dates</label>
              <input type="text" class="educationInputs" id="training-date">

            <label>No. of Hours</label>
              <input type="text" class="educationInputs" id="training-hours">

            <label>Conducted By</label>
              <input type="text" class="educationInputs" id="training-conducted">

            <div class="modal-button">
              <button type="button" onclick="addTraining()">Add Training</button>
            </div>
          </div>
        </div>

        <!-- <div class="btn-group">
          <button type="button" onclick="showStep(3)" class="btn prev-btn">Previous</button>
          <button type="submit" class="btn submit-btn">Submit</button>
        </div>
      </form> -->
      </div>

      <div id="successModal" class="custom-modal">
        <div class="custom-modal-content">
          <span class="close-button" onclick="closeModal()">&times;</span>
          <h2>Success</h2>
          <p>Your personal data was submitted successfully.</p>
          <button onclick="closeModal()">OK</button>
        </div>
      </div>
    </div>
  </body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#pds-form').on('submit', function(e) {
      e.preventDefault(); // Prevent the default form submission
      submitPersonalData(); // Call your AJAX function
    });
  });

  function submitPersonalData() {
    var formData = new FormData($('#pds-form')[0]);

    $.ajax({
      url: 'pds-ajax.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        console.log("Server response:", response);

        showModal();
      },
      error: function(xhr, status, error) {
        console.error("AJAX Error:", status, error);
      }
    });
  }


  function showStep(step) { 
    /* const currentStepIndex = step - 2; */
    const steps = document.querySelectorAll('.form-step');

    /* if (step > 1) {
      const currentStep = steps[currentStepIndex];
      const inputs = currentStep.querySelectorAll('input');

      let allFilled = true;

      inputs.forEach(input => {
        if (input.type !== 'file' && input.value.trim() === '') {
          input.classList.add('input-error');
          allFilled = false;
        } else {
          input.classList.remove('input-error');
        }
      });

      if (!allFilled) {
        return;
      }
    } */

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
    document.getElementById('educ-level').value = '';
    document.getElementById('educ-school').value = '';
    document.getElementById('educ-years').value = '';
    document.getElementById('educ-degree').value = '';
    document.getElementById('educ-units').value = '';
    document.getElementById('educ-awards').value = '';
  }

  function openModalWork() {
    document.getElementById('workModal').style.display = 'block';
  }

  function closeModalWork() {
    document.getElementById('workModal').style.display = 'none';
    document.getElementById('work-agency').value = '';
    document.getElementById('work-position').value = '';
    document.getElementById('work-dates').value = '';
    document.getElementById('work-status').value = '';
  }

  function openModalQualification() {
    document.getElementById('qualificationModal').style.display = 'block';
  }

  function closeModalQualification() {
    document.getElementById('qualificationModal').style.display = 'none';
    document.getElementById('qualification-exam').value = '';
    document.getElementById('qualification-date').value = '';
    document.getElementById('qualification-rates').value = '';
    document.getElementById('qualification-place').value = '';
  }

  function openModalTraining() {
    document.getElementById('trainingModal').style.display = 'block';
  }

  function closeModalTraining() {
    document.getElementById('trainingModal').style.display = 'none';
    document.getElementById('training-seminar').value = '';
    document.getElementById('training-date').value = '';
    document.getElementById('training-hours').value = '';
    document.getElementById('training-conducted').value = '';
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

    nameCell.innerHTML = `<input type="text" name="children_name[]" value="${name}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    ageCell.innerHTML = `<input type="text" name="children_age[]" value="${age}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    actionCell.innerHTML = `<button type="button" onclick="removeRow(this)" style="width: 100%; border: none; background-color: darkred; color: white; text-align: center;">Remove</button>`;

    // Clear and close modal
    closeModal();
  }

  function addEducation() {
    const levelInput = document.getElementById('educ-level');
    const selectedLevel = levelInput.options[levelInput.selectedIndex].text;
    const levelHiddenInput = document.getElementById('educ-level-hidden');
    levelHiddenInput.value = selectedLevel;
    const schoolInput = document.getElementById('educ-school');
    const yearsInput = document.getElementById('educ-years');
    const degreeInput = document.getElementById('educ-degree');
    const unitsInput = document.getElementById('educ-units');
    const awardsInput = document.getElementById('educ-awards');

    if (levelInput === "" || schoolInput === "" || yearsInput === "") {
      alert("Please fill in the level, school and years attendeds.");
      return;
    }

    console.log("Selected education level:", levelHiddenInput);

    const level = levelHiddenInput.value.trim();
    const school = schoolInput.value.trim();
    const years = yearsInput.value.trim();
    const degree = degreeInput.value.trim();
    const units = unitsInput.value.trim();
    const awards = awardsInput.value.trim();

    const table = document.getElementById("educational-table").getElementsByTagName("tbody")[0];
    const newRow = table.insertRow();

    const levelCell = newRow.insertCell(0);
    const schoolCell = newRow.insertCell(1);
    const yearsCell = newRow.insertCell(2);
    const degreeCell = newRow.insertCell(3);
    const unitsCell = newRow.insertCell(4);
    const awardsCell = newRow.insertCell(5);
    const actionCell = newRow.insertCell(6);

    levelCell.innerHTML = `<input type="text" name="children_name[]" value="${level}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    schoolCell.innerHTML = `<input type="text" name="children_age[]" value="${school}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    yearsCell.innerHTML = `<input type="text" name="children_name[]" value="${years}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    degreeCell.innerHTML = `<input type="text" name="children_age[]" value="${degree}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    unitsCell.innerHTML = `<input type="text" name="children_name[]" value="${units}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    awardsCell.innerHTML = `<input type="text" name="children_age[]" value="${awards}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    actionCell.innerHTML = `<button type="button" onclick="removeEducationRow(this)" style="width: 100%; border: none; background-color: darkred; color: white; text-align: center;">Remove</button>`;

    // Clear and close modal
    closeModalEducation();
  }

  function addWork() {
    const workAgency = document.getElementById("work-agency");
    const workPosition = document.getElementById("work-position");
    const workDates = document.getElementById("work-dates");
    const workStatus = document.getElementById("work-status");
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

    agencyCell.innerHTML = `<input type="text" name="children_name[]" value="${agency}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    positionCell.innerHTML = `<input type="text" name="children_age[]" value="${position}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    datesCell.innerHTML = `<input type="text" name="children_name[]" value="${dates}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    statusCell.innerHTML = `<input type="text" name="children_age[]" value="${status}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    actionCell.innerHTML = `<button type="button" onclick="removeWorkRow(this)" style="width: 100%; border: none; background-color: darkred; color: white; text-align: center;">Remove</button>`;

    // Clear and close modal
    closeModalWork();
  }

  function addQualification() {
    const qualificationExam = document.getElementById("qualification-exam");
    const qualificationDate = document.getElementById("qualification-date");
    const qualificationRates = document.getElementById("qualification-rates");
    const qualificationPlace = document.getElementById("qualification-place");
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

    examCell.innerHTML = `<input type="text" name="children_name[]" value="${exam}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    examdateCell.innerHTML = `<input type="text" name="children_age[]" value="${examdate}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    ratesCell.innerHTML = `<input type="text" name="children_name[]" value="${rates}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    placeCell.innerHTML = `<input type="text" name="children_age[]" value="${place}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    actionCell.innerHTML = `<button type="button" onclick="removeQualificationRow(this)" style="width: 100%; border: none; background-color: darkred; color: white; text-align: center;">Remove</button>`;

    // Clear and close modal
    closeModalQualification();
  }

  function addTraining() {
    const trainingSeminar = document.getElementById("training-seminar");
    const trainingDate = document.getElementById("training-date");
    const trainingHours = document.getElementById("training-hours");
    const trainingConducted = document.getElementById("training-conducted");
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

    seminarCell.innerHTML = `<input type="text" name="children_name[]" value="${seminar}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    tdateCell.innerHTML = `<input type="text" name="children_age[]" value="${tdate}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    thoursCell.innerHTML = `<input type="text" name="children_name[]" value="${thours}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
    conductedCell.innerHTML = `<input type="text" name="children_age[]" value="${conducted}" style="width: 100%; border: none; background-color: transparent; text-align: center; padding: 0; margin: 0;" readonly />`;
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

  function closeModal() {
    document.getElementById('successModal').style.display = 'none';
  }

</script>
</html>