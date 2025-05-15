<?php
include '../database/config.php';

header('Content-Type: application/json'); // Set response type to JSON

// SQL query
$query = "SELECT upper(streetname) AS AREA, upper(suburbname) as SUBURB, upper(postalcode) AS STR_CODE FROM learner_admission "
        . "GROUP BY postalcode "
        . "ORDER BY postalcode ASC ";
$resultQuery = $conn->query($query);

$data = [];

// Fetch results
while ($rowQuery = $resultQuery->fetch_assoc()) {
    $data[] = [
        'SUBURB' => $rowQuery['SUBURB'],
        'STR_CODE' => $rowQuery['STR_CODE'],
        'AREA' => $rowQuery['AREA']
    ];
}

// Return data as JSON
echo json_encode($data);

// Close the connection
$conn->close();
?>
