<?php include 'includes/header.php';
        include 'db_connection.php';
?>

<main>
    <link rel="stylesheet" href="criminal_record.css">
    <section class="criminal-section">
        <h1>Criminal Records</h1>
        <div class="actions">
            <button id="Add-crime">Add Crime</button>
            <button id="search-criminal">Search for criminal</button>
            <button id="all">View</button>
        </div>
    </section>
    
    <div class="criminal-form" id="criminal-form">
        <form action="insert_crime.php" method="POST">

            <label for="id">Citizen ID:</label>
            <input type="text" id="id" name="id" required><br><br>

            <label for="crime">Crime Committed:</label>
            <input type="text" id="crime" name="crime" ><br><br>

            <label for="date">Date of crime:</label>
            <input type="date" id="date" name="date" ><br><br>

            <label for="status">Conviction status:</label>
            <textarea id="status" name="status" ></textarea><br><br>

            <label for="details">Sentence Details:</label>
            <input type="text" id="details" name="details" ><br><br>

            <button class="search-button" type="submit">Submit</button>
        </form>
    </div>

    <div id="search-bar-container">
    <form action="search_crime.php" id="form" method = "GET">
        <input type="text" name ="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
</form>
    </div>


    <div class="all" id = "full_detail">
    <table>
        <tr>
            <th>Criminal ID</th>
            <th>Citizen ID</th>
            <th>Offense Type</th>
            <th>Date of offense</th>
            <th>Conviction Status</th>
            <th>Sentence Details</th>
        </tr>
        <?php
    
    $sql = "SELECT * FROM criminal_records where offense_type IS NOT NULL";
    $stmt = $conn->prepare($sql);     
    $stmt->execute();
    $result = $stmt->get_result();
           while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['criminal_record_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['citizen_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['offense_type']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date_of_offense']) . "</td>";
                echo "<td>" . htmlspecialchars($row['conviction_status']) . "</td>";
                echo "<td>" . htmlspecialchars($row['sentence_details']) . "</td>";
                echo "</tr>";
            }
        $conn->close();
        ?>
    </table>
</div>

    <script>
        document.getElementById("Add-crime").addEventListener("click", function () {
            const form = document.getElementById("criminal-form");
            if (form.style.display === "none" || form.style.display === "") {
                form.style.display = "flex";
                document.getElementById("search-bar-container").style.display = "none";
                document.getElementById("full_detail").style.display = "none";

            } else {
                form.style.display = "none";
            }
        });
        document.getElementById("search-criminal").addEventListener("click", function () {
            const form = document.getElementById("search-bar-container");
            if (form.style.display === "none" || form.style.display === "") {
                form.style.display = "flex";
                document.getElementById("criminal-form").style.display = "none";
                document.getElementById("full_detail").style.display = "none";

            } else {
                form.style.display = "none";
            }
        });
        document.getElementById("all").addEventListener("click", function () {
        const full_details = document.getElementById("full_detail");
        if (full_details.style.display === "none" || full_details.style.display === "") {
            full_details.style.display = "flex"; 
            document.getElementById("search-bar-container").style.display = "none";
            document.getElementById("criminal-form").style.display = "none";

        } else {
            full_details.style.display = "none"; 
        }
    });
    </script>
</main>

<?php include 'includes/footer.php'; ?>
