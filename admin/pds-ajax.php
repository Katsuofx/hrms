<?php
    include '../config.php'; // adjust as needed

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
        echo "Success";
    } else {
        echo "Error: " . $stmt->error;
    }
?>
