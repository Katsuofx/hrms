<?php
include ('../config.php');

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $id = $data['id'];
    $status_id = $data['status_id'];

    $query = "UPDATE personnel SET status_id = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $status_id, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
