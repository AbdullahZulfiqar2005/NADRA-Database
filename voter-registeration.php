<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="voter-registeration.css">
    <section class="voter-section">
        <h1>Voter Registeration</h1>
        <div class="actions">
            <button id="search-voter">Search a voter</button>
            <button >Filter Records</button>
        </div>

</section>

    <div id="search-bar-container2">
    <form action="search_voter.php" method = "GET">
        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
    </form>
    </div>


    <script>
         document.getElementById("search-voter").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container2");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
        } else {
            searchBarContainer.style.display = "none"; 
        }
    });
    </script>
</main>
<?php include 'includes/footer.php'; ?>
