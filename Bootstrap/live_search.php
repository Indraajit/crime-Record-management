<?php
include("config.php");

if (isset($_POST['input'])) {
    $input = $_POST['input'];

    $query = "SELECT * FROM file_case WHERE name LIKE '{$input}%' OR DOB LIKE '{$input}%' OR caste LIKE '{$input}%' 
    OR phone_number LIKE '{$input}%' OR case_type LIKE '{$input}%' LIMIT 20";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
?>
        <table class="table table-bordered table-striped mt-20">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Caste</th>
                    <th>Phone Number</th>
                    <th>Case Type</th>
                </tr>
            </thead>
            <tbody>
<?php
        while ($row = mysqli_fetch_assoc($result)) {
            $imageData = $row['image']; // Assuming 'image' field stores image data
            $imageFormat = isset($row['image_format']) ? strtolower($row['image_format']) : ''; // Convert image format to lowercase or set to empty string if NULL

            // Validate image format
            if ($imageFormat && in_array($imageFormat, ['jpg', 'jpeg', 'png'])) {
                echo "<tr>";
                // Use base64 encoding for image data
                $imageDataEncoded = base64_encode($imageData);
                echo "<td><img src='data:image/{$imageFormat};base64,{$imageDataEncoded}' width='100' height='100' /></td>";
            } else {
                // Output error message for invalid image format
                echo "<tr><td colspan='6'>Invalid image format: {$imageFormat}</td></tr>";
            }

            // Display other fields
            echo "<br>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['DOB']}</td>";
            echo "<td>{$row['caste']}</td>";
            echo "<td>{$row['phone_number']}</td>";
            echo "<td>{$row['case_type']}</td>";
            echo "</tr>";
        }
?>
            </tbody>
        </table>
<?php
    } else {
        echo "<h6 class='text-danger text-center mt-20'>No data Record</h6>";
    }
}
?>
