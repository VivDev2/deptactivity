
<?php
include "dbcon.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid event ID");
} else {
    $event_id = $_GET['id']; // Now we can safely use it
}


$conn = mysqli_connect("localhost", "root", "", "fex");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM `crud` WHERE event_id = '$event_id'";

// Execute the DELETE query
$result = mysqli_query($conn, $sql);

// Check if the DELETE operation was successful
if ($result) {
    // Redirect back to the dashboard with success message
    header("Location: index.php?msg=Data deleted successfully");
    exit();
} else {
    // Output any SQL errors
    echo "Failed to delete data: " . mysqli_error($conn);
}

?>




<!-- 

<?php
include "dbcon.php";
$event_id = $_GET['event_id'];
$sql = "DELETE FROM `crud` WHERE`event_id`='$event_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

?> -->