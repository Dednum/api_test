<?php
// process.php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the POST request
    $jsonInput = file_get_contents('php://input');
    $data = json_decode($jsonInput,true);
    $num1 = $data["num1"];
    $num2 = $data["num2"];
    $sleep = $data["sleep"];
    sleep($sleep);
    
        // Perform addition
        $result = $num1 + $num2;

        // Display the result
        $finaldata=array("result" => $result);
        echo  json_encode($finaldata);
  
} else {
    // Handle non-POST requests
    echo "Invalid request method.";
}
?>
