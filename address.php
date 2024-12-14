<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="address.css">
    <section class="address-section">
        <h1>Address Records</h1>
        <div class="actions">
            <button id="update-address">Update a citizen address</button>
            <button id="search-address">Search for citizen address</button>
            <button >Filter Records</button>
        </div>

</section>
    <div id="search-bar-container">
        <input type="text" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
    </div>
<script>
    document.getElementById("update-address").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
        } else {
            searchBarContainer.style.display = "none"; 
        }
    });
    document.getElementById("search-address").addEventListener("click", function () {
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