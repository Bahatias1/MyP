<?php
// Set content type to JSON
header('Content-Type: application/json');

// Path to the testimonials JSON file
$data_file = 'data/testimonials.json';

// Check if the file exists
if (file_exists($data_file)) {
    // Read the content of the file
    $data = file_get_contents($data_file);
    
    // Decode the JSON content into an array
    $testimonials = json_decode($data, true);
    
    // If the data is decoded successfully, return the testimonials as JSON
    if ($testimonials) {
        echo json_encode($testimonials, JSON_PRETTY_PRINT);
    } else {
        // If the JSON decoding fails, return an error message
        echo json_encode(["error" => "Error decoding JSON data."]);
    }
} else {
    // If the file doesn't exist, return an error message
    echo json_encode(["error" => "Testimonials data file not found."]);
}
?>
