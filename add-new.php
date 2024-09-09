<?php
include "dbcon.php";

if (isset($_POST["submit"])) {
   $event_id = $_POST['event_id'];
   $event_type = $_POST['event_type'];
   $activity_name = $_POST['activity_name'];
   $start_time = $_POST['start_time'];
   $end_time = $_POST['end_time'];
   $event_date = $_POST['event_date'];
   $venue = $_POST['venue'];
   $activity_objective = $_POST['activity_objective'];
   $department = $_POST['department'];
   

   $sql = "INSERT INTO `cruds` VALUES ( '$event_id', '$event_type', '$activity_name', '$start_time', '$end_time','$event_date','$venue', '$activity_objective', '$department')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: activity.php?msg=New record created successfully");
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
      Dept Application
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Event</h3>
         <p class="text-muted">Complete the form below to add a new event</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="">
                 
                  <input type="hidden" class="form-control" name="event_id" placeholder="Event ID">
               </div>

               <div class="mb-3">
               <label class="form-label">Activity Type</label>
                  <select class="form-select" id="ActivitySelect" name="event_type" required >
                     <option disabled selected>Select Activity Type</option>
                     <option value="Aryabhatta Hall">Seminor</option>
                     <option value="Einstein Hall">Workshop</option>
                     <option value="Einstein Hall">Guest Lecture</option>
                     <option value="Einstein Hall">Curicural Activity</option>
                  </select>
            </div>
               
               
               
               <div class="col">
                  <label class="form-label">Activity Name:</label>
                  <input type="text" class="form-control" name="activity_name" placeholder="Activity Name">
               </div>
            </div>

            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Start Time:</label>
                  <input type="time" class="form-control" name="start_time">
               </div>

               <div class="col">
                  <label class="form-label">End Time:</label>
                  <input type="time" class="form-control" name="end_time">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Event Date:</label>
               <input type="date" class="form-control" name="event_date">
            </div>

            <div class="mb-3">
               <label class="form-label">Venue:</label>
                  <select class="form-select" id="venueSelect" name="venue" required >
                     <option disabled selected>Select Venue</option>
                     <option value="Aryabhatta Hall">Aryabhatta Hall</option>
                     <option value="Einstein Hall">Einstein Hall</option>
                  </select>
            </div>



            <div class="mb-3">
               <label class="form-label">Activity Objective:</label>
               <input type="text" class="form-control" name="activity_objective" placeholder="Activity Objective">
            </div>

           

            <div class="mb-3">
               <label class="form-label" for="dept">Department:</label>
               <select class="form-select" id="dept" name="department" required>
                  <option disabled selected>Select Department</option>
                  <option value="MCA">MCA</option>
                  <option value="AI & DATA SCIENCE">AI & DATA SCIENCE</option>
                  <option value="CSE">CSE</option>
               </select>
            </div>


            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="activity.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- ... (your existing HTML script section) ... -->
   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>


<script>
        window.addEventListener("DOMContentLoaded", function() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            document.getElementById("start_date").setAttribute("max", today);
            
        });
</script>