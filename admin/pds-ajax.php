<?php
    include '../config.php'; // adjust as needed

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        function sanitize($conn, $value) {
            return mysqli_real_escape_string($conn, trim($value));
        }

        // Retrieve and sanitize form data
        $lname       = sanitize($conn, $_POST['personnel-lname'] ?? '');
        $fname       = sanitize($conn, $_POST['personnel-fname'] ?? '');
        $mname       = sanitize($conn, $_POST['personnel-mname'] ?? '');
        $birthdate   = $_POST['personnel-birthdate'] ?? null;
        $birthplace  = sanitize($conn, $_POST['personnel-birthplace'] ?? '');
        $gender      = $_POST['personnel-gender'] ?? null;
        $civilstatus = $_POST['personnel-civilstatus'] ?? null;
        $nationality = $_POST['personnel-nationality'] ?? null;
        $religion    = $_POST['personnel-religion'] ?? null;
        $bloodtype   = $_POST['personnel-bloodtype'] ?? null;
        $telno       = sanitize($conn, $_POST['personnel-telno'] ?? '');
        $cellno      = sanitize($conn, $_POST['personnel-cellphoneno'] ?? '');
        $email       = sanitize($conn, $_POST['personnel-email'] ?? '');
        $address     = sanitize($conn, $_POST['personnel-address'] ?? '');
        $tin         = sanitize($conn, $_POST['personnel-tinno'] ?? '');
        $sss         = sanitize($conn, $_POST['personnel-sssno'] ?? '');
        $pagibig     = sanitize($conn, $_POST['personnel-pagibigno'] ?? '');
        $dateEmployed= $_POST['personnel-dateEmployed'] ?? null;
        $status = 1;

        //Spouse info
        $spouseLname = $_POST['spouse-lname'] ?? '';
        $spouseFname = $_POST['spouse-fname'] ?? '';
        $spouseMname = $_POST['spouse-mname'] ?? '';
        $spouseAddress = $_POST['spouse-address'] ?? '';
        $spouseOccupation = $_POST['spouse-occupation'] ?? '';
        $spouseCompany = $_POST['spouse-company'] ?? '';

        // Father info
        $fatherLname = $_POST['father-lname'] ?? '';
        $fatherFname = $_POST['father-fname'] ?? '';
        $fatherMname = $_POST['father-mname'] ?? '';
        $fatherBirthplace = $_POST['father-birthplace'] ?? '';

        // Mother info
        $motherLname = $_POST['mother-lname'] ?? '';
        $motherFname = $_POST['mother-fname'] ?? '';
        $motherMname = $_POST['mother-mname'] ?? '';
        $motherBirthplace = $_POST['mother-birthplace'] ?? '';

        // Children info
        $childrenNames = $_POST['children_name'] ?? [];
        $childrenAges = $_POST['children_age'] ?? [];

        // Education info
        $educlevels = $_POST['educ_level'] ?? [];
        $educschools = $_POST['educ_school'] ?? [];
        $educyears = $_POST['educ_years'] ?? [];
        $educdegrees = $_POST['educ_degree'] ?? [];
        $educunits = $_POST['educ_units'] ?? [];
        $educawards = $_POST['educ_awards'] ?? [];

        // Work info
        $workAgencys = $_POST['work_agency'] ?? [];
        $workPositions = $_POST['work_position'] ?? [];
        $workDates = $_POST['work_dates'] ?? [];
        $workStatuss = $_POST['work_status'] ?? [];

        // Qualification info
        $qualification_exam = $_POST['qualification_exam'] ?? [];
        $qualification_date = $_POST['qualification_date'] ?? [];
        $qualification_rates = $_POST['qualification_rates'] ?? [];
        $qualification_place = $_POST['qualification_place'] ?? [];

        // Training info
        $trainingseminar = $_POST['trainingseminar'] ?? [];
        $trainingdate = $_POST['trainingdate'] ?? [];
        $traininghours = $_POST['traininghours'] ?? [];
        $trainingconducted = $_POST['trainingconducted'] ?? [];

        // Emergency contact info
        $emergencyname = sanitize($conn, $_POST['emergency-name'] ?? '');
        $emergencyrelationship = sanitize($conn, $_POST['emergency-relationship'] ?? '');
        $emergencynumber = sanitize($conn, $_POST['emergency-number'] ?? '');
        $emergencyaddress = sanitize($conn, $_POST['emergency-address'] ?? '');


        // Handle file upload
        $photoPath = null;
        if (isset($_FILES['personnel-photo']) && $_FILES['personnel-photo']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../assets/personnel-photos/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
            $photoName = time() . '_' . basename($_FILES['personnel-photo']['name']);
            $photoPath = $uploadDir . $photoName;
            move_uploaded_file($_FILES['personnel-photo']['tmp_name'], $photoPath);
        }

        $sql = "INSERT INTO `personnel`(`last_name`, `first_name`, `middle_name`, `birthplace`, `birthdate`, `religion_id`, 
        `bloodtype_id`, `civilstatus_id`, `gender_id`, `nationality_id`, `tin_no`, `sss_no`, `pagibig_no`, `address`, 
        `tel_no`, `cellphone_no`, `email`, `date_employed`, `img_path`, `status_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssiiiiisssssssssi",
            $lname, $fname, $mname, $birthplace, $birthdate, 
            $religion, $bloodtype,$civilstatus, $gender, $nationality, 
            $tin, $sss, $pagibig, $address, $telno, $cellno, $email, 
            $dateEmployed, $photoPath, $status
        );

        if ($stmt->execute()) {
            $personnelID = $conn->insert_id;
            $stmt->close();

            if (!empty($spouseLname) || !empty($spouseFname)) {
                $sql1 = "INSERT INTO `spouse`(`personnel_id`, `last_name`, `first_name`, `middle_name`, `occupation`, 
                    `company_name`, `company_address`) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt1 = $conn->prepare($sql1);
                $stmt1->bind_param(
                    "issssss",
                    $personnelID, $spouseLname, $spouseFname, $spouseMname, $spouseOccupation, $spouseCompany, $spouseAddress
                );
                if ($stmt1->execute()) {
                    $stmt1->close();
                } else {
                    echo "Error preparing spouse insert: " . $conn->error;
                }
            }
            

            $stmt2 = $conn->prepare("INSERT INTO `children` (`personnel_id`, `name`, `age`) VALUES (?, ?, ?)");
            foreach ($childrenNames as $index => $childName) {
                $childAge = $childrenAges[$index] ?? null;
                $stmt2->bind_param("iss", $personnelID, $childName, $childAge);
                $stmt2->execute();
            }
            $stmt2->close();

            if (!empty($fatherLname)) {
                $typeFather = "Father";

                $stmtFather = $conn->prepare("INSERT INTO `parents` (`personnel_id`, `type`, `last_name`, `first_name`, `middle_name`, `place_of_birth`) 
                                            VALUES (?, ?, ?, ?, ?, ?)");

                if ($stmtFather) {
                    $stmtFather->bind_param("isssss", $personnelID, $typeFather, $fatherLname, $fatherFname, $fatherMname, $fatherBirthplace);
                    if (!$stmtFather->execute()) {
                        echo "Error inserting father: " . $stmtFather->error;
                    }
                    $stmtFather->close();
                } else {
                    echo "Error preparing father statement: " . $conn->error;
                }
            }

            if (!empty($motherLname)) {
                $typeMother = "Mother";

                $stmtMother = $conn->prepare("INSERT INTO `parents` (`personnel_id`, `type`, `last_name`, `first_name`, `middle_name`, `place_of_birth`) 
                                            VALUES (?, ?, ?, ?, ?, ?)");

                if ($stmtMother) {
                    $stmtMother->bind_param("isssss", $personnelID, $typeMother, $motherLname, $motherFname, $motherMname, $motherBirthplace);
                    if (!$stmtMother->execute()) {
                        echo "Error inserting father: " . $stmtMother->error;
                    }
                    $stmtMother->close();
                } else {
                    echo "Error preparing father statement: " . $conn->error;
                }
            }

            $stmtEducation = $conn->prepare("INSERT INTO `education`(`personnel_id`, `educationlevels`, `school_name`, `attendance_dates`, `degree_earned`, `units_or_course`, `honors_received`) 
                                            VALUES (?, ?, ?, ?, ?, ?, ?)");
            foreach ($educlevels as $index => $educlevel) {
                $educschool = $educschools[$index] ?? null;
                $educyear = $educyears[$index] ?? null;
                $educdegree = $educdegrees[$index] ?? null;
                $educunit = $educunits[$index] ?? null;
                $educaward = $educawards[$index] ?? null;
                $stmtEducation->bind_param("issssss", $personnelID, $educlevel, $educschool, $educyear, $educdegree, $educunit, $educaward);
                $stmtEducation->execute();
            }
            $stmtEducation->close();

            $stmtWork = $conn->prepare("INSERT INTO `work_experience`(`personnel_id`, `agency`, `position`, `inclusive_dates`, `status`) 
                                                VALUES (?, ?, ?, ?, ?)");
            foreach ($workAgencys as $index => $workAgency) {
                $workPosition = $workPositions[$index] ?? null;
                $workDate = $workDates[$index] ?? null;
                $workStatus = $workStatuss[$index] ?? null;
                $stmtWork->bind_param("issss", $personnelID, $workAgency, $workPosition, $workDate, $workStatus);
                $stmtWork->execute();
            }
            $stmtWork->close();

            $stmtQualification = $conn->prepare("INSERT INTO `eligibility`(`personnel_id`, `exam_name`, `date_exam`, `rating`, `place_exam`) 
                                                VALUES (?, ?, ?, ?, ?)");
            foreach ($qualification_exam as $index => $qualificationexam) {
                $qualificationdate = $qualification_date[$index] ?? null;
                $qualificationrates = $qualification_rates[$index] ?? null;
                $qualificationplace = $qualification_place[$index] ?? null;
                $stmtQualification->bind_param("issss", $personnelID, $qualificationexam, $qualificationdate, $qualificationrates, $qualificationplace);
                $stmtQualification->execute();
            }
            $stmtQualification->close();

            $stmtTraining = $conn->prepare("INSERT INTO `trainings`(`personnel_id`, `title`, `inclusive_dates`, `hours`, `conducted_by`) 
                                            VALUES (?, ?, ?, ?, ?)");
            foreach ($trainingseminar as $index => $training_seminar) {
                $training_date = $trainingdate[$index] ?? null;
                $training_hours = $traininghours[$index] ?? null;
                $training_conducted = $trainingconducted[$index] ?? null;
                $stmtTraining->bind_param("issss", $personnelID, $training_seminar, $training_date, $training_hours, $training_conducted);
                $stmtTraining->execute();
            }
            $stmtTraining->close();

            if (!empty($emergencyname) || !empty($emergencyrelationship)  || !empty($emergencynumber)  || !empty($emergencynumber) ) {
                $stmtEmergency = $conn->prepare("INSERT INTO `emergency_contact`(`personnel_id`, `name`, `relationship`, `contact_no`, `address`) 
                                    VALUES (?, ?, ?, ?, ?)");
                $stmtEmergency->bind_param(
                    "issss", $personnelID, $emergencyname, $emergencyrelationship, $emergencynumber, $emergencynumber
                );

                if ($stmtEmergency->execute()) {
                    $stmtEmergency->close();
                } else {
                    echo "Error inserting personnel: " . $stmtEmergency->error;
                }
            }
            
            echo "<script>
                alert('Form submitted successfully!');
                window.location.href = 'index.php?submitted=1';
            </script>";
            exit;
        } else {
            echo "Error inserting personnel: " . $stmt->error;
        }

        
    } else {
        exit('Invalid request');
    }
?>
