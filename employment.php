<?php include 'includes/header.php'; ?>

<main>
    <link rel="stylesheet" href="employment.css">
    <section class="employment-section">
        <h1>Employment Details</h1>
        <div class="actions">
            <button id="search-job">Search employee job</button>
            <button id="Add-job">Add a job for citizen</button>
            <button >Filter Records</button>
        </div>

</section>

<div id="search-bar-container">
        <input type="text" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
    </div>

    <div class="form-container" id="form-container">
    <form action="submit_form.php" method="POST">

        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="job">Job:</label>
        <input type="text" id="job" name="job" required><br><br>


        <label for="loc">Location:</label>
        <input type="text" id="loc" name="loc" required><br><br>



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
