<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="voter-registeration.css">
    <section class="voter-section">
        <h1>Voter Registeration</h1>
        <div class="actions">
            <button id="check-voter">Check your registeration</button>
            <button >Filter Records</button>
        </div>

</section>

<div id="search-bar-container">
        <input type="text" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
    </div>

    <script>
         document.getElementById("check-voter").addEventListener("click", function () {
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
