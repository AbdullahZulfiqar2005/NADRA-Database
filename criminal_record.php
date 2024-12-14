<?php include 'includes/header.php'; ?>

<main>
    <link rel="stylesheet" href="criminal_record.css">
    <section class="criminal-section">
        <h1>Criminal Records</h1>
        <div class="actions">
            <button id="Add-crime">Add Crime</button>
            <button id="search-criminal">Search for criminal</button>
            <button>Filter Records</button>
        </div>
    </section>
    
    <div class="criminal-form" id="criminal-form">
        <form action="submit_form.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required><br><br>

            <label for="crime">Crime Committed:</label>
            <input type="text" id="crime" name="crime" required><br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br><br>

            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" required><br><br>

            <button class="search-button" type="submit">Submit</button>
        </form>
    </div>

    <div id="search-bar-container">
        <input type="text" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
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
