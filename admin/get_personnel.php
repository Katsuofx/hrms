<?php
include('../config.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("
        SELECT 
          p.*, 
          g.name AS gender_name, 
          c.name AS civil_status_name 
        FROM personnel p
        INNER JOIN gender g ON p.gender_id = g.id
        INNER JOIN civilstatus c ON p.civilstatus_id = c.id
        WHERE p.id = ?
    ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $person = $result->fetch_assoc();
        echo json_encode(['success' => true, 'personnel' => $person]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
