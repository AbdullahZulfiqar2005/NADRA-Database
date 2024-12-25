<?php include 'includes/header.php'; ?>

<main>
    <link rel="stylesheet" href="employment.css">
    <section class="employment-section">
        <h1>Employment Details</h1>
        <div class="actions">
            <button id="search-job">Search employee job</button>
            <button id="Add-job">Add a job for citizen</button>
        </div>

</section>

<div id="search-bar-container">
    <form action="search_employee.php" method="GET">
        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
</form>
    </div>

    <div class="form-container" id="form-container">
    <form action="insert_employee.php" method="POST">

        <label for="eid">Employee ID:</label>
        <input type="text" id="eid" name="employment_id" required><br><br>

        <label for="id">ID:</label>
        <input type="text" id="id" name="citizen_id" required><br><br>


        <label for="name">Name:</label>
        <input type="text" id="name" name="employer_name" required><br><br>

        <label for="job">Job:</label>
        <input type="text" id="job" name="job_title" required><br><br>

        <label for="start">Start Date:</label>
        <input type="date" id="start" name="employment_start_date" required><br><br>

        <label for="end">End Date:</label>
        <input type="date" id="end" name="employment_end_date" required><br><br>

        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" required><br><br>


        <button class = "search-button" type="submit">Submit</button>
    </form>
</div>

<script>

document.getElementById("Add-job").addEventListener("click", function(){
        const forms = document.getElementById("form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
        } else {
            forms.style.display = "none"; 
        }
    });
    document.getElementById("search-job").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
        } else {
            searchBarContainer.style.display = "none"; 
        }
    });
</script>
</main>
<?php include 'includes/footer.php'; ?>
