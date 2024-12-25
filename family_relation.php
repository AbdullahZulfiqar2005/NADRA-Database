<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="citizen_info.css">
    <section class="citizen-section">
        <h1>Citizen Information</h1>
        <div class="actions">
            <button id="Add-relation">Add relation</button>
            <button id="search-relation">Search relation</button>
        </div>
    </section>
    
    <div id="search-bar-container">
        <form action="search_family.php" method = "GET">
        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
        </form>
    </div>

    <div class="form-container" id="form-container">
        <form action="insert_family.php" method="POST">
            <label for="citizen_id">Citizen ID:</label>
            <input type="text" id="citizen_id" name="citizen_id" required><br><br>

            <label for="relative_id">Relative ID:</label>
            <input type="text" id="relative_id" name="relative_id" required><br><br>

            <label for="relationship_type">Relationship Type:</label>
            <input type="text" id="relationship_type" name="relationship_type" required><br><br>

            <button class="search-button" type="submit">Submit</button>
        </form>
    </div>



<script>
    document.getElementById("Add-relation").addEventListener("click", function(){
        const forms = document.getElementById("form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
        } else {
            forms.style.display = "none"; 
        }
    });
    document.getElementById("search-relation").addEventListener("click", function () {
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
