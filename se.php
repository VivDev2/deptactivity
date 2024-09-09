<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Select Records by Date Range and Department</h2>
        <form method="POST" action="search.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" max="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="end_date">End Date:</label>
                    <input type="date" class="form-control" name="end_date" id="end_date"  max="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="department">Department:</label >
                <select class="form-control" name="department" id="department" required>
                     <option disabled selected>Select Departement</option>
                    <option>MCA</option>
                    <option>CSE</option>
                    <option></option>
                    <!-- Add more departments as needed -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            
            <a href="dashboard.php" class="btn btn-danger ">Go to Dashboard</a>
            
        </form>
    </div>
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
            document.getElementById("end_date").setAttribute("max", today);
        });
</script>