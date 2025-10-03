<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $reportType = $_POST['report_type'];

    switch ($reportType) {
        case "found" : 
            
        case "lost" :

        default: 
            echo json_encode(["CreatedReport" => false, "message" => "Invalid Report Type"]);
            break;
    }
} 
else {
    http_response_code(405);
    echo json_encode([
        "CreatedReport" => false,
        "Message" => "Invalid Request Method"
    ]);
}

?>