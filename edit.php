<?php
include "dbcon.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $event_id = $_POST['event_id'];
  $activity_name = $_POST['activity_name'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];
  $venue = $_POST['venue'];
  $activity_objective = $_POST['activity_objective'];
  $department = $_POST['department'];

  $sql = "UPDATE `crud` SET `event_id`='$event_id', `activity_name`='$activity_name', `start_time`='$start_time', `end_time`='$end_time', `venue`='$venue', `activity_objective`='$activity_objective', `department`='$department' WHERE event_id = '$id'";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Edit Event</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    Edit Event
  </nav>

  <div class="container">
    <a href="activity.php" class="btn btn-dark mb-3">Back to List</a>

    <?php
    $sql = "SELECT * FROM `crud` WHERE event_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <form action="" method="post" style="width:50vw; min-width:300px;">
      <div class="mb-3">
        
        <input type="hidden" class="form-control" name="event_id" value="<?php echo $row['event_id']; ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Activity Name:</label>
        <input type="text" class="form-control" name="activity_name" value="<?php echo $row['activity_name']; ?>">
      </div>

      <div class="row mb-3">
        <div class="col">
          <label class="form-label">Start Time:</label>
          <input type="time" class="form-control" name="start_time" value="<?php echo date("Y-m-d\TH:i", strtotime($row['start_time'])); ?>">
        </div>

        <div class="col">
          <label class="form-label">End Time:</label>
          <input type="time" class="form-control" name="end_time" value="<?php echo date("Y-m-d\TH:i", strtotime($row['end_time'])); ?>">
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Venue:</label>
        <input type="text" class="form-control" name="venue" value="<?php echo $row['venue']; ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Activity Objective:</label>
        <input type="text" class="form-control" name="activity_objective" value="<?php echo $row['activity_objective']; ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Department:</label>
        <input type="text" class="form-control" name="department" value="<?php echo $row['department']; ?>">
      </div>

      

      <button type="submit" class="btn btn-success" name="submit">Save</button>
    </form>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
