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
      <!-- Step indicator -->
      <div class="step-indicator">
        <div class="step">1</div>
        <div class="step">2</div>
        <div class="step">3</div>
        <div class="step">4</div>
      </div>
      <!-- Step 1 -->
       <form id="pds-form" action="../config.php" method="POST" enctype="multipart/form-data">
      <div class="form-step" id="step-1">
        <h1 class="main-title">PERSONAL DATA SHEET</h1>
        <h1 class="step-title">STEP 1</h1>
        <h1 class="section-title">DATE EMPLOYED</h1>
        <div class="row">
          <div class="col">Month<input type="number" name="month_employed" class="input" placeholder="Ex. 09"/></div>
          <div class="col">Day<input type="number" name="day_employed" class="input" placeholder="Ex. 21"/></div>
          <div class="col">Year<input type="number" name="year_employed" class="input" placeholder="Ex. 2003"/></div>
          <div class="col">Upload your 2x2 picture here<input type="file" name="image" class="input" /></div>
        </div>
        <h1 class="section-title">PERSONAL INFORMATION</h1>
        <div class="column-group">
          <div class="row">
            <div class="col">Last Name<input type="text" name="last_name" class="input"></div>
            <div class="col">Middle Name<input type="text" name="middle_name" class="input" /></div>
            <div class="col">First Name<input type="text" name="first_name" class="input" /></div>
            <div class="col">Place of Birth<input type="text" name="place_of_birth" class="input" /></div>
            <div class="col">Religion<select class="dropdown" name="religion" id="religion" required>
                <option disabled selected value="">--Select Religion--</option>
                <?php
                require('../config.php');

                $query = "SELECT * FROM religion";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                } else {
                    echo "<option value=''>No religion found</option>";
                }

                mysqli_close($conn);
                ?>
            </select></div>
          </div>
          <div class="row">
            <div class="col">Date of Birth<input type="date" name="date_of_birth" class="input" /></div>
            <div class="col">Blood Type<select class="dropdown" name="bdt" id="bdt" required>
                <option disabled selected value="">--Select Blood Type--</option>
                <?php
                require('../config.php');

                $query = "SELECT * FROM bloodtype";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                } else {
                    echo "<option value=''>No blood type found</option>";
                }

              
                ?>
            </select></div>
            <div class="col">Civil Status<input type="text" name="civil_status" class="input" /></div>
            <div class="col">Gender<select class="dropdown" name="gender" id="gender" required>
                <option disabled selected value="">--Select Gender--</option>
                <?php
                require('../config.php');

                $query = "SELECT * FROM gender";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                } else {
                    echo "<option value=''>No genders found</option>";
                }

                mysqli_close($conn);
                ?>
            </select></div>
            
            <div class="col">Citizenship<input type="text" name="citizenship" class="input" /></div>
          </div>
          <div class="row">
            <div class="col">TIN No.<input type="text" name="tin_no" class="input" /></div>
            <div class="col">SSS No.<input type="text" name="sss_no" class="input" /></div>
            <div class="col">PAG-IBIG No.<input type="text" name="pagibig_no" class="input" /></div>
          </div>
          <div class="row">
            <div class="col">Address<input type="text" name="address" class="input" placeholder="Ex. Brgy 69-A Purok Y. etg"/></div>
          </div>
          <div class="row">
            <div class="col">Tel No.<input type="text" name="tel_no" class="input" /></div>
            <div class="col">Cellphone No.<input type="text" name="cellphone_no" class="input" /></div>
            <div class="col">Email Address<input type="email" name="email" class="input" placeholder="example.alm@gmail.com" /></div>
          </div>
        </div>
        <button onclick="showStep(2)" class="btn1 next-btn">Next</button>
      </div>
      <!-- Step 2 -->
      <div class="form-step hidden" id="step-2">
        <h1 class="main-title">PERSONAL DATA SHEET</h1>
        <h1 class="step-title">STEP 2</h1>
        <div class="column-group">
          <h1 class="section-title">SPOUSE'S NAME (If Married)</h1>
          <div class="row">
            <div class="col">Surname<input type="text" name="spouse_last_name" class="input" /></div>
            <div class="col">First Name<input type="text" name="spouse_first_name" class="input" /></div>
            <div class="col">Middle Name<input type="text" name="spouse_middle_name" class="input" /></div>
          </div>
          <div class="row">
            <div class="col">Occupation<input type="text" name="spouse_occupation" class="input" /></div>
            <div class="col">Company Name<input type="text" name="spouse_company_name" class="input" /></div>
          </div>
          <div class="row">
            <div class="col">Address<input type="text" name="spouse_company_address" class="input" /></div>
          </div>
          <h1 class="section-title">CHILDREN</h1>
          <div class="row">
            <div class="col">Name<input type="text" name="children_name[]" class="input" /><input type="text" name="children_name[]" class="input" /><input
                type="text" name="children_name[]" class="input" /></div>
            <div class="col">Age<input type="text" name="children_age[]" class="input" /><input type="text" name="children_age[]" class="input" /><input type="text"
                name="children_age[]" class="input" /></div>
            <div class="col">Name<input type="text" name="children_name[]" class="input" /><input type="text" name="children_name[]" class="input" /><input
                type="text" name="children_name[]" class="input" /></div>
            <div class="col">Age<input type="text" name="children_age[]" class="input" /><input type="text" name="children_age[]" class="input" /><input type="text"
                name="children_age[]" class="input" /></div>
          </div>
          <h1 class="section-title">FATHER'S NAME</h1>
          <div class="row">
            <div class="col">Surname<input type="text" name="father_last_name" class="input" /></div>
            <div class="col">First Name<input type="text" name="father_first_name" class="input" /></div>
            <div class="col">Middle Name<input type="text" name="father_middle_name" class="input" /></div>
          </div>
          <div class="row">
            <div class="col">Place of Birth<input type="text" name="father_place_of_birth" class="input" /></div>
          </div>
          <h1 class="section-title">MOTHER'S MAIDEN NAME</h1>
          <div class="row">
            <div class="col">Surname<input type="text" name="mother_last_name" class="input" /></div>
            <div class="col">First Name<input type="text" name="mother_first_name" class="input" /></div>
            <div class="col">Middle Name<input type="text" name="mother_middle_name" class="input" /></div>
          </div>
          <div class="row">
            <div class="col">Place of Birth<input type="text" name="mother_place_of_birth" class="input" /></div>
          </div>
        </div>
        <div class="btn-group">
          <button onclick="showStep(1)" class="btn prev-btn">Previous</button>
          <button onclick="showStep(3)" class="btn next-btn">Next</button>
        </div>
      </div>
      <!-- Step 3 -->
      <div class="form-step hidden" id="step-3">
        <h1 class="main-title">PERSONAL DATA SHEET</h1>
        <h1 class="step-title">STEP 3</h1>
        <div class="column-group">
          <h1 class="section-title">EDUCATION</h1>
          <h2 class="subsection-title">Elementary</h2>
          <div class="row">
            <div class="col"><label>Name of School/University</label><input type="text" name="elementary_school_name" class="input" /></div>
            <div class="col"><label>Inclusive Attendance Dates</label><input type="text" name="elementary_attendance_dates" class="input" /></div>
            <div class="col"><label>Degree Earned</label><input type="text" name="elementary_degree_earned" class="input" /></div>
            <div class="col"><label>No. of Units completed/Course Title</label><input type="text" name="elementary_units_or_course" class="input" /></div>
            <div class="col"><label>Honors Received</label><input type="text" name="elementary_honors_received" class="input" /></div>
          </div>
          <h2 class="subsection-title">Secondary</h2>
          <div class="row">
            <div class="col"><label>Name of School/University</label><input type="text" name="secondary_school_name" class="input" /></div>
            <div class="col"><label>Inclusive Attendance Dates</label><input type="text" name="secondary_attendance_dates" class="input" /></div>
            <div class="col"><label>Degree Earned</label><input type="text" name="secondary_degree_earned" class="input" /></div>
            <div class="col"><label>No. of Units completed/Course Title</label><input type="text" name="secondary_units_or_course" class="input" /></div>
            <div class="col"><label>Honors Received</label><input type="text" name="secondary_honors_received" class="input" /></div>
          </div>
          <h2 class="subsection-title">Vocational</h2>
          <div class="row">
            <div class="col"><label>Name of School/University</label><input type="text" name="vocational_school_name" class="input" /></div>
            <div class="col"><label>Inclusive Attendance Dates</label><input type="text" name="vocational_attendance_dates" class="input" /></div>
            <div class="col"><label>Degree Earned</label><input type="text" name="vocational_degree_earned" class="input" /></div>
            <div class="col"><label>No. of Units completed/Course Title</label><input type="text" name="vocational_units_or_course" class="input" /></div>
            <div class="col"><label>Honors Received</label><input type="text" name="vocational_honors_received" class="input" /></div>
          </div>
          <h2 class="subsection-title">College</h2>
          <div class="row">
            <div class="col"><label>Name of School/University</label><input type="text" name="college_school_name" class="input" /></div>
            <div class="col"><label>Inclusive Attendance Dates</label><input type="text" name="college_attendance_dates" class="input" /></div>
            <div class="col"><label>Degree Earned</label><input type="text" name="college_degree_earned" class="input" /></div>
            <div class="col"><label>No. of Units completed/Course Title</label><input type="text" name="college_units_or_course" class="input" /></div>
            <div class="col"><label>Honors Received</label><input type="text" name="college_honors_received" class="input" /></div>
          </div>
          <h2 class="subsection-title">Post Graduate</h2>
          <div class="row">
            <div class="col"><label>Name of School/University</label><input type="text" name="post_graduate_school_name" class="input" /></div>
            <div class="col"><label>Inclusive Attendance Dates</label><input type="text" name="post_graduate_attendance_dates" class="input" /></div>
            <div class="col"><label>Degree Earned</label><input type="text" name="post_graduate_degree_earned" class="input" /></div>
            <div class="col"><label>No. of Units completed/Course Title</label><input type="text" name="post_graduate_units_or_course" class="input" /></div>
            <div class="col"><label>Honors Received</label><input type="text" name="post_graduate_honors_received" class="input" /></div>
          </div>
        </div>
        <div class="btn-group">
          <button onclick="showStep(2)" class="btn prev-btn">Previous</button>
          <button onclick="showStep(4)" class="btn next-btn">Next</button>
        </div>
      </div>
      <!-- Step 4 -->
      <div class="form-step hidden" id="step-4">
        <h1 class="main-title">PERSONAL DATA SHEET</h1>
        <h1 class="step-title">STEP 4</h1>
        <div class="column-group">
          <h1 class="section-title">CIVIL SERVICE ELIGIBILITY/PROFESSIONAL BOARD/COMPETENCY ASSESSMENT</h1>
          <div class="row">
            <div class="col">Name of Exam<input type="text" name="exam_name[]" class="input" /><input type="text" name="exam_name[]" class="input" /><input
                type="text" name="exam_name[]" class="input" /></div>
            <div class="col">Date of Examination<input type="text" name="date_exam[]" class="input" /><input type="text"
                name="date_exam[]" class="input" /><input type="text" name="date_exam[]" class="input" /></div>
            <div class="col">Rating<input type="text" name="rating[]" class="input" /><input type="text" name="rating[]" class="input" /><input
                type="text" name="rating[]" class="input" /></div>
            <div class="col">Place of Examination<input type="text" name="place_exam[]" class="input" /><input type="text"
                name="place_exam[]" class="input" /><input type="text" name="place_exam[]" class="input" /></div>
          </div>
          <h1 class="section-title">RECORDS IN SERVICE TRAININGS; STUDY AND SCHOLARSHIP GRANTS</h1>
          <div class="row">
            <div class="col">Title of Seminar<input type="text" name="training_title[]" class="input" /><input type="text"
                name="training_title[]" class="input" /><input type="text" name="training_title[]" class="input" /></div>
            <div class="col">Inclusive Dates<input type="text" name="training_dates[]" class="input" /><input type="text" name="training_dates[]" class="input" /><input
                type="text" name="training_dates[]" class="input" /></div>
            <div class="col">No. of Hours<input type="text" name="training_hours[]" class="input" /><input type="text" name="training_hours[]" class="input" /><input
                type="text" name="training_hours[]" class="input" /></div>
            <div class="col">Conducted By<input type="text" name="training_conducted_by[]" class="input" /><input type="text" name="training_conducted_by[]" class="input" /><input
                type="text" name="training_conducted_by[]" class="input" /></div>
          </div>
          <h1 class="section-title">WORK EXPERIENCES</h1>
          <div class="row">
            <div class="col">Agency<input type="text" name="work_agency[]" class="input" /><input type="text" name="work_agency[]" class="input" /><input
                type="text" name="work_agency[]" class="input" /></div>
            <div class="col">Position<input type="text" name="work_position[]" class="input" /><input type="text" name="work_position[]" class="input" /><input
                type="text" name="work_position[]" class="input" /></div>
            <div class="col">Inclusive Dates<input type="text" name="work_dates[]" class="input" /><input type="text" name="work_dates[]" class="input" /><input
                type="text" name="work_dates[]" class="input" /></div>
            <div class="col">Status of Appointment<input type="text" name="work_status[]" class="input" /><input type="text"
                name="work_status[]" class="input" /><input type="text" name="work_status[]" class="input" /></div>
          </div>
          <h1 class="section-title">PERSON TO NOTIFY IN CASE OF EMERGENCY</h1>
          <div class="row">
            <div class="col">Name<input type="text" name="emergency_name" class="input" /></div>
          </div>
          <div class="row">
            <div class="col">Relationship to this person<input type="text" name="emergency_relationship" class="input" /></div>
            <div class="col">Contact No.<input type="text" name="emergency_contact_no" class="input" /></div>
            <div class="col">Address<input type="text" name="emergency_address" class="input" /></div>
          </div>
        </div>
        <div class="btn-group">
          <button onclick="showStep(3)" class="btn prev-btn">Previous</button>
          <button type="submit" class="btn submit-btn">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </body>
  <style>
  .input-error {
    border: 2px solid red;
  }
</style>

<script>
  function showStep(step) {
    const currentStepIndex = step - 2; // step 2 means index 0 (current)
    const steps = document.querySelectorAll('.form-step');

    if (step > 1) {
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
        return; // Do not proceed to next step
      }
    }

    // Show the requested step and hide others
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
</script>
</html>