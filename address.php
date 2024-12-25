<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="address.css">
    <section class="address-section">
        <h1>Address Records</h1>
        <div class="actions">
            <button id="search-address">Search for citizen address</button>
            <button id="add-address">Add citizen address</button>
        </div>

</section>
    <div id="search-bar-container">
    <form action="search_address.php" method = "GET">
        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
    </form>
    </div>


    <div class="form-container" id="form-container">
    <form action="insert_address.php" method="POST">
        <label for="aid">Address ID:</label>
        <input type="text" id="aid" name="aid" required><br><br>

        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="prev">Previous Address:</label>
        <input type="text" id="prev" name="prev" required><br><br>

        <label for="current">Current Address:</label>
        <input type="text" id="current" name="current" required><br><br>

        <label for="move_in">Move In Date:</label>
        <input type="date" id="move_in" name="move_in" required><br><br>

        <label for="move_out">Move Out Date:</label>
        <input type="date" id="move_out" name="move_out" required><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
</div>
<script>
    document.getElementById("search-address").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
        } else {
            searchBarContainer.style.display = "none"; 
        }
    });
    document.getElementById("add-address").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("form-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
        } else {
            searchBarContainer.style.display = "none"; 
        }
    });
</script>    


</main>
<?php include 'includes/footer.php'; ?>