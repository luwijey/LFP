<?php
include '../components/connection.php';
include '../actions/sessionChecker_action.php';

$user_ID = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reportType = $_POST['report_type'];

    $itemName = $_POST['item-name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $location = $_POST['location'];

    $foundAgreement = $_POST['foundAgreement'];
    $lostAgreement = $_POST['lostAgreement'];

    $foundTC = $_POST['foundTermsConditions'];
    $lostTC = $_POST['lostTermsConditions'];

    $tcAccepted = 1;

    $uploadDir = "../userUploads/";
    $fileName = time() . "_" . basename($_FILES['item_photo']['name']);
    $targetFilePath = $uploadDir . $fileName;

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = ["jpg", "jpeg", "png",];

    if (!in_array($fileType, $allowedTypes)) {
        echo json_encode([
            "CreatedReport" => false,
            "Message" => "Invalid file type"
        ]);
        exit;
    }

    if (!move_uploaded_file($_FILES['item_photo']['tmp_name'], $targetFilePath)) {
        echo json_encode([
            "CreatedReport" => false,
            "Message" => "File upload Failed"
        ]);
        exit;
    }

    function generateReportID($conn)
    {
        do {
            $randomNum = rand(100000, 999999);
            $reportID = "RPT" . $randomNum;

            $query = "SELECT report_id FROM reports WHERE report_id = '$reportID' ";
            $result = mysqli_query($conn, $query);
        } while (mysqli_num_rows($result) > 0);

        return $reportID;
    }

    $reportID = generateReportID($conn);

    switch ($reportType) {
        case "found":
            $stmt = $conn->prepare(
                "INSERT INTO reports 
            (report_id, 
            user_id, 
            report_type, 
            item_name, 
            category, 
            description, 
            item_photo, 
            date_reported, 
            location, 
            agreement,
            tc_accepted) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $stmt->bind_param(
                "sisssssssi",
                $reportID,
                $user_ID,
                $reportType,
                $itemName,
                $category,
                $description,
                $fileName,
                $date,
                $location,
                $tc_accepted,
            );

            if ($stmt->execute()) {
                echo json_encode([
                    "CreatedReport" => true,
                    "Message" => "Found Report hase successfully stored to database"
                ]);
            } else {
                echo json_encode([
                    "CreatedReport" => false,
                    "Message" => "Database insert failed" . $stmt->error
                ]);
            }
            $stmt->close();
            break;

        case "lost":

        default:
            echo json_encode([
                "CreatedReport" => false,
                "Message" => "Invalid Report Type"
            ]);
            break;
    }
} else {
    http_response_code(405);
    echo json_encode([
        "CreatedReport" => false,
        "Message" => "Invalid Request Method"
    ]);
}
