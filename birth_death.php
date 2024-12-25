<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="birth_death.css">
    <section class="birth_death-section">
        <h1>Birth & Death Records</h1>
        <div class="actions">
            <button id="new-birth">New Birth</button>
            <button id="birth-record">Citizen Birth Record</button>
            <button id="death-add">Add Death record</button>
            <button id="death-record">Citizen Death Record</button>
        </div>
</section>

<div class="birth-form-container" id="birth-form-container">
    <form action="birth_submit_form.php" method="POST">
        <label for="citizen_id">ID:</label>
        <input type="text" id="citizen_id" name="citizen_id" required><br><br>

        <label for="birth_date">Date of Birth:</label>
        <input type="date" id="birth_date" name="birth_date" required><br><br>

        <label for="father_name">Father's Name:</label>
        <input type="text" id="father_name" name="father_name" required><br><br>

        <label for="birth_place">Place of birth:</label>
        <input type="text" id="birth_place" name="birth_place" required><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
</div>

<div class="death-form-container" id="death-form-container">
    <form action="death_submit_form.php" method="POST">
        <label for="citizen_id">ID:</label>
        <input type="text" id="citizen_id" name="citizen_id" required><br><br>

        <label for="date_of_death">Date of death:</label>
        <input type="date" id="date_of_death" name="date_of_death" required><br><br>

        <label for="cause_of_death">Cause of death:</label>
        <input type="text" id="cause_of_death" name="cause_of_death" required><br><br>

        <label for="place_of_death">Place of death:</label>
        <input type="text" id="place_of_death" name="place_of_death" required><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
</div>

    <div id="search-bar-container">
    <form action="search_birth.php" method="GET">

        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
</form>
    </div>
    <div id="death-search-bar-container">
    <form action="search_death.php" method="GET">

        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
</form>
    </div>

    <script>
    document.getElementById("new-birth").addEventListener("click", function(){
        const forms = document.getElementById("birth-form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
        } else {
            forms.style.display = "none"; 
        }
    });
    document.getElementById("death-add").addEventListener("click", function () {
        const forms = document.getElementById("death-form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
        } else {
            forms.style.display = "none"; 
        }
    });

    document.getElementById("birth-record").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
        } else {
            searchBarContainer.style.display = "none"; 
        }
    });

    document.getElementById("death-record").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("death-search-bar-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
        } else {
            searchBarContainer.style.display = "none"; 
        }
    });


</script>
</main>
<?php include 'includes/footer.php'; ?>
