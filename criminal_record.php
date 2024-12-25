<?php include 'includes/header.php'; ?>

<main>
    <link rel="stylesheet" href="criminal_record.css">
    <section class="criminal-section">
        <h1>Criminal Records</h1>
        <div class="actions">
            <button id="Add-crime">Add Crime</button>
            <button id="search-criminal">Search for criminal</button>
        </div>
    </section>
    
    <div class="criminal-form" id="criminal-form">
        <form action="insert_crime.php" method="POST">

            <label for="cid">Criminal ID:</label>
            <input type="text" name="cid" id="cid" name="cid" required><br><br>

            <label for="id">Citizen ID:</label>
            <input type="text" id="id" name="id" required><br><br>

            <label for="crime">Crime Committed:</label>
            <input type="text" id="crime" name="crime" required><br><br>

            <label for="date">Date of crime:</label>
            <input type="date" id="date" name="date" required><br><br>

            <label for="status">Conviction status:</label>
            <textarea id="status" name="status" required></textarea><br><br>

            <label for="details">Sentence Details:</label>
            <input type="text" id="details" name="details" required><br><br>

            <button class="search-button" type="submit">Submit</button>
        </form>
    </div>

    <div id="search-bar-container">
    <form action="search_crime.php" method = "GET">
        <input type="text" name ="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
</form>
    </div>

    <script>
        document.getElementById("Add-crime").addEventListener("click", function () {
            const form = document.getElementById("criminal-form");
            if (form.style.display === "none" || form.style.display === "") {
                form.style.display = "flex";
            } else {
                form.style.display = "none";
            }
        });
        document.getElementById("search-criminal").addEventListener("click", function () {
            const form = document.getElementById("search-bar-container");
            if (form.style.display === "none" || form.style.display === "") {
                form.style.display = "flex";
            } else {
                form.style.display = "none";
            }
        });
    </script>
</main>

<?php include 'includes/footer.php'; ?>
