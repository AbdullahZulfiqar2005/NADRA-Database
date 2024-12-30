<?php include 'includes/header.php'; 
        include 'db_connection.php';
?>
<main>
    <link rel="stylesheet" href="citizen_info.css">
    <section class="citizen-section">
        <h1>Citizen Information</h1>
        <div class="actions">
            <button id="Add-citizen">Add Citizen</button>
            <button id="search-citizen">Search/Update Citizen</button>
            <button id="all">Show All</button>
        </div>
    </section>
    
    <div id="search-bar-container">
        <form action="search_citizen.php" method = "GET">
        <input type="text" name="citizen_id" id="search-bar" placeholder="Enter ID of citizen">
        <button id="search-button" class="search-button">Search</button>
        </form>
    </div>

    <div class="form-container" id="form-container">
    <form action="insert_citizen.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" required><br><br>

        <label for="nationality">Nationality:</label>
        <input type="text" id="nationality" name="nationality" required><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="contact">Contact Number:</label>
        <input type="text" id="contact" name="contact" required><br><br>

        <button class = "search-button" type="submit">Submit</button>
    </form>
</div>


<div class="all" id = "full_detail">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Address</th>
            <th>Contact</th>
        </tr>
        <?php
    
    $sql = "SELECT * FROM citizens";
    $stmt = $conn->prepare($sql);     
    $stmt->execute();
    $result = $stmt->get_result();
           while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['citizen_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date_of_birth']) . "</td>";
                echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nationality']) . "</td>";
                echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                echo "<td>" . htmlspecialchars($row['contact_info']) . "</td>";
                echo "</tr>";
            }
        $conn->close();
        ?>
    </table>
</div>

<script>
    document.getElementById("Add-citizen").addEventListener("click", function(){
        const forms = document.getElementById("form-container");
        if (forms.style.display === "none" || forms.style.display === "") {
            forms.style.display = "flex"; 
            document.getElementById("search-bar-container").style.display = "none";
            document.getElementById("full_detail").style.display = "none";
        } else {
            forms.style.display = "none"; 
        }
    });
    document.getElementById("search-citizen").addEventListener("click", function () {
        const searchBarContainer = document.getElementById("search-bar-container");
        if (searchBarContainer.style.display === "none" || searchBarContainer.style.display === "") {
            searchBarContainer.style.display = "flex"; 
            document.getElementById("form-container").style.display = "none";
            document.getElementById("full_detail").style.display = "none";

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
