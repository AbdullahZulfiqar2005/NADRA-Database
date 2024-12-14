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
            <button >Filter Records</button>
        </div>
</section>

<div class="birth-form-container" id="birth-form-container">
    <form action="birth_submit_form.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="father-name">Father's Name:</label>
        <input type="text" id="father-name" name="father_name" required><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="loc">Place of birth:</label>
        <input type="text" id="loc" name="loc" required><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
</div>

<div class="death-form-container" id="death-form-container">
    <form action="death_submit_form.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="dod">Date of death:</label>
        <input type="date" id="dod" name="dod" required><br><br>

        <label for="ID">ID of deceased:</label>
        <input type="text" id="ID" name="ID" required><br><br>

        <label for="loc">Place of death:</label>
        <input type="text" id="loc" name="loc" required><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
</div>

<div id="search-bar-container">
        <input type="text" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
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
