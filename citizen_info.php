<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="citizen_info.css">
    <section class="citizen-section">
        <h1>Citizen Information</h1>
        <div class="actions">
            <button id="Add-citizen">Add Citizen</button>
            <button id="search-citizen">Search/Update Citizen</button>
            <button id="filter">Filter Records</button>
        </div>
    </section>
    
    <div id="search-bar-container">
        <form action="search_citizen.php" method = "GET">
        <input type="text" name="id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
        </form>
    </div>

    <div class="form-container" id="form-container">
    <form action="insert_citizen.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="father-name">Father's Name:</label>
        <input type="text" id="father-name" name="father_name" required><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact" required><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
</div>


<script>
    document.getElementById("Add-citizen").addEventListener("click", function(){
        const forms = document.getElementById("form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
        } else {
            forms.style.display = "none"; 
        }
    });
    document.getElementById("search-citizen").addEventListener("click", function () {
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
