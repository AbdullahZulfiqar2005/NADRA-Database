<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="voter-registeration.css">
    <section class="voter-section">
        <h1>Voter Registeration</h1>
        <div class="actions">
            <button id="search-voter">Search a voter</button>
            <button id="all">View</button>
        </div>

</section>

    <div id="search-bar-container2">
    <form action="search_voter.php" method = "GET">
        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
    </form>
    </div>

    <div class="all" id = "full_detail">
    <table>
    <tr><th>Reg. ID</th><th>ID</th><th>Reg Date</th><th>District</th><th>Status</th></tr>
            <?php
        include 'db_connection.php';
    
    $sql = "SELECT * FROM voter_registration";
    $stmt = $conn->prepare($sql);     
    $stmt->execute();
    $result = $stmt->get_result();
           while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['registration_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['citizen_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['registration_date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['voting_district']) . "</td>";
                echo "<td>" . htmlspecialchars($row['voter_status']) . "</td>";
                echo "</tr>";
            }
        $conn->close();
        ?>
    </table>
</div>


    <script>
         document.getElementById("search-voter").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container2");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
            document.getElementById("full_detail").style.display = "none";

        } else {
            searchBarContainer.style.display = "none"; 
        }
    });
    document.getElementById("all").addEventListener("click", function () {
        const full_details = document.getElementById("full_detail");
        if (full_details.style.display === "none" || full_details.style.display === "") {
            full_details.style.display = "flex"; 
            document.getElementById("search-bar-container2").style.display = "none";

        } else {
            full_details.style.display = "none"; 
        }
    });
    </script>
</main>
<?php include 'includes/footer.php'; ?>
