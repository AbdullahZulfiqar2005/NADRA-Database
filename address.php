<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="address.css">
    <section class="address-section">
        <h1>Address Records</h1>
        <div class="actions">
            <button id="search-address">Search for citizen address</button>
            <button id="add-address">Add citizen address</button>
            <button id="all">View</button>
        </div>

</section>
    <div id="search-bar-container">
    <form action="search_address.php" method = "GET">
        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
    </form>
    </div>


    <div class="form-container" id="form-container">
    <form action="insert_address.php" id="form" method="POST">
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

<div class="all" id = "full_detail">
    <table>
    <tr><th>Address ID</th><th>ID</th><th>Previous Address</th><th>Current Address</th><th>Move in Date</th><th>Move out Date</th></tr>
        <?php
        include 'db_connection.php';
    
    $sql = "SELECT * FROM address_history";
    $stmt = $conn->prepare($sql);     
    $stmt->execute();
    $result = $stmt->get_result();
           while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['address_history_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['citizen_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['previous_address']) . "</td>";
                echo "<td>" . htmlspecialchars($row['current_address']) . "</td>";
                echo "<td>" . htmlspecialchars($row['move_in_date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['move_out_date']) . "</td>";
                echo "</tr>";
            }
        $conn->close();
        ?>
    </table>
</div>
<script>
    document.getElementById("search-address").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
            document.getElementById("form-container").style.display="none";
            document.getElementById("full_detail").style.display="none";


        } else {
            searchBarContainer.style.display = "none"; 
        }
    });
    document.getElementById("add-address").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("form-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
            document.getElementById("search-bar-container").style.display="none";
            document.getElementById("full_detail").style.display="none";
        } else {
            searchBarContainer.style.display = "none"; 
        }
    });
    document.getElementById("all").addEventListener("click", function () {
        const full_details = document.getElementById("full_detail");
        if (full_details.style.display === "none" || full_details.style.display === "") {
            full_details.style.display = "flex"; 
            document.getElementById("search-bar-container").style.display = "none";
            document.getElementById("form-container").style.display = "none";

        } else {
            full_details.style.display = "none"; 
        }
    });
</script>    


</main>
<?php include 'includes/footer.php'; ?>