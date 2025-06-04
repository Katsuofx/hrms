<?php
require_once('../fpdf/fpdf.php');
require_once('../fpdi/src/autoload.php'); 

use setasign\Fpdi\Fpdi;

include('../config.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Employee ID is required.");
}

$employee_id = intval($_GET['id']);

$sql = "SELECT p.*, g.name AS gender_name, c.name AS civil_status_name 
        FROM personnel p
        LEFT JOIN gender g ON p.gender_id = g.id
        LEFT JOIN civilstatus c ON p.civilstatus_id = c.id
        WHERE p.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $employee_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Employee not found.");
}

$employee = $result->fetch_assoc();

$full_name = trim($employee['first_name'] . ' ' . ($employee['middle_name'] ? $employee['middle_name'] . ' ' : '') . $employee['last_name']);

$current_date = date('F j, Y');
$expiration_date = date('F j, Y', strtotime('+3 days'));

$pdf = new FPDI('P', 'mm', 'A4');  

$sourceFile = 'COEs.pdf';  

if (!file_exists($sourceFile)) {
    die("Template file not found: $sourceFile");
}

$pageCount = $pdf->setSourceFile($sourceFile);
$tplIdx = $pdf->importPage(1);
$size = $pdf->getTemplateSize($tplIdx);

$pdf->AddPage();
$pdf->useTemplate($tplIdx, 0, 0, $size['width'], $size['height']);

$pdf->SetFont('Arial', 'B', 24);
$pdf->SetTextColor(0, 0, 0);

$nameX = ($size['width'] / 2) - ($pdf->GetStringWidth($full_name) / 2);
$nameY = 135;
$pdf->SetXY($nameX, $nameY);
$pdf->Cell($pdf->GetStringWidth($full_name), 10, $full_name, 0, 1, 'L');

$pdf->SetFont('Arial', '', 14);

$lines = [
    "from {$current_date} up to {$expiration_date}",
    "This certification is being issued upon the request of the aforementioned",
    "name or whatever lawful purpose it may serve him/her best.",
    "Given this {$current_date} day of at ACLC College of Tacloban City, Leyte."
];

$startY = $nameY + 30;
$pdf->SetXY(0, $startY);

foreach ($lines as $line) {
    if (strpos($line, 'from') !== false && strpos($line, 'up to') !== false) {
        $parts = preg_split('/(from | up to )/', $line, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

        $totalWidth = 0;
        $partWidths = [];
        foreach ($parts as $part) {
            $isBold = (strpos($part, $current_date) !== false || strpos($part, $expiration_date) !== false);
            $pdf->SetFont('Arial', $isBold ? 'B' : '', 14);
            $width = $pdf->GetStringWidth($part);
            $partWidths[] = ['text' => $part, 'width' => $width, 'style' => $isBold ? 'B' : ''];
            $totalWidth += $width;
        }

        $startX = ($size['width'] - $totalWidth) / 2;
        $currentX = $startX;
        $currentY = $pdf->GetY();
        $pdf->SetXY($currentX, $currentY);

        foreach ($partWidths as $part) {
            $pdf->SetFont('Arial', $part['style'], 14);
            $pdf->SetXY($currentX, $currentY);
            $pdf->Cell($part['width'], 8, $part['text'], 0, 0);
            $currentX += $part['width'];
        }
        $pdf->Ln(10);

    } elseif (strpos($line, 'Given this') !== false && strpos($line, $current_date) !== false) {
        $datePos = strpos($line, $current_date);
        $beforeDate = substr($line, 0, $datePos);
        $datePart = $current_date;
        $afterDate = substr($line, $datePos + strlen($current_date));

        $pdf->SetFont('Arial', '', 14);
        $beforeWidth = $pdf->GetStringWidth($beforeDate);
        $pdf->SetFont('Arial', 'B', 14);
        $dateWidth = $pdf->GetStringWidth($datePart);
        $pdf->SetFont('Arial', '', 14);
        $afterWidth = $pdf->GetStringWidth($afterDate);

        $totalWidth = $beforeWidth + $dateWidth + $afterWidth;
        $startX = ($size['width'] - $totalWidth) / 2;
        $currentX = $startX;
        $currentY = $pdf->GetY();

        $pdf->SetXY($currentX, $currentY);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell($beforeWidth, 8, $beforeDate, 0, 0);
        $currentX += $beforeWidth;

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell($dateWidth, 8, $datePart, 0, 0);
        $currentX += $dateWidth;

        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell($afterWidth, 8, $afterDate, 0, 0);
        $pdf->Ln(10);

    } else {
        $lineWidth = $pdf->GetStringWidth($line);
        $startX = ($size['width'] - $lineWidth) / 2;
        $pdf->SetXY($startX, $pdf->GetY());
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell($lineWidth, 8, $line, 0, 1, 'C');
    }
}


// Output the PDF for download
$fileName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $full_name) . '_Certificate_of_Employment.pdf';
$pdf->Output('D', $fileName);
exit;
?>
