<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="citizen_info.css">
    <section class="citizen-section">
        <h1>Citizen Information</h1>
        <div class="actions">
            <button id="Add-citizen">Add Citizen</button>
            <button id="update-citizen">Update Citizen</button>
            <button id="search-citizen">Search Citizen</button>
            <button id="filter">Filter Records</button>
        </div>
    </section>
    
    <div id="search-bar-container">
        <input type="text" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
    </div>

<script>
    document.getElementById("search-citizen").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
        } else {
            searchBarContainer.style.display = "none"; 
        }
    });

    document.getElementById("update-citizen").addEventListener("click", function () {
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
