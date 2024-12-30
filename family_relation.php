<?php include 'includes/header.php'; ?>
<main>
    <link rel="stylesheet" href="citizen_info.css">
    <section class="citizen-section">
        <h1>Family Relations</h1>
        <div class="actions">
            <button id="Add-relation">Add relation</button>
            <button id="search-relation">Search relation</button>
            <button id="all">View</button>
        </div>
    </section>
    
    <div id="search-bar-container">
        <form action="search_family.php" method = "GET">
        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
        </form>
    </div>

    <div class="form-container" id="form-container">
        <form action="insert_family.php" method="POST">
            <label for="citizen_id">Citizen ID:</label>
            <input type="text" id="citizen_id" name="citizen_id" required><br><br>

            <label for="relative_id">Relative ID:</label>
            <input type="text" id="relative_id" name="relative_id" required><br><br>

            <label for="relationship_type">Relationship Type:</label>
            <input type="text" id="relationship_type" name="relationship_type" required><br><br>

            <button class="search-button" type="submit">Submit</button>
        </form>
    </div>

    <div class="all" id = "full_detail">
    <table>
    <tr><th>Family ID</th><th>Citizen ID</th><th>Relative ID</th><th>Relationship Type</th></tr>
        <?php
        include 'db_connection.php';
    
    $sql = "SELECT * FROM family_relations";
    $stmt = $conn->prepare($sql);     
    $stmt->execute();
    $result = $stmt->get_result();
           while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['relation_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['citizen_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['relative_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['relationship_type']) . "</td>";
                echo "</tr>";
            }
        $conn->close();
        ?>
    </table>
</div>

<script>
    document.getElementById("Add-relation").addEventListener("click", function(){
        const forms = document.getElementById("form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
            document.getElementById("search-bar-container").style.display="none";
            document.getElementById("full_detail").style.display="none";

        } else {
            forms.style.display = "none"; 
        }
    });
    document.getElementById("search-relation").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
            document.getElementById("form-container").style.display="none";
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
