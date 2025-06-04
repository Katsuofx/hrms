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
        <h1 class="main-title-employee">EMPLOYEE INFO</h1>

        <form id="pds-form" action="pds-ajax.php" enctype="multipart/form-data" method="POST">
      <div class="form-step" id="step-1">
        
          <label class="photo-upload-wrapper" for="personnel-photo">
            <span class="photo-upload-text">Upload photo</span>
            <img id="preview" src="#" alt="Preview" style="display: none;" />
          </label>
          <input type="file" name="personnel-photo" id="personnel-photo" accept="image/*">


        <h1 class="section-title">DATE EMPLOYED</h1>
        <div class="row">
          <div class="col"><input type="date" name="personnel-dateEmployed" class="input" required/></div>
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
</body>
</html>