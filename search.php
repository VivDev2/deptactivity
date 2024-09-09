<?php
include "dbcon.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $department = $_POST["department"];

    // Sanitize the input to prevent SQL injection
    $start_date = mysqli_real_escape_string($conn, $start_date);
    $end_date = mysqli_real_escape_string($conn, $end_date);
    $department = mysqli_real_escape_string($conn, $department);

    // Construct the SQL query to fetch records within the specified date range and department
    $sql = "SELECT * FROM cruds WHERE event_date BETWEEN '$start_date' AND '$end_date' AND department = '$department'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>


<div class="container mt-4">
    
    <!-- Back button -->
    <a href="se.php" class="btn btn-primary">Back to Search</a>
</div>



<div class="container mt-4">
        <h2>Search Results</h2>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">Event ID</th>
                        <th scope="col">Activity Name</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Date</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Objective</th>
                        <th scope="col">Department</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['event_id'] ?></td>
                            <td><?= $row['activity_name'] ?></td>
                            <td><?= date('h:i A', strtotime($row['start_time'])) ?></td>
                            <td><?= date('h:i A', strtotime($row['end_time'])) ?></td>
                            <td><?= $row['event_date'] ?></td>
                            <td><?= $row['venue'] ?></td>
                            <td><?= $row['activity_objective'] ?></td>
                            <td><?= $row['department'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No records found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
