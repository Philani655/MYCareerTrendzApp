<?php
include '../database/config.php';

header('Content-Type: application/json'); // Set response type to JSON

// SQL query
$query = "SELECT upper(school_name) AS school_name , upper(address) as address, upper(suburb) AS suburb , upper(postalcode) AS postalcode , lower(email) AS email , contact  FROM school "
        . "GROUP BY postalcode , school_name "
        . "ORDER BY postalcode ASC ";
$resultQuery = $conn->query($query);

$data = [];

// Fetch results
while ($rowQuery = $resultQuery->fetch_assoc()) {
    $data[] = [
        'SCHOOL_NAME' => $rowQuery['school_name'],
        'ADDRESS' => $rowQuery['address'],
        'SUBURB' => $rowQuery['suburb'],
        'POSTCODE' => $rowQuery['postalcode'],
        'CONTACT' => $rowQuery['contact'] ,
        'EMAIL' => $rowQuery['email'] 
    ];
}

// Return data as JSON
echo json_encode($data);

// Close the connection
$conn->close();
?>
