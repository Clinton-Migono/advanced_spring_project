<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search Results</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        .job-card {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: 80%;
            background: #c9c3c3;
        }
        .job-card h4 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mt-4 mb-4">Job Search Results</h2>
    <?php
    // Include database connection
    include_once 'db_connection.php'; 

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $jobType = $_POST['jobType'];
        $company = $_POST['company'];
        $keyword = $_POST['keyword'];

        //values for ratings
        $searchedJobType = isset($_POST['jobType']) ? $_POST['jobType'] : "";
        $searchedCompany = isset($_POST['company']) ? $_POST['company'] : "";

        // Start building SQL query
        $sql = "SELECT * FROM job_table WHERE 1=1";

        // Add conditions based on form inputs
        if (!empty($jobType)) {
            $sql .= " AND job_type = '$jobType'";
        }
        if (!empty($company)) {
            $sql .= " AND (company = '$company' OR company LIKE '%$company%')";
        }
        if (!empty($keyword)) {
            $sql .= " AND (job_title LIKE '%$keyword%' OR job_description LIKE '%$keyword%')";
        }

        // Execute SQL query
        $result = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Display results
            while ($row = mysqli_fetch_assoc($result)) {
                // Apply rating strategies

                $rating = 100; // Default rating
                $jobType = $row['job_type']; // Get job type from the row

                // Apply rating penalty based on job type
                if ($jobType !== $searchedJobType) {
                    // Apply penalty for non-matching job types
                    $rating -= 20; // For example, decrease rating by 20%
                }

                // Apply rating strategies for company
                $company = $row['company']; // Get company from the row

                // Apply rating penalty based on company
                if ($company !== $searchedCompany) {
                    // Apply penalty for non-matching companies
                    $rating -= 10; //decrease rating by 10%
                }

                // Check if the company is similar to the searched company
                if (!empty($searchedCompany) && strpos($company, $searchedCompany) !== false) {
                    // Apply penalty for non-exact matches
                    $rating -= 5; //decrease rating by 5%
                }

                // Retrieve form data for keyword
                $keyword = $_POST['keyword'];

                // Apply rating strategies for keyword
                // Check if keyword is present in job title or description
                if (stripos($row['job_title'], $keyword) === false && stripos($row['job_description'], $keyword) === false) {
                    // Apply penalty if keyword is not found
                    $rating -= 15; //  decrease rating by 15%
                }

                // Display job information with rating
                ?>
                <div class="job-card">
                    <h4><?php echo $row['job_title']; ?></h4>
                    <p><strong style="color: black;">Company:</strong> <?php echo $row['company']; ?> (Rating: <?php echo $rating; ?>%)</p>
                    <p><strong>Description:</strong> <?php echo $row['job_description']; ?></p>
                    <p><strong>Location:</strong> <?php echo $row['city'] . ', ' . $row['state'] . ', ' . $row['region']; ?></p>
                    <p><strong>Specialization:</strong> <?php echo $row['specialization']; ?></p>
                    <p><strong>Job Type:</strong> <?php echo $row['job_type']; ?> (Rating: <?php echo $rating; ?>%)</p>
                </div>
                <?php
            }
        } else {
            echo "<p>No jobs found.</p>";
        }

        // Close database connection
        mysqli_close($conn);
    }
    ?>
    <!-- Back button -->
    <a href="index.html" class="btn btn-primary">Back</a>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
